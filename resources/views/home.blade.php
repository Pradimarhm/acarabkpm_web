<!DOCTYPE html>
<html lang="{{str_replace('_','_',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div >
        <div class="container">
            <h1 class="display-4">Halaman Home</h1>
            <p class="lead"> Halaman ini merupakan halaman home</p>
        </div>
    </div>
</body>
</html>