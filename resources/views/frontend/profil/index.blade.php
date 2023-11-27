@extends('frontend.home')
@section('title')
    SID - Profil Desa
@endsection
@section('content')
    <div class="col-lg-8">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Profil Desa {{ $data->nama_desa }}</h4>
        </div>
        <div class="bg-white border border-top-0 p-4 mb-3">
            <div class="mb-4">
                <h6 class="text-uppercase font-weight-bold">Desa {{ $data->nama_desa }}</h6>
                <p class="mb-4">{!! $data->deskripsi !!}</p>
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                        <h6 class="font-weight-bold mb-0">Lokasi</h6>
                    </div>
                    <p class="m-0">{{ $data->alamat }}</p>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-envelope-open text-primary mr-2"></i>
                        <h6 class="font-weight-bold mb-0">Email</h6>
                    </div>
                    <p class="m-0">{{ $data->email }}</p>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-phone-alt text-primary mr-2"></i>
                        <h6 class="font-weight-bold mb-0">Telepone</h6>
                    </div>
                    <p class="m-0">{{ $data->telepone }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
