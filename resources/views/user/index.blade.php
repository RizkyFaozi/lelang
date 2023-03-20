
@include('sources.head')

@include('sourcess.navbaruser')
<body class="sb-nav-fixed">

    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-primary">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Welcome To Lelang</h1>
                <p class="lead my-3">"
                    hello, 'this is the place to buy equipment' so let's buy it to complete your stuff"</p>
                <p class="lead mb-0">
                    <a href="#" class="text-white fw-bold">products currently being auctioned...</a>
                </p>
            </div>
        </div>
    </main>

    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">

                @foreach($contacts as $contact)
                <div class="card ms-2 mt-3 h-100 me-2" style="width: 16rem; ">
                    <img src="{{asset('image/barang/'.$contact->barang->image)}}" height="200" class="card-img-top mt-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center" ><strong>{{ $contact->barang->nama_barang }}</strong></h5>
                        <p class="mb-3">Tanggal Mulai : {{ $contact->tgl_mulai }}</p>
                        <p>Tanggal Selesai : {{ $contact->tgl_selesai }}</p>
                        <p class="card-text">{{ $contact->barang->deskripsi }}</p>
                        <a href="/user/barang/{{ $contact->id_lelang }}" class="btn btn-primary float-end">Tawar Barang</a>
                    </div>
                </div>
    @endforeach
    </div>
    </div>
    </div>
    @include('sources.script')
</body>

</html>
