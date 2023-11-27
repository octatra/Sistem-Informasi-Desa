@extends('backend.index')
@section('title')
    SID - Dashboard
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profil Desa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Profil Desa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('profil.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . $data->logo) }}" alt="Logo Desa" style="height: 200px;">
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Desa</label>
                                <input type="text" class="form-control" id="nama_desa" name="nama_desa"
                                    placeholder="Nama Desa" value="{{ $data->nama_desa }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Desa</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alamat Desa</label>
                                <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukan Alamat Desa ...">{{ $data->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Map</label>
                                <textarea class="form-control" rows="3" id="map" name="map" placeholder="Masukan URL Map ...">{{ $data->map }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Penduduk</label>
                                <input type="text" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk"
                                    placeholder="Jumlah Penduduk" value="{{ $data->jumlah_penduduk }}">
                            </div>
                            <div class="form-group">
                                <label>Telepone</label>
                                <input type="text" class="form-control" id="telepone" name="telepone"
                                    placeholder="Telepone" value="{{ $data->telepone }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    value="{{ $data->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Desa</label>
                                <textarea class="summernote" rows="100" id="deskripsi" name="deskripsi" placeholder="Deskripsi ...">{{ $data->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- Inisialisasi Summernote -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Tinggi editor
                minHeight: null, // Tinggi minimum editor
                maxHeight: null, // Tinggi maksimum editor
                focus: true, // Fokus otomatis pada editor saat dimuat
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']]
                ]
                // ... dan opsi lainnya sesuai kebutuhan Anda
            });
        });
    </script>
@endsection
