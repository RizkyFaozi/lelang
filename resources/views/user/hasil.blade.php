
<!DOCTYPE html>
<html lang="en">
    @include('sources.head')
<body>
    @include('sourcess.navbaruser')

    <div class="row mb-2 py-5 justify-content-center">
        @foreach ($barang as $key)
            <!--kolom untuk barang yang dibeli-->
            <div class="col-md-3">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static align-items-center">
                        <div class="mb-1 text-muted">
                            No lelang : {{ $loop->iteration }}
                        </div>
                        <td>
                            <img src="{{asset('image/barang/'.$key->barang->image)}}" width="100">
                        </td>
                        <h3 class="mb-0">
                            {{ $key->barang->nama_barang }}
                        </h3>
                        <p class="mb-0">
                            Deskripsi :
                            {{ $key->barang->deskripsi }}
                        </p>
                        <div class="mb-1 text-muted">
                            {{ $harga_tertinggi }}
                        </div>
                        <a class="btn btn-secondary mt-3" href="" onclick="return confirm('Are you sure you want to cancel this Transaction?');"> Cancel Transaction</a>
                        </td>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    </div>


</body>

@include('sources/script')

</html>
