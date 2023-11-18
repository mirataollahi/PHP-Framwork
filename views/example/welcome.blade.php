<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Framework</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .welcome-message {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="welcome-container">
        <div class="welcome-message">
            Welcome to PHP Framework
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>