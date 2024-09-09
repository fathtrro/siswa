<!DOCTYPE html>
<html>
<head>
    <title>Edit  Data Siswa</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #190b2c;
            color: #eee3e3;
            padding: 20px;
        }

        h2 {
            color: #edeaf3;
            margin-bottom: 20px;
        }

        form {
            background-color: #252458;
            box-shadow: 0 0 1rem #252458;
            border-radius: 15px;
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
            color: #e0dde7;
        }

        input[type="text"], textarea, input[type="file"] {
            width: 95%;
            padding: 10px;
            border-radius: 30px;
            border: 2px solid aqua;
        }

        textarea {
            height: 100px;
            width: 95%;
        }

        button[type="submit"] {
            background-color: aqua;
            color: #252458;
            border: none;
            padding: 10px 30px;
            border-radius: 30px;
            font-size: 1em;
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: #252458;
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

<h2>EDIT SISWA</h2>

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

<form action="{{ route('siswas.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <strong>NAMA:</strong>
        <input type="text" name="nama" value="{{ $siswa->nama }}">
    </div>
    <div>
        <strong>ALAMAT:</strong>
        <textarea name="alamat">{{ $siswa->alamat }}</textarea>
    </div>
    <div>
        <strong>FOTO:</strong>
        <input type="file" name="foto">
        <img src="/images/{{ $siswa->foto }}" width="100">
    </div>
    <div>
        <strong>TANGGAL LAHIR:</strong>
        <input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir->format('Y-m-d') }}">
    </div>
    <div>
        <label for="school_class_id"><strong>KELAS:</strong></label>
        <select id="school_class_id" name="school_class_id" required>
            <option value="">Select Class</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ $class->id == $siswa->school_class_id ? 'selected' : '' }}>
                    {{ $class->class_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

</body>
</html>