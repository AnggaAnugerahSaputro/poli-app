<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #495057;
        }

        .header {
            background-color: #007bff;
            padding: 20px;
            text-align: left;
            color: #fff;
        }

        .header a {
            margin-left: 30px;
            text-decoration: none;
            color: #ffffff;
        }

        .header a:hover {
            color: #0056b3;
        }

        .sidebar {
            background-color: #343a40;
            width: 200px;
            height: 100%;
            position: fixed;
            padding: 20px 0;
            transition: 0.3s;
        }

        .sidebar a {
            display: block;
            color: #adb5bd;
            padding: 10px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .welcome {
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Additional Styles for Register Form */
        .register-form {
            margin-top: 20px;
        }

        .register-form .card {
            margin-top: 20px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="#" class="text-white">Poliklinik</a>
    </div>

    <div class="sidebar">
        <a href="#" class="text-white">Poliklinik Dashboard</a>
        <a href="#" onclick="logout()" class="text-white">Sign out</a>
    </div>

    <div class="content">
        <h1 class="welcome">Daftar Poli</h1>

        <!-- Register Form -->
        <div class="register-form">
            <div class="card">
                <div class="card-header">Daftar Poli</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('daftarpolipasien') }}">
                        @csrf
                        <input type="hidden" name="pasienId" value="{{ $idPasien }}">
                        <input value="{{$pasienRm}}" class="my-1 form-control" type="text" name="nik" id="nik"
                            disabled>
                        <select class="my-1 form-control" name="jadwal" id="jadwal">
                            <option value="" selected disabled>Pilih Jadwal</option>
                            @foreach($jadwalOptions as $jadwal)
                            <option value="{{ $jadwal->id }}">
                                {{ $jadwal->hari }} - {{ $jadwal->jam_mulai }} to {{ $jadwal->jam_selesai }}
                                - Dokter: {{ $jadwal->dokter->nama }} - Poli: {{ $jadwal->dokter->poli->nama_poli }}
                            </option>
                            @endforeach
                        </select>
                        <textarea class="my-1 form-control" type="text" name="keluhan" id="keluhan"
                            placeholder="Keluhan"></textarea>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize Select2
            $('#jadwal').select2({
                theme: 'bootstrap',
                placeholder: 'Pilih Jadwal',
                allowClear: true,
                width: '100%'
            });
            $('.select2-container').addClass('form-control');
        });

        // Fungsi logout
        function logout() {
            // Redirect ke halaman login
            window.location.href = '/admin/login'; // Ganti dengan URL login yang sesuai
        }
    </script>
</body>

</html>
