<!DOCTYPE html>
<html lang="en">
    @include('sources.head')
    <body class="sb-nav-fixed">
        @include('sources.navbar')
       
        @include('sources.sidebar')
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>   
                        <div class="card mb-4">
                            <div class="card-header">
                                <button class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#tambah"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-plus-fill text-light" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                  </svg></button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama petugas</th>
                                            <th>Username</th>
                                            <th>Password Terkena hash tidak bisa di Lihat</th>
                                            <th>Level</th>
                                            <th>Id Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama petugas</th>
                                            <th>Username</th>
                                            <th>Password Terkena hash tidak bisa di Lihat</th>
                                            <th>Level</th>
                                            <th>Id Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $contact->nama_petugas }}</td>
                                            <td>{{ $contact->username }}</td>
                                            <td>{{ $contact->password }}</td>
                                            <td>{{ $contact->level }}</td>
                                            <td>{{ $contact->id_level }}</td>
                                            <td>
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#update{{$contact -> id_petugas}}"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="18" height="18" fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg></button>

                                                    <a class=" btn btn-warning" href="hapuspetugas/{{ $contact->id_petugas }}"
                                                        onclick="return confirm('Are you sure you want to delete this data?');"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                                            class="bi bi-trash text-light" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                        
                                                    </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

<!------------------------------------------------------- Modal tambah------------------------------------------------------------------>

<div class="modal" tabindex="-1" id="tambah" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="{{ url('/tambahpetugas') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Update Data </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="nama_petugas">Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="" class="form-control mt-2 " required
                        min-length="3" max-length="30">
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="" class="form-control mt-2 " required
                        min-length="5" max-length="30">
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" value="" class="form-control mt-2 " required
                    min-length="5" max-length="25">
                    <small class="text-danger error-msg"></small>
                </div>


                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="">Jenis Kelamin</label>
                        <select class="form-control mt-2" id="jenis_kelamin" aria-label="jenis_kelamin"
                            name="jenis_kelamin" required>
                            <option selected disabled>Jenis Kelamin</option>
                            <option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                     <small class="text-danger error-msg"></small>
                 </div>

                 <div class="col-8 ms-5 mb-3 form-group">
                    <label for="">Level</label>
                        <select class="form-control mt-2" id="level" aria-label="level"
                            name="level" required>
                            <option selected disabled>Pilih Role anda anda</option>
                            <option value="petugas" {{ old('level') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                     <small class="text-danger error-msg"></small>
                 </div>

                 <div class="col-8 ms-5 mb-3 form-group">
                    <label for="">Id Level</label>
                        <select class="form-control mt-2" id="id_level" aria-label="id_level"
                            name="id_level" required>
                            <option selected disabled>Pilih level anda</option>
                            <option value="1" {{ old('jenis_kelamin') == '1' ? 'selected' : '' }}>1 <- Petugas</option>
                            <option value="2" {{ old('jenis_kelamin') == '2' ? 'selected' : '' }}>2 <- Admin</option>
                        </select>
                     <small class="text-danger error-msg"></small>
                 </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </form>
        </div>
</div>
<!------------------------------------------------------- Modal Ubah------------------------------------------------------------------>
@foreach($contacts as $key)
<div class="modal" tabindex="-1" id="update{{$key -> id_petugas}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <form class="modal-content" action="ubahpetugas/{{$key->id_petugas}}" method="POST">
        {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Update Data {{ $key->id_petugas }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" value="{{ $key->id_petugas }}" name=id_petugas">

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="nama_petugas">Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="{{ $key->nama_petugas }}" class="form-control mt-2 " required
                        min-length="3" max-length="30">
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ $key->username }}" class="form-control mt-2 " required
                        min-length="5" max-length="30">
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="password"><p class="text-warning">Password</p>Tidak Biisa di ubah karna Ter Hash</label>
                    <input type="text" name="password" value="{{ $key->password }}" class="form-control mt-2 " disabled>
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="">Level</label>
                        <select class="form-control mt-2" id="level" aria-label="level"
                            name="level" required>
                            <option selected disabled>Pilih Role anda anda</option>
                            <option {{old('level',$key->level)=="petugas"? 'selected':''}} value="petugas">Petugas</option>
                            <option {{old('level',$key->level)=="admin"? 'selected':''}} value="admin">Admin</option>
                        </select>
                     <small class="text-danger error-msg"></small>
                 </div>

                 <div class="col-8 ms-5 mb-3 form-group">
                    <label for="">Id Level</label>
                        <select class="form-control mt-2" id="id_level" aria-label="id_level"
                            name="id_level" required>
                            <option selected disabled>Pilih level anda</option>
                            <option {{old('id_level',$key->id_level)=="1"? 'selected':''}} value="1">1 <- Petugas</option>
                            <option {{old('id_level',$key->id_level)=="2"? 'selected':''}} value="2">2 <- Admin</option>
                        </select>
                     <small class="text-danger error-msg"></small>
                 </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="close btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                </div>
        </form>
        </div>
</div>
@endforeach


@include('sources.script')

    </body>
</html>
