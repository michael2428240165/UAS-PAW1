<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>

<h1>To-Do List</h1>

<h2>Create Account</h2>

<form action="/register" method="POST">
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

    <br><br>

    <label>Confirm Password</label><br>
    <input type="password" name="password_confirmation">

    @error('password_confirmation')
        <br>
        <small>{{ $message }}</small>
    @enderror

    @error('password')
        <br>
        <small>{{ $message }}</small>
    @enderror

    <br><br>

    <button type="submit">
        Create Account
    </button>
</form>

<p>
    Sudah memiliki akun?
    <a href="/">Log In</a>
</p>

</body>
</html>