<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d002c;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            color: aqua;
            margin-right: 10px;
        }
        form {
            background-color: #252458;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 12px;
            border: none;
            border-radius: 4px;
        }
        button {
            background-color: aqua;
            color: #1d002c;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1d002c;
            color: aqua;
            border: 1px solid aqua;
        }
        .error-messages {
            background-color: #ff4c4c;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .error-messages ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
    </style>
</head>
<body>
    <h1>Edit Class</h1>
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('classes.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="class_name">Class Name:</label>
            <input type="text" id="class_name" name="class_name" value="{{ $class->class_name }}" required>
        </div>
        <button type="submit">Update Class</button>
    </form>
</body>
</html>