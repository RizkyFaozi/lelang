<!DOCTYPE html>
<html lang="en">
@include('sources.head')

<body class="sb-nav-fixed">
    @include('sources.navbar')

    @include('sources.sidebar')
    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Status Barang</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Upload Barang / Status</li>
                </ol>
                <div class="card mb-4">
                    <div class="mt-3">
                        <input type="button" value="Print" class=" ms-3 btn btn-primary" onclick="window.print()" />
                        <h3 class="text-primary text-center">
                            Status Barang
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="justify-content-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th> Id user</th>
                                    <th>Harga Ahkir</th>
                                    <th>Harga Awal</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th> Id user</th>
                                    <th>Harga Ahkir</th>
                                    <th>Harga Awal</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{asset('image/barang/'.$contact->barang->image)}}" alt=""
                                            width="100">
                                    </td>
                                    <td>{{ $contact->barang->nama_barang }}</td>
                                    <td>{{ $contact->tgl_mulai }}</td>
                                    <td>{{ $contact->tgl_selesai }}</td>
                                    <td>{{ $contact->id_user }}</td>
                                    <td>{{ $contact->harga_ahkir }}</td>
                                    <td>@rupiah($contact->barang->harga_awal)</td>
                                    <td>{{ $contact->status }}</td>
                                    <td>
                                        {{-- Jika milih Status dibuka masih bisa edit tanggal --}}
                                        @if ($contact->status == 'dibuka')
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#hasil{{$contact->barang->id_barang}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                          </svg></button>
                                        @endif
                                        @if ($contact->status == 'ditutup')
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#update{{$contact->id_lelang}}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></button>

                                        <a class=" btn btn-warning" href="hapuslelang/{{ $contact->id_lelang }}"
                                            onclick="return confirm('Are you sure you want to delete this data?');"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" class="bi bi-trash text-light" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>
                                        @endif
                                        @if ($contact->status == 'selesai')
                                        <p class="text-center text-warning ">Pemenang Telah Di Tentukan!!</p>
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#update{{$contact->id_lelang}}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></button>

                                        <a class=" btn btn-warning" href="hapuslelang/{{ $contact->id_lelang }}"
                                            onclick="return confirm('Are you sure you want to delete this data?');"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" class="bi bi-trash text-light" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>
                                        @endif
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

    <!------------------------------------------------------- Pemenang------------------------------------------------------------------>
    @foreach($contacts as $key)
    <div class="modal" tabindex="-1" id="update{{$key->id_lelang}}" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="ubahlelang/status/{{$key->id_lelang}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Update Data {{ $key->barang->nama_barang }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" value="{{ $key->id_lelang }}" name=id_lelang">

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" value="{{ $key->tgl_mulai }}" class="form-control mt-2 ">
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" value="{{ $key->tgl_selesai }}" class="form-control mt-2 ">
                    <small class="text-danger error-msg"></small>
                </div>

                <div class="col-8 ms-5 mb-3 form-group">
                    <label for="">Status</label>
                        <select class="form-control mt-2" id="status" aria-label="status"
                            name="status" required>
                            <option {{old('status',$key->status)=="dibuka"? 'selected':''}} value="dibuka">Di Buka</option>
                            <option {{old('status',$key->status)=="ditutup"? 'selected':''}} value="ditutup">Di Tutup</option>
                        </select>
                     <small class="text-danger error-msg"></small>
                 </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="close btn-primary" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach


    @foreach($contacts as $key)
    <div class="modal" tabindex="-1" id="hasil{{$key->barang->id_barang}}" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="ubahlelang/pemanang/{{$key->id_lelang}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Pemenang {{ $key->barang->nama_barang }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" value="{{ $key->id_lelang }}" name=id_lelang">
                <div class="col-8 ms-5 mb-3 form-group">
                    <label class="col-form-label" for="id_user">User Pemenang</label>
                    <select class="form-control" id="id_user" aria-label="id_user" name="">
                        <option value="" selected disabled>Tidak Ada Pemenang</option>
                        @php 
                        $menang = \App\Models\historymodel::where('id_lelang', $key->id_lelang)
                            ->orderBy('penawaran_harga', 'DESC')->first();
                        @endphp

                        @if($menang) 
                            <option value="{{ $menang->id_user}}" selected disabled>{{ $menang->id_user }} -> {{$menang->masyarakat->nama_lengkap}} -> @rupiah($menang->penawaran_harga)</option>
                        @endif
                    </select>

                    @if($menang)
                        <input type="hidden" name="id_user" value="{{ $menang->id_user}}">
                        <input type="hidden" name="harga_ahkir" value="{{ $menang->penawaran_harga}}">
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="close btn-primary" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach



    @include('sources.script')

</body>

</html>
