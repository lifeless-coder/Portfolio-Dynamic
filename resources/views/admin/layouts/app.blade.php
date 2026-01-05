<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #f8f9fa;
        }

        /* FIXED SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #212529;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar h5 {
            margin: 0;
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

        /* MAIN CONTENT AREA */
        .main-wrapper {
            margin-left: 250px; /* SAME AS SIDEBAR WIDTH */
            min-height: 100vh;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

{{-- SIDEBAR --}}
@include('admin.partials.sidebar')

{{-- MAIN CONTENT --}}
<div class="main-wrapper">

    {{-- TOP NAVBAR --}}
    @include('admin.partials.navbar')

    {{-- PAGE CONTENT --}}
    <div class="content">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
