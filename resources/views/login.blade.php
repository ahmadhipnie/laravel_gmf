<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GMF</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .center-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .center-logo img {
            max-width: 100%;
            height: auto;
            width: 500px; /* ukuran yang lebih besar */
        }
        @media (max-width: 768px) {
            .center-logo img {
                width: 80%; /* Sesuaikan ukuran gambar pada layar kecil */
            }
        }
        body {
            background-image: url('img/img_bg_login.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background-color: rgba(217, 232, 240, 0.7); /* Opacity 70% */
            padding: 40px; /* Tambahkan padding untuk memberikan lebih banyak ruang di dalam card */
            max-width: 1400px; /* Lebar card yang lebih besar */
        }
    </style>

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                <div class="center-logo">
                                    <img src="img/img_logo_garuda.png" alt="Logo Garuda">
                                </div>
                            </div>
                            <div class="col-lg-8 d-flex align-items-center justify-content-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-white mb-4" style="font-size: 40px ; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Login</h1>
                                    </div>

                                    <form class="user" action="{{ route('loginn') }}" method="POST">
                                        @csrf <!-- Include CSRF token -->
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nip"
                                                placeholder="enter nip" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="enter password" required>
                                        </div>
                                        <button type="submit" class="btn-user btn-block mb-4" style="background-color: #23274D; color: white; font-size: 20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif" align="center" >
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
   {{-- @include('layout.footer') --}}

   <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
