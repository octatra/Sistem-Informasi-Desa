@extends('frontend.home')
@section('title')
    SID - Produk
@endsection
@section('content')
    <style>
        body {
            font-family: sans-serif;
        }

        /* Add WA floating button CSS */
        .floating {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .fab-icon {
            margin-top: 16px;
        }
    </style>
    <div class="col-lg-8">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ $detail->nama_produk }}</h4>
            <h5 class="m-0 text-uppercase font-weight-bold">Sumber : {{ $detail->sumber }}</h5>
        </div>
        <div class="bg-white border border-top-0 p-4 mb-3">
            <div class="mb-4">
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $detail->image) }}" alt="" width="100%">
                </div>
                <div class="mb-3">
                    <p class="m-0">{!! $detail->deskripsi !!}</p>
                </div>
                <!-- render the button and direct it to wa.me -->
                <a href="https://wa.me/{{ $detail->telpon }}?text=Hi%20Qiscus" class="floating" target="_blank">
                    <i class="fab fa-whatsapp fab-icon"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
