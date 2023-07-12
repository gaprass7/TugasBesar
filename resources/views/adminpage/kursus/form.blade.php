@extends('adminpage.index')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h2>Add Kursus</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url ('dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item"><a href="{{ url('kursus')}}">Kursus </a></li>
                <li class="breadcrumb-item active"><a href="{{url('kursus/create')}}">Add Data</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Add Kursus</h5>

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ route('kursus.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col-md-12 text-center">
                                    <div style="margin-top: 10px;">
                                        <img src="" id="output" width="180px" class="img-thumbnail">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Judul Kursus</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" name="judul">
                                        @error('judul')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Deskripsi Kursus</label>
                                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" name="deskripsi">
                                        @error('deskripsi')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Durasi Kursus</label>
                                        <input type="text" class="form-control @error('durasi') is-invalid @enderror" value="{{ old('durasi') }}" name="durasi">
                                        @error('durasi')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mx-auto text-center">
                                    <div style="margin-top: 10px;">
                                        <img src="" id="output" width="90px" class="img-thumbnail"  style="float: left;">
                                    </div>
                                    <input type="file" onchange="readFoto(event)" class="form-control-file @error('foto') is-invalid @enderror" value="{{ old('foto') }}" name="foto">
                                    @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <input type="file" onchange="readFoto(event)" class="form-control
                                        @error('foto') is-invalid @enderror" value="{{ old('foto') }}" name="foto">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- @foreach($row as $item)
                                <div class="checkbox">
                                    <label style="float: right;">
                                        <input type="checkbox" name="optionsCheckboxes">
                                        {{ $item->judul }}
                                    </label>
                                </div>
                                @endforeach --}}
                                {{-- @foreach($row as $r)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="options[]" value="{{ $r->judul }}">
                                        <label class="form-check-label" for="{{ $r->judul }}">
                                            {{ $r->judul }}
                                        </label>
                                    </div>
                                @endforeach --}}

                                <div class="text-center">
                                    <button class="btn btn-danger">
                                        <a style="color:white;" title="Batal" href=" {{ url('kursus') }}">Batal
                                        </a>
                                    </button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script type="text/javascript">
        var readFoto= function(event){
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = document.getElementById('output');
                output.src = dataURL;   
            };
            reader.readAsDataURL(input.files[0]);
        };
    
    </script>

    @endsection
