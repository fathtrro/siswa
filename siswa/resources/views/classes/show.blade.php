<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Kelas</title>
    <style>
        /* Tambahkan styling yang Anda inginkan */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1d002c;
            color: #333;
            padding: 20px;
        }

        h2 {
            color: #f2f0f7;
            margin-bottom: 20px;
            text-align: center;
        }
        h3{
            color: #d6cdcd;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .card {
            background-color: #252458;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 16px;
            transition: 0.4s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex;
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

<h2>Detail Kelas: {{ $class->class_name }}</h2>

<h3>Daftar Siswa</h3>

<div class="card-container">
    @foreach ($siswas as $siswa)
    <div class="card">
        <img src="/images/{{ $siswa->foto }}" alt="Foto {{ $siswa->nama }}" class="card-img">
        <div class="card-body">
            <h3 class="card-name">{{ $siswa->nama }}</h3>
            <p class="card-address">{{ $siswa->alamat }}</p>
            <div class="card-actions">
                <a href="{{ route('siswas.show', $siswa->id) }}" class="action-btn">Lihat</a>
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