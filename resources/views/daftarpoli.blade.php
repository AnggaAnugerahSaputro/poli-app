<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Poli</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            z-index: 1;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #217dbb;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <h2 class="nk-block-title fw-normal">Pesan Dokter</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Daftar Poli</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('daftarpolipasien') }}">
                        @csrf
                            <div class="form-group">
                            <input type="hidden" name="pasienId" value="{{ $idPasien }}">
                                <input value="{{$pasienRm}}" class="my-1 form-control" type="text" name="nik" id="nik"
                                    disabled>
                                <select class="my-1 form-control" name="jadwal" id="jadwal">
                                    <option value="" selected disabled>Pilih Jadwal</option>
                                    @foreach($jadwalOptions as $jadwal)
                                    <option value="{{ $jadwal->id }}">
                                        {{ $jadwal->hari }} - {{ $jadwal->jam_mulai }} to {{ $jadwal->jam_selesai }}
                                        - Dokter: {{ $jadwal->dokter->nama }} - Poli: {{
                                        $jadwal->dokter->poli->nama_poli }}
                                    </option>
                                    @endforeach
                                </select>

                                <textarea class="my-1 form-control" type="text" name="keluhan" id="keluhan"
                                    placeholder="Keluhan"></textarea>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
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
    </script>

</body>

</html> -->



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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .header {
            background-color: #f1f1f1;
            padding: 20px;
            text-align: left;
        }

        .header a {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }

        .header a:hover {
            color: #4682B4;
        }

        .sidebar {
            background-color: blue;
            width: 200px;
            height: 100%;
            position: fixed;
            padding: 20px 0;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: white;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
        }

        .welcome {
            color: #4682B4;
            margin-bottom: 20px;
        }

        /* Additional Styles for Register Form */
        .register-form {
            margin-top: 20px;
            /* max-width: 400px;
            margin-left: auto;
            margin-right: auto; */
        }

        .register-form .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="#">Poliklinik</a>

    </div>

    <div class="sidebar">
        <a href="#">Poliklinik Dashboard</a>
        <a href="#" onclick="logout()">Sign out</a>
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



