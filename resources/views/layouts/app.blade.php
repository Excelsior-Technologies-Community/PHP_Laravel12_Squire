<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Squire Management System')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

        <div class="container">

            <a
                class="navbar-brand fw-bold"
                href="{{ route('dashboard') }}"
            >
                ⚔ Squire System
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse"
                id="navbarNav"
            >

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}"
                        >
                            Dashboard
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->routeIs('knights.*') ? 'active' : '' }}"
                            href="{{ route('knights.index') }}"
                        >
                            Knights
                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->routeIs('squires.*') ? 'active' : '' }}"
                            href="{{ route('squires.index') }}"
                        >
                            Squires
                        </a>

                    </li>

                </ul>


@auth

    <div class="dropdown">

        <button
            class="btn btn-dark dropdown-toggle"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
        >
            {{ Auth::user()->name }}
        </button>

        <ul class="dropdown-menu dropdown-menu-end">

            <li>
                <span class="dropdown-item-text">
                    <strong>{{ Auth::user()->name }}</strong>
                    <br>
                    <small class="text-muted">
                        {{ Auth::user()->email }}
                    </small>
                </span>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="dropdown-item"
                    >
                        Log Out
                    </button>

                </form>

            </li>

        </ul>

    </div>

@endauth

            </div>

        </div>

    </nav>


    <main class="py-4">

        <div class="container">

            @if(session('success'))

                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif

            @if(session('error'))

                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif

            @yield('content')

        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>