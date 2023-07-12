@extends('adminpage.index')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h2>Edit Kursus</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url ('dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item"><a href="{{ url('kursus')}}">Kursus </a></li>
                <li class="breadcrumb-item active"><a href="#">Edit Data</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Kursus</h5>

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ route('kursus.update', $row->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- @empty($row->foto)
                                    <img src="{{ url('admin/img/noprofile.png') }}" width="55px" alt="Profile" class="rounded-circle">
                                @else
                                    <img src="{{ url('admin/img') }}/{{ $row->foto }}" width="55px" alt="Profile" class="rounded-circle">
                                @endempty --}}
                                
                                <div class="col-md-12 text-center">
                                    <div style="margin-top: 10px;">
                                        @if(!empty($row->foto)) <img src="{{ url('admin/img') }}/{{ $row->foto }}"  id="output" width="180px" class="img-thumbnail">
                                            <br />{{ $row->foto }}
                                        @elseif(empty($row->foto)) <img src="{{ url('admin/img/noprofile.png') }}" id="output" 
                                            width="180px" class="img-thumbnail">
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Judul Kursus</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ $row->judul }}" name="judul">
                                        @error('judul')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Deskripsi Kursus</label>
                                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ $row->deskripsi }}" name="deskripsi">
                                        @error('deskripsi')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Durasi Kursus</label>
                                        <input type="text" class="form-control @error('durasi') is-invalid @enderror" value="{{ $row->durasi }}" name="durasi">
                                        @error('durasi')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4" style="margin-top: 22px;">
                                        <input type="file" onchange="readFoto(event)" class="form-control
                                        @error('foto') is-invalid @enderror" value="{{ old('foto') }}" name="foto">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

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
