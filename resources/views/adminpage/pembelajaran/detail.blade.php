<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @empty($row->kursus->foto)
        <img src="{{ url('admin/img/noprofile.png') }}" alt="Profile" class="rounded-circle">
        @else
        <img src="{{ url('admin/img') }}/{{ $row->kursus->foto }}" alt="Profile" class="rounded-circle">
        @endempty
        <h2>{{ $row->kursus->judul }}</h2>
        <p>{{ $row->kursus->deskripsi }}</p>
        <p>{{ $row->kursus->durasi }}</p>
        <p>{{ $row->materi }}</p>
    </div>
</body>
</html>