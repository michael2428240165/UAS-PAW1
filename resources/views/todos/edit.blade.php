<!DOCTYPE html>
<html>
<head>
    <title>Edit To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand fw-bold">To-Do List</span>
        <div class="d-flex gap-2">
            <a href="/profile" class="btn btn-light btn-sm">Akun</a>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-5" style="max-width: 540px;">

    <h4 class="fw-bold mb-1">Edit To-Do List</h4>
    <p class="text-muted mb-4">Ubah judul atau tenggat waktu</p>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="/todos/{{ $todo->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $todo->judul) }}">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Tenggat Waktu <small class="text-muted fw-normal">(opsional)</small></label>
                    <input type="date" name="tenggat_waktu"
                        class="form-control"
                        value="{{ old('tenggat_waktu', $todo->tenggat_waktu) }}">
                    <small class="text-muted">Biarkan kosong jika tidak ada tenggat waktu</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/dashboard" class="btn btn-secondary">Kembali</a>
                </div>

            </form>
        </div>
    </div>

</div>

</body>
</html>