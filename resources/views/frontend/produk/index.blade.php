@extends('frontend.home')
@section('title')
    SID - Produk Desa
@endsection
@section('content')
    <div class="col-lg-8">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Produk Desa</h4>
        </div>
        <div class="row mt-3">
            @foreach ($dataProduk as $item)
                <div class="col-lg-6">
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $item->image) }}" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="{{ url('produk-detail', $item->id) }}">{{ $item->kategori }}</a>
                                <a class="text-body"
                                    href="{{ url('produk-detail', $item->id) }}"><small>{{ $item->sumber }}</small></a>
                            </div>
                            <a class="h5 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                href="{{ url('produk-detail', $item->id) }}">{{ Str::limit($item->nama_produk, 50) }}</a>
                            <p class="m-0">{!! Str::limit($item->deskripsi, 100) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
