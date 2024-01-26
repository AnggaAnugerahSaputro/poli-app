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
            background: linear-gradient(135deg, #2980b9, #3498db);
            color: #fff;
        }

        .container {
            z-index: 1;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            border-radius: 15px;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #2c3e50;
            color: #fff;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 5px;
            height: 50px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #e74c3c;
            border: none;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #c0392b;
        }

        .background-blue {
            background: linear-gradient(135deg, #2980b9, #3498db);
            height: 100%;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0.8;
            z-index: -1;
        }

        .title {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="background-blue"></div>
    <div class="container mt-5">
        <div class="title">Pesan Dokter</div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register a new account</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input placeholder="Nama lengkap" class="form-control" type="text" name="fullname"
                                    id="fullname" required>
                                <input placeholder="NIK" class="form-control" type="text" name="nik" id="nik" required>
                                <input placeholder="Alamat" class="form-control " type="text" name="alamat" id="alamat"
                                    required>
                                <input placeholder="Nomer Hp" class="form-control" type="text" name="phone" id="phone"
                                    required>
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
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </form>
                        <p class="login-link"><a href="loginpasien" class="text-white">I have already an account</a></p>
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

</html>
