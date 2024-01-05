<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Arial', sans-serif;
        }

        .container {
            z-index: 1;
        }

        .bg-light {
            background-color: #f8f9fa;
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

        .form-control {
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

        .background-blue {
            background-color: #217dbb; /* Warna biru tua */
            height: 100%;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0.8;
        }
    </style>
</head>

<body class="bg-light">
    <div class="background-blue"></div>
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <h2 class="nk-block-title fw-normal text-white">
                Pesan Dokter
            </h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-center">Register a new account
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input placeholder="Nama lengkap" class="form-control" type="text"
                                    name="fullname" id="fullname" required>
                                <input placeholder="NIK" class="form-control" type="text" name="nik"
                                    id="nik" required>
                                <input placeholder="Alamat" class="form-control " type="text"
                                    name="alamat" id="alamat" required>
                                <input placeholder="Nomer Hp" class="form-control" type="text"
                                    name="phone" id="phone" required>
                            </div>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <a href="loginpasien">
                                <p class="text-white">I have already an account</p>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
    $(document).ready(function () {
        var alertMessage = "{{ session('alert') }}";

        if (alertMessage) {
            alert(alertMessage);
        }
    });
</script>


