<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1d002c;
            color: #333;
            margin: 0;
            object-fit: cover;
        }

        h2 {
            color: #f2f0f7;
            margin-bottom: 20px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: rgb(241, 241, 241);
        }

        .navbar{
            padding: 8px 0;
            width: 100vw;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            background: rgba(37, 36, 88, .5);
            overflow: hidden;
            position: fixed;
            z-index: 99;
            backdrop-filter: blur(10px);
            top: 0;

        }
        .navbar .item-1{
            margin-left: 20px;
            display: flex;
            justify-content: start;
            align-items: center;
            gap: 30px;
            transition: .4s;
        }
        .navbar .item-1 img{
            width: 105px;
        }
        .navbar .item-2{
            margin-right: 30px;
            display: flex;
            justify-content: end;
            align-items: center;
            gap: 10px;
            transition: .4s;
        }
        .navbar .item-1 a:hover, .item-2 a:hover, .logout:hover{
            color: aqua;
            font-weight: bold;
            text-shadow: 0 0 1rem aqua;
        }

        .navbar .logout{
            transition: .3s;
        }

        .navbar .logout:hover{
            
            font-weight: bold;
        }

        .add-button {
            display: inline-block;
            background-color: aqua;
            color: #1d002c;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
            transition: .3s
        }

        .add-button:hover{
            background-color: #1d002c;
            color: aqua;
            box-shadow: 0 0 1rem aqua
        }

        .title{
            margin-top: 100px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin: 20px;
        }

        .card {
            background-color: #252458;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 16px;
            /* width: calc(33.333% - 32px); */
            transition: 0.4s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 1rem aqua;
        }

        .card-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid aqua;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .card-body {
            text-align: center;
        }

        .card-name {
            margin: 10px 0;
            font-size: 1.2em;
            color: #fcfbff;
        }

        .card-address {
            color: #d6cdcd;
        }

        .card-actions {
            margin-top: 10px;
        }

        .action-btn {
            display: inline-block;
            background-color: aqua;
            color: #252458;
            padding: 8px 20px;
            border-radius: 25px;
            margin: 0 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .action-btn:hover {
            background-color: #252458;
            color: aqua;
            box-shadow: 0 0 1rem aqua;
        }

        .delete-form {
            display: inline;
        }

        button[type="submit"] {
            background-color: #e91111;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: bold;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #252458;
            color: #fff;
            box-shadow: 0 0 1rem #e91111;
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }

            .card-img {
                width: 80px;
                height: 80px;
            }

            button[type="submit"] {
            margin-top: 10px;
            }
        }

        @media (max-width: 480px) {
            .card-container {
                grid-template-columns: 1fr;
            }
            .card-name {
                font-size: 1em;
            }

            .card-address {
                font-size: 0.9em;
            }

            .action-btn {
                padding: 6px 10px;
                font-size: 0.9em;
            }

            button[type="submit"] {
                padding: 8px 16px;
                font-size: 0.9em;
            }

            textarea {
                height: 80px;
            }
        }
    </style>
</head>
<body>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>



<div class="navbar">
    <div class="item-1">
        <img src="img/vanoise-capital.png" alt="">
        <a href="{{url('siswas')}}">Daftar Siswa</a>
        <a href="{{url('classes')}}">Daftar Kelas</a>
    </div>
    <div class="item-2">
        <a href="{{ route('siswas.create') }}" class="add-button">Tambah Siswa</a>
        <a href="{{ route('logout') }}" 
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
        Logout
        </a>
    </div>
</div>

<h2 class="title">DAFTAR SISWA</h2>

@if ($message = Session::get('success'))
    <p class="success-message">{{ $message }}</p>
@endif

<div class="card-container">
    @foreach ($siswas as $siswa)
    <div class="card">
        <img src="/images/{{ $siswa->foto }}" alt="Foto {{ $siswa->nama }}" class="card-img">
        <div class="card-body">
            <h3 class="card-name">{{ $siswa->nama }}</h3>
            <p class="card-address">{{ $siswa->alamat }}</p>
            <div class="card-actions">
                <a href="{{ route('siswas.show', $siswa->id) }}" class="action-btn">Lihat</a>
                <a href="{{ route('siswas.edit', $siswa->id) }}" class="action-btn">Edit</a>
                <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" class="delete-form" onsubmit="confirmDelete(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    function confirmDelete(event) {
        if (!confirm('Apakah Anda yakin untuk menghapus?')) {
            event.preventDefault();
        }
    }
</script>

</body>
</html>