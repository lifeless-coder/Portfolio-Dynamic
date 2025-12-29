<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #212529;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #343a40;
            color: #fff;
        }
        .content {
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="d-flex">
    @include('admin.partials.sidebar')

    <div class="flex-grow-1">
        @include('admin.partials.navbar')

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
