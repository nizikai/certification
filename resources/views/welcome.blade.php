<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Button Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary">Primary Button</button>
        <button type="button" class="btn btn-secondary">Secondary Button</button>
        <button type="button" class="btn btn-success">Success Button</button>
        <button type="button" class="btn btn-danger">Danger Button</button>
        <button type="button" class="btn btn-warning">Warning Button</button>
        <button type="button" class="btn btn-info">Info Button</button>
        <button type="button" class="btn btn-light">Light Button</button>
        <button type="button" class="btn btn-dark">Dark Button</button>

        <div id="test">
            hello
        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
