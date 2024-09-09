<!DOCTYPE html>
<html>
    <head>
        <title>Detail Siswa</title>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #1d002c;
                color: #ebdfdf;
                margin: 0;
                padding: 20px;
            }
    
            h2 {
                color: #d5d1df;
                margin-bottom: 20px;
                text-align: center;
            }
    
            .detail-container {
                background-color: #252458;
                border-radius: 20px;
                box-shadow: 0 0 1rem #252458;
                padding: 20px;
                max-width: 600px;
                margin: 0 auto;
            }
    
            .profile-header {
                display: flex;
                align-items: center;
                border-bottom: 2px solid #f9e2af;
                padding-bottom: 20px;
                margin-bottom: 20px;
            }
    
            .profile-header img {
                border-radius: 50%;
                width: 150px;
                height: 150px;
                object-fit: cover;
                border: 4px solid aqua;
                margin-right: 20px;
            }
    
            .profile-header .name {
                color: #e4d9d9;
                font-size: 1.5em;
                margin: 0;
            }
    
            .profile-header .address {
                color: #c7f5ff;
                font-size: 1.1em;
                margin: 0;
            }
    
            .detail-item {
                margin-bottom: 15px;
                font-size: 1.1em;
            }
    
            .detail-item strong {
                color: #c7f5ff;
                display: block;
                margin-bottom: 5px;
            }
    
            a {
                display: inline-block;
                background-color: aqua;
                color: #252458;
                padding: 12px 30px;
                border-radius: 30px;
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                transition: background-color 0.3s;
            }
    
            a:hover {
                background-color: #252458;
                color: aqua;
                box-shadow: 0 0 1rem aqua;
            }
    
            @media (max-width: 768px) {
                .profile-header {
                    flex-direction: column;
                    align-items: center;
                }
    
                .profile-header img {
                    margin-bottom: 20px;
                }
    
                .profile-header .name {
                    text-align: center;
                }
    
                .profile-header .address {
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
    
    <h2>DETAIL SISWA</h2>
    
    <div class="detail-container">
        <div class="profile-header">
            <img src="/images/{{ $siswa->foto }}" alt="Foto {{ $siswa->nama }}">
            <div>
                <h3 class="name">{{ $siswa->nama }}</h3>
                <p class="address">{{ $siswa->alamat }}</p>
            </div>
        </div>
    
        <div class="detail-item">
            <strong>NAMA:</strong>
            {{ $siswa->nama }}
        </div>
        <div class="detail-item">
            <strong>ALAMAT:</strong>
            {{ $siswa->alamat }}
        </div>
        <div class="detail-item">
            <strong>TANGGAL LAHIR:</strong>
            {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}
        </div>
        <div class="detail-item">
            <strong>KELAS:</strong>
            {{ $class->class_name }}
        </div>
        <div class="detail-item">
            <strong>FOTO:</strong>
            <img src="/images/{{ $siswa->foto }}" width="150" alt="Foto {{ $siswa->nama }}">
        </div>
        
    
        <a href="{{ route('siswas.index') }}">Kembali</a>
    </div>
    
    </body>
</html>