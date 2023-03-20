<!DOCTYPE html>
<html lang="en">

<head>
    @include('sources.head')
</head>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container py-5 mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Lelang Online</h3></div>
                                <div class="card-body">
                                    <form action="{{route('postlogin')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" type="text" placeholder="Enter Username" name="username" />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" placeholder="Password" name="password"/>
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-betwee mb-0">
                                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- jQuery -->
    @include('sources.script')
</body>

</html>