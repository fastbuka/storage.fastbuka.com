<!-- See https://rapidocweb.com/api.html for options -->
<!doctype html> <!-- Important: must specify -->
<html>
<head>
    <meta charset="utf-8"> <!-- Important: rapi-doc uses utf8 characters -->
    <script type="module" src="https://unpkg.com/rapidoc/dist/rapidoc-min.js"></script>
</head>
<body>
<rapi-doc
    spec-url="{{ config('app.docs') }}"
    render-style="read"
    allow-try="true"
>
            <img slot="logo" src="images/logo.png"/>
    </rapi-doc>
</body>
</html>
