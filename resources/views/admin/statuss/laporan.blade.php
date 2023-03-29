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
                    <li class="breadcrumb-item active">Generate Laporan</li>
                </ol>
                <div class="card mb-4">
                    <div class="mt-3">
                        <input type="button" value="Print" class=" ms-3 btn btn-primary" onclick="window.print()" />
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

    @include('sources.script')

</body>

</html>
