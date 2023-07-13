@extends('adminpage.index')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Tabel Data Pembelajaran</h6>
                </div>
            </div>

            <div class="mt-4" style="max-width:550px; margin-left:20px;">
                <div class="d-flex flex-wrap justify-content-start">
                    <a class="btn btn-sm" title="Tambah Kursus Baru" style="background-color: blue; color: white; margin-right: 10px; margin-bottom: 10px;" href="{{ route('pembelajaran.create') }}">
                        <i class="bi bi-plus-circle-fill"></i> Tambah Materi
                    </a>
                    <a class="btn btn-danger btn-sm" title="Export to PDF Menu" href="{{ url('generate-pdf') }}" style="margin-right: 10px; margin-bottom: 10px;">
                        <i class="bi bi-file-earmark-pdf-fill"></i> Export ke PDF
                    </a>
                    <a class="btn btn-success btn-sm" title="Export to Excel Menu" href="{{ url('menu-excel') }}" style="margin-right: 10px; margin-bottom: 10px;">
                        <i class="bi bi-file-excel"></i> Export ke Excel
                    </a>
                </div>
            </div>
            
            
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase font-weight-bolder opacity-7 ps-2">Kursus</th>
                                <th class="text-uppercase font-weight-bolder opacity-7">Materi</th>
                                <th class="text-uppercase font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach($pembelajaran as $row)
                            <tr>
                                <td>{{ $no++ }}.</td>
                                <td><p class="text-xs font-weight-bold mb-0">{{ $row->kursus->judul }}</p></td>
                                <td><p class="text-xs font-weight-bold mb-0">{{ $row->materi->judul }}</p></td>

                                <td>
                                    <form method="POST" id="formDelete" action="{{ route('pembelajaran.destroy', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-sm" title="Ubah Pembelajaran"
                                            href="{{ route('pembelajaran.edit', $row->id) }}">
                                            <i class="bi bi-pencil">Edit</i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm btnDelete" title="Hapus Pembelajaran">
                                            <i class="bi bi-trash">Delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

