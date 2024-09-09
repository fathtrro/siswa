<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d002c;
            color: aqua;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #eeeeee;
        }
        table a {
            color: aqua;
            text-decoration: none;
            margin: 0 10px;
            padding: 10px 20px;
            border: 2px solid aqua;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        table a:hover {
            background-color: aqua;
            color: #1d002c;
        }
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid aqua;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: rgb(37, 36, 88);
        }
        nav{
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 4fr;
            justify-content: center;
            align-items: center;
        }
        nav img{
            width: 100px;
        }
        nav .item-nav{
            padding: 10px 0;
            border-radius: 50px;
            display: flex;
            justify-content: space-evenly;
            right: 20%;
            left: 20%;
            background: rgba(37, 36, 88, 0.5);
            position: fixed;
            backdrop-filter: blur(7px);
            z-index: 99;
        }
        nav .item-nav a{
            border-radius: 30px;
            color: aqua;
            padding: 7px 15px;
            text-decoration: none;
            transition: 0.3s;
        }
        nav .item-nav a:hover{
            background-color: aqua;
            color: #1d002c;
        }
        .action-btn {
            margin-right: 10px;
        }
        .delete-btn {
            background-color: #ff1919;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .delete-btn:hover {
            background-color: #c50000;
        }
        .success-message {
            background-color: #252458;
            color: aqua;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <img src="img/vanoise-capital.png" alt="">
        <div class="item-nav">
            <a href="{{ url('siswas') }}">Daftar Siswa</a>
            <a href="{{ url('classes') }}">Daftar Kelas</a>
            <a href="{{ route('classes.create') }}">Tambah Kelas</a>
        </div>
    </nav>
    
    @if ($message = Session::get('success'))
        <p class="success-message">{{ $message }}</p>
    @endif

    <h1>Class List</h1>

    <table>
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->class_name }}</td>
                    <td>
                        <a href="{{ route('classes.show', $class->id) }}" class="action-btn">Lihat Siswa</a>
                        <a href="{{ route('classes.edit', $class->id) }}" class="action-btn">Edit</a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <script>
        function confirmDelete(event) {
            if (!confirm('Apakah Anda yakin untuk menghapus?')) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>