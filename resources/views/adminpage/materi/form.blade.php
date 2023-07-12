@extends('adminpage.index')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h2>Add Materi</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url ('dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item"><a href="{{ url('materi')}}">Materi </a></li>
                <li class="breadcrumb-item active"><a href="{{url('materi/create')}}">Add Data</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Add Materi</h5>

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ route('materi.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Judul Materi</label>
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
                                        <label class="form-label">Link </label>
                                        <input type="text" class="form-control @error('link_embed') is-invalid @enderror" value="{{ old('link_embed') }}" name="link_embed">
                                        @error('link_embed')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Deskripsi Materi</label>
                                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" name="deskripsi">
                                        @error('deskripsi')
                                        <div class="invalid-feedback"> {{-- invalid-feedback komponen dari bootstrab --}}
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-danger">
                                        <a style="color:white;" title="Batal" href=" {{ url('materi') }}">Batal
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

    @endsection
