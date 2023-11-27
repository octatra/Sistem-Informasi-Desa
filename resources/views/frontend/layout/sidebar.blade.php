<div class="col-lg-4">
    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Produk Terbaru</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            @foreach ($produk as $item)
                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                    <img class="img-fluid" src="{{ asset('storage/' . $item->image) }}" alt="" width="150px"
                        style="height: 110px;">
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                href="">{{ $item->kategori }}</a>
                            <a class="text-body"
                                href=""><small>{{ $item->getPublishedAtFormattedAttribute() }}</small></a>
                        </div>
                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                            href="{{ url('produk-detail/' . $item->id) }}">{{ $item->nama_produk }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Popular News End -->

    <!-- Ads Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Lokasi Desa</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <div class="img-fluid">

                {!! $data->map !!}
            </div>
            <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
        </div>
    </div>
    <!-- Ads End -->
</div>
