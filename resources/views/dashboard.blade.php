<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Dashboard To-Do List</h2>

    <p>Login berhasil.</p>

    <form action="/logout" method="POST">
        @csrf

        <button class="btn btn-danger">
            Logout
        </button>
    </form>

</div>

</body>
</html>