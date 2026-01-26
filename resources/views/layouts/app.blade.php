<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Kita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: #0f0f0f;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1a1a2e, #0f0f1a);
            color: white;
            padding: 30px 20px;
        }

        .sidebar h2 {
            font-weight: bold;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .main {
            flex: 1;
            padding: 40px;
            color: white;
        }

        .card-custom {
        background: white;
        color: #111;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        transition: all 0.2s ease;
        }


        .card-custom:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.5);
        }

        .btn-warning {
            background: #facc15;
            border: none;
        }

        .btn-warning:hover {
            background: #eab308;
        }
        .card-custom {
            display: flex;
            flex-direction: column;
        }

        .card-custom img {
            height: 180px;
            object-fit: cover;
        }

        .card-custom .p-4 {
            flex: 1;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>TIKET KITA</h2>
        <hr style="border-color: rgba(255,255,255,0.2)">

        <a href="/dashboard">📊 Dashboard</a>
        <a href="/events">🎫 Event</a>
    </div>

    <!-- CONTENT -->
    <div class="main">
        @yield('content')
    </div>

</div>

</body>
</html>