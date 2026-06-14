<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .todo-selesai td { opacity: 0.5; text-decoration: line-through; }
    </style>
</head>
<body class="bg-light">

@php
    $aktif = $todos->where('selesai', 0);
    $selesai = $todos->where('selesai', 1);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand fw-bold">
            To-Do List
            @if ($todos->count() > 0)
                @if ($aktif->count() > 0)
                    <span class="fs-6 fw-normal opacity-75 ms-2 ps-2 border-start border-white">{{ $aktif->count() }} tugas aktif</span>
                @else
                    <span class="fs-6 fw-normal opacity-75 ms-2 ps-2 border-start border-white">Semua selesai ✓</span>
                @endif
            @endif
        </span>
        <div class="d-flex gap-2">
            <a href="/profile" class="btn btn-light btn-sm">Akun</a>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-0 fw-bold">Daftar To-Do List</h4>
            <small class="text-muted">List semua tugas yang perlu dikerjakan</small>
        </div>
        <a href="/todos/create" class="btn btn-primary">+ Tambah To-Do List</a>
    </div>

    <div class="card shadow-sm mb-4">
        <table class="table table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Judul To-Do List</th>
                    <th style="width: 160px;">Tenggat Waktu</th>
                    <th style="width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aktif as $index => $todo)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $todo->judul }}</td>
                        <td>{{ $todo->tenggat_waktu ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="/todos/{{ $todo->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/todos/{{ $todo->id }}/complete" method="POST" class="m-0">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Selesai</button>
                                </form>
                                <form action="/todos/{{ $todo->id }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Data todo belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($selesai->count() > 0)
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center gap-2 w-100">
                <span class="text-muted fw-semibold" style="white-space: nowrap;">Sudah Selesai</span>
                <hr class="flex-grow-1 m-0">
            </div>
            <form action="/todos/selesai/hapus-semua" method="POST" class="m-0 ms-3">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" style="white-space: nowrap;">Hapus Semua</button>
            </form>
        </div>

        <div class="card shadow-sm">
            <table class="table table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Judul To-Do List</th>
                        <th style="width: 160px;">Tenggat Waktu</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($selesai as $index => $todo)
                        <tr class="todo-selesai">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $todo->judul }}</td>
                            <td>{{ $todo->tenggat_waktu ?? '-' }}</td>
                            <td>
                                <form action="/todos/{{ $todo->id }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>