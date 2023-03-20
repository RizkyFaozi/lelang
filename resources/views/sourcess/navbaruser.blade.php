<!DOCTYPE html>
<html lang="">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link rel="stylesheet" href="{{asset('bot/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('bot/bootstrap/css/index.css')}}">
<title>Lelang</title>
<link rel="icon" type="image/gif/png" href="{{asset('image/lele.png')}}">
<style>
    .no-decoration {
        text-decoration: none;
    }
</style>
</head>

<body id="top">

    <!---Navbar Navbar-->
    <nav class=" bg-transparent border-bottom">
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <img src="{{asset('image/lele.png')}}" width="150" alt="">
                    </a>
                    <ul class="nav col-lg-auto justify-content-center  ms-lg-auto  ">

                        <li><a href="/" class="nav-link px-2 link-dark">{{auth('masyarakat')->user()->nama_lengkap}}</a></li>
                        <li><a href="hasil" class="nav-link px-2 link-dark">Cek Hasil</a></li>
                        <li><a href="{{route('logout')}}" class="nav-link px-2 link-dark">Logout</a></li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle text-dark px-2" data-bs-toggle="dropdown" role="button"
                                aria-expanded="false">
                                <img class="img-profile rounded" width="25" src="{{asset('image/th.jpeg')}}"></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="info.php">Profil</a></li>
                                <li><a class="dropdown-item" href="f.php" data-toggle="modal" data-target="#registermodal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Register
                                </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href=""{{route('logout')}}" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>


            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current
                            session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="registermodal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Register" For Create a new account For Your self
                                    Sele
                                    session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="register_user.php">register</a>
                                </div>
                            </div>
                        </div>
                    </div>



        </header>
    </nav>
