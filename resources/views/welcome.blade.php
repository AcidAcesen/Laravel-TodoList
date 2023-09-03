<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Todo List</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Inline Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            margin: 0;
        }

        form {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center align form content horizontally */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>

        <form method="post" action="{{ route('saveItem') }}" accept-charset="UTF-8">
            {{ csrf_field() }}
            <label for="ListItem">New Todo Item</label>
            <input type="text" name="ListItem">
            <button type="submit">Save Item</button>
        </form>

        @foreach ($listItems as $ListItem)
            <p>Item: {{ $ListItem->name }}</p>
            <form method="post" action="{{ route('markComplete',$ListItem->id) }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <button type="submit">Complete</button>
            </form>
        @endforeach
    </div>
</body>
</html>
