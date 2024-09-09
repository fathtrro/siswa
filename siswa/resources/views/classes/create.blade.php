<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d002c;
            color: aqua;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            color: #f5f5f5;
            margin-bottom: 20px;
        }
        form {
            background-color: #252458;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: aqua;
        }
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid aqua;
            border-radius: 5px;
            background-color: #1d002c;
            color: aqua;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: aqua;
            color: #1d002c;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #00cccc;
        }
    </style>
</head>
<body>
    <h1>Add New Class</h1>
    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div>
            <label for="class_name">Class Name:</label>
            <input type="text" id="class_name" name="class_name" required>
        </div>
        <button type="submit">Add Class</button>
    </form>
</body>
</html>