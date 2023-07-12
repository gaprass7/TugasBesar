@extends('adminpage.index')

@section('content')
<style>
    .profile-image {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    h5 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #888;
    }

    .card {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        margin-top: 20px;
    }

    ul {
        list-style-type: none;
        padding-left: 0;
    }

    h1 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    p {
        margin-bottom: 5px;
    }

    .section {
        margin-top: 30px;
    }

    .breadcrumb {
        margin-bottom: 0;
        font-size: 14px;
        color: #888;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: #888;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }
</style>


<main id="main" class="main">

    <div class="pagetitle">
        <h2>Detail Kursus</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url ('dashboard')}}">Dashboard </a></li>
                <li class="breadcrumb-item"><a href="{{ url('kursus')}}">Kursus </a></li>
                <li class="breadcrumb-item active"><a href="#">Deatail Kursus</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    @empty($row->foto)
                        <img src="{{ url('admin/img/noprofile.png') }}" alt="Profile" class="profile-image"> <h3>{{ $row->judul }}</h3>
                    @else
                        <img src="{{ url('admin/img') }}/{{ $row->foto }}" alt="Profile" class="profile-image"> <h3>{{ $row->judul }}</h3>
                    @endempty
                    <h5>Durasi Kursus : {{ $row->durasi }}</h5>
                    <h6>{{ $row->deskripsi }}</h6>
                    <div class="card-body">
                        Materi : {{ $row->judul }}
                        <ol>
                            @foreach($row->pembelajaran as $item)
                            <li>{{ $item->materi->judul }}</li>
                            <p>{{ $item->materi->deskripsi }}</p>
                            <p>{{ $item->materi->link_embed }}</p>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection