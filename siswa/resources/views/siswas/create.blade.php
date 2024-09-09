<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1d002c;
            color: #f7f1f1;
            padding: 20px;
        }

        h2 {
            color: #edeaf3;
            margin-bottom: 20px;
        }

        form {
            background-color: #252458;
            border-radius: 20px;
            box-shadow: 0 0 1rem #252458;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        form div {
            margin-bottom: 15px;
        }

        form strong {
            display: block;
            margin-bottom: 5px;
            color: #e3dfec;
        }

        input[type="text"], textarea, input[type="file"] {
            width: 95%;
            padding: 10px;
            border-radius: 20px;
            border: 2px solid aqua;
        }

        textarea {
            height: 100px;
        }

        button[type="submit"] {
            background-color: aqua;
            color: #1d002c;
            border: none;
            padding: 10px 30px;
            border-radius: 30px;
            font-size: 1em;
            font-weight: bold;
            transition: .3s;
        }

        button[type="submit"]:hover {
            background-color: #1d002c;
            color: aqua;
            box-shadow: 0 0 1rem aqua;
        }
    .error {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    </style>
</head>
<body>

<h2>TAMBAH SISWA</h2>

@if ($errors->any())
    <div>
        <strong>Whoops!</strong> Ada kesalahan pada input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('siswas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <strong>NAMA:</strong>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </div>
    <div>
        <strong>ALAMAT:</strong>
        <textarea name="alamat">{{ old('alamat') }}</textarea>
    </div>
    <div>
        <strong>FOTO:</strong>
        <input type="file" name="foto">
    </div>
    <div>
        <strong>TANGGAL LAHIR:</strong>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
    </div>
    <div>
        <label for="school_class_id"><strong>KELAS:</strong></label>
        <select id="school_class_id" name="school_class_id" required>
            <option value="">Pilih Kelas</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

</body>
</html>