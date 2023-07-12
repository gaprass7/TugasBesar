@extends('adminpage.index')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h2>Add Pembelajaran</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url ('dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item"><a href="{{ url('pembelajaran')}}">Pembelajaran </a></li>
                <li class="breadcrumb-item active"><a href="{{url('pembelajaran/create')}}">Add Data</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Add Pembelajaran</h5><br>

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ route('pembelajaran.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Judul Kursus</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="kursus_id">
                                                <option selected>-- Pilih Kursus --</option>
                                                @foreach($ar_kursus as $row)
                                                <option value="{{ $row->id }}">{{ $row->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Judul Materi</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="materi_id">
                                                <option selected>-- Pilih Materi --</option>
                                                @foreach($ar_materi as $row)
                                                <option value="{{ $row->id }}">{{ $row->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-danger">
                                        <a style="color:white;" title="Batal" href=" {{ url('pembelajaran') }}">Batal
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
