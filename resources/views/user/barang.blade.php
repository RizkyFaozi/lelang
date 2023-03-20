@include('sources.head')

@include('sourcess.navbaruser')

<body>

    <!--kolom untuk beli produk-->
    <div class="container">
        <div class="card ">
            <div class="card-body h-25 shadow   ">

                <h3 class="text-center py-4 fs-1">Tawar Produk {{ $barang->barang->nama_barang }}</h3>
                <form method="POST" action="{{ url('/user/barangmasuk') }}">
                    {{ csrf_field() }}
                    <div class="container-fluid ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{asset('image/barang/'.$barang->barang->image)}}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="col-lg-7  offset-lg-1">

                                    <label class="fs-2 "><strong>{{ $barang->barang->nama_barang }}</strong></label>
                                    <br>
                                    <br>
                                        <p class="card-subtitle text-muted">Deskripsi : <strong>{{ $barang->barang->deskripsi }}</strong></p>

                                    <p><strong> Mulai : {{ $barang->tgl_mulai }}</strong></p>
                                    <p><strong>Tanggal Selesai : {{ $barang->tgl_selesai }}</strong></p>

                                    <div class="row g-2">
                                        <label
                                            class="text-Primary fs-3"><strong>@rupiah($barang->barang->harga_awal)</strong></label>
                                        <br>
                                        <div class="col-md form-group">
                                            <div class="form-floating">
                                                <input type="number" class="form-control mx-auto" id="penawaran_harga"
                                                    name="penawaran_harga" min-value="{{ $harga_tertinggi }}" required>
                                                <label for="">Tawar harga</label>
                                            </div>
                                            <small class="text-danger error-msg"></small>
                                            
                                            <input type="hidden" name="id_barang"
                                                value="{{$barang->barang->id_barang}}">
                                            <input type="hidden" name="id_lelang" value="{{$barang->id_lelang}}">
                                            <input type="hidden" name="id_user"
                                                value="{{auth('masyarakat')->user()->id_user}}">
                                        </div>
                                    </div>

                                    <div class="from-group py-4">
                                        <button class="btn btn-primary" type="submit"
                                            onclick="return confirm('Apakah anda yakin ini Menawar produk Ini?!');">Tawar
                                            Produk</button>
                                        <a href="/" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="">No</th>
                            <th scope="">Nama Barang</th>
                            <th scope="">Nama Pelanggan</th>
                            <th scope="">Harga yang Di tawar</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($contactsharga as $key)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{$key->barang->nama_barang}}</td>
                            <td>{{$key->masyarakat->nama_lengkap}}</td>
                            <td>@rupiah($key->penawaran_harga)</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sources.footer')
    @include('sources.script')
</body>

</html>
