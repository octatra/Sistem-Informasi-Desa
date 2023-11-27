@extends('frontend.home')
@section('title')
    SID - {{ $detail->judul }}
@endsection
@section('content')
    <div class="col-lg-8">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ $detail->judul }}</h4>
        </div>
        <div class="bg-white border border-top-0 p-4 mb-3">
            <div class="mb-4">
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $detail->image) }}" alt="" width="100%">
                </div>
                <div class="mb-3">
                    <p class="m-0">{!! $detail->deskripsi !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
