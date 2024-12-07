<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage as StorageFacade;


/**
 * @group Storage Endpoints
 * 
 * Endpoints for managing storage
 */
class StorageController extends Controller
{

    /**
     * Get all storage
     * 
     * @param User $user
     * @return JsonResponse
     */
    public function index($user)
    {
        $authUser = User::find($user);
        if (!$authUser) {
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
        $storage = Storage::where('user_uuid', $authUser->uuid)->latest()->paginate(20);
        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Storage fetched successfully',
            'data' => [
                'storage' => $storage
            ]
        ]);
    }



    /**
     * Store a new storage
     * 
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function store(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'file' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:1024',
            ]);

            $uuid = Str::uuid()->toString();
            $slug = Str::random(40);
            $user_uuid = $user->uuid;
            $mimeType = $validated['file']->getMimeType();
            $size = $validated['file']->getSize();

            if (in_array($mimeType, ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'])) {
                $type = 'image';
            } else if ($mimeType === 'application/pdf') {
                $type = 'pdf';
            } else {
                return response()->json([
                    'status' => 422,
                    'success' => false,
                    'message' => 'Unsupported file type'
                ], 422);
            }

            $path = $validated['file']->storeAs(
                env('APP_ENV') . '/' . ($type == "image" ? 'images' : 'documents'),
                str_replace(' ', '-', $slug) . '.' . $validated['file']->getClientOriginalExtension(),
                'public' //public, s3
            );

            $storage = Storage::create([
                "uuid" => $uuid,
                "slug" => $slug,
                "user_uuid" => $user_uuid,
                "base_url" => env('APP_URL'),
                "path" => 'storage/'. $path,
                "type" => $type,
                "size" => $size,
            ]);

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Storage created successfully',
                'data' => [
                    'base_url' => $storage->base_url,
                    'path' => $storage->path,
                    'url' => $storage->base_url . '/' . $storage->path,
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => 'Internal server error, something went wrong' . $th
            ], 500);
        }
    }


    /**
     * Delete a storage
     * 
     * @param Request $request
     * @param Storage $storage
     * @param User $user
     * @return JsonResponse
     */
    public function delete(Storage $storage, User $user)
    {
        if ($storage->user_uuid !== $user->uuid) {
            return response()->json([
                'status' => 403,
                'success' => false,
                'message' => 'Forbidden'
            ], 403);
        }
        $storage->delete();
        StorageFacade::disk('public')->delete($storage->path); //public, s3
        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Storage deleted successfully'
        ]);
    }
}
