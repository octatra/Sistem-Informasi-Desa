@extends('backend.index')
@section('title')
    SID - Edit Produk
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Produk</a></li>
                            <li class="breadcrumb-item active">Edit Produk</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Produk</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('produk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    placeholder="Nama Desa" value="{{ $data->nama_produk }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    placeholder="Kategori" value="{{ $data->kategori }}">
                            </div>
                            <div class="form-group">
                                <label>Sumber</label>
                                <input type="text" class="form-control" id="sumber" name="sumber"
                                    placeholder="Sumber" value="{{ $data->sumber }}">
                            </div>
                            <div class="form-group">
                                <label>Telepon / Wa</label>
                                <input type="text" class="form-control" id="telpone" name="telpone"
                                    placeholder="Telepon / Wa" value="{{ $data->telpone }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
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
