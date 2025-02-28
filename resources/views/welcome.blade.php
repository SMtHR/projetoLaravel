<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Laravel</title>

    @vite('resources/css/app.css')
</head>
<body class="text-center px-8 py-12">
    <h1>Welcome</h1>
    <p>Clique no botão para abrir a lista</p>

    <a href="/lista" class="btn mt-4 inline-block">Abrir Lista</a>
</body>
</html>
