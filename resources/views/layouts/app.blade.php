<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Squire Management System')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .stat-card {
            border: 0;
            border-radius: 12px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 700;
        }

        .card {
            border: 0;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .06);
        }

        .table th {
            white-space: nowrap;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .feature-badge {
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a
                class="navbar-brand"
                href="{{ route('knights.index') }}">
                ⚔️ Squire Management
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse"
                id="navbarMenu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->routeIs('knights.*') ? 'active' : '' }}"
                            href="{{ route('knights.index') }}">
                            Knights
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->routeIs('squires.*') ? 'active' : '' }}"
                            href="{{ route('squires.index') }}">
                            Squires
                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <main class="container py-4">

        @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"></button>

        </div>

        @endif


        @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"></button>

        </div>

        @endif


        @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

                @endforeach

            </ul>

        </div>

        @endif


        @yield('content')

    </main>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>