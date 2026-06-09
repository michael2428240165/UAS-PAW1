<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>

<h1>To-Do List</h1>

<h2>Log In</h2>

<form action="/login" method="POST">
    @csrf

    <label>Username</label><br>
    <input type="text" name="username" value="{{ old('username') }}">

    @error('username')
        <br>
        <small>{{ $message }}</small>
    @enderror

    <br><br>

    <label>Password</label><br>
    <input type="password" name="password">

    @error('password')
        <br>
        <small>{{ $message }}</small>
    @enderror

    @if (session('error'))
        <br>
        <small>{{ session('error') }}</small>
    @endif

    <br><br>

    <button type="submit">Log In</button>
</form>

<p>
    Belum memiliki akun?
    <a href="/register">Buat Akun</a>
</p>

</body>
</html>