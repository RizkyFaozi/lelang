<!DOCTYPE html>
<html lang="en">
    @include('sources.head')
    <body class="sb-nav-fixed">
        @include('sources.navbar')

        @include('sources.sidebar')
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Upload Barang / Upload</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple" class="justify-content-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Barang Dibuat</th>
                                            <th>Harga Awal</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Barang Dibuat</th>
                                            <th>Harga Awal</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{asset('image/barang/'.$contact->image)}}" alt="" width="75">
                                            </td>
                                            <td>{{ $contact->nama_barang }}</td>
                                            <td>{{ $contact->tgl }}</td>
                                            <td>@rupiah($contact->harga_awal)</td>
                                            <td>{{ $contact->deskripsi }}</td>
                                            <td >
                                                <button class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#update{{$contact -> id_barang}}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                                    <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
                                                  </svg></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                @include('sources.footer')
            </div>
        </div>

        <!------------------------------------------------------- Modal Ubah------------------------------------------------------------------>
@foreach($contacts as $key)
<div class="modal" tabindex="-1" id="update{{$key -> id_barang}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" enctype="multipart/form-data" action="{{ url('/Upload/Tambah') }}" method="POST">
        {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Upload {{ $key->nama_barang }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" value="{{ $key->id_barang }}" name="id_barang">

                <input type="hidden" value="{{auth('petugas')->user()->id_petugas}}" name="id_petugas">

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="">Status</label>
                        <select class="form-control mt-2" id="level" aria-label="level"
                            name="status" required>
                            <option selected disabled>Pilih Status Lelang</option>
                            <option value="dibuka">Di Buka</option>
                            <option value="ditutup">Di Tutup</option>
                        </select>
                     <small class="text-danger error-msg"></small>
                 </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="tgl">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" value="" class="form-control mt-2 " required>
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="tgl">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" value="" class="form-control mt-2 " required>
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="modal-footer mb-2">
                    <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                      </svg></button>
                    <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                      </svg></button>
                </div>
        </form>
        </div>
</div>
@endforeach



@include('sources.script')

    </body>
</html>
