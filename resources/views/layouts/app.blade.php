<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Aplikasi Sertifikasi')
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #090a0c;
            color: #f5f5f5;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }


        /* =========================
           LAYOUT UTAMA
        ========================= */

        .app-layout {
            min-height: 100vh;
            display: flex;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 250px;
            min-height: 100vh;

            background: #111214;
            border-right: 1px solid #25262a;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            display: flex;
            flex-direction: column;
        }


        /* LOGO */

        .sidebar-header {
            height: 88px;

            padding: 20px 22px;

            display: flex;
            align-items: center;

            border-bottom: 1px solid #25262a;
        }

        .logo-icon {
            width: 42px;
            height: 42px;

            border-radius: 10px;

            background: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;

            margin-right: 12px;
        }

        .logo-text {
            line-height: 1.2;
        }

        .logo-text strong {
            display: block;

            color: white;

            font-size: 14px;

            letter-spacing: 0.3px;
        }

        .logo-text span {
            display: block;

            color: #8d919a;

            font-size: 11px;

            margin-top: 3px;
        }


        /* MENU */

        .sidebar-menu {
            padding: 20px 14px;

            flex: 1;

            overflow-y: auto;
        }

        .menu-title {
            color: #777b85;

            font-size: 11px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: 0.8px;

            padding: 0 12px;

            margin-top: 22px;

            margin-bottom: 9px;
        }

        .menu-title:first-child {
            margin-top: 0;
        }

        .menu-item {
            display: flex;

            align-items: center;

            width: 100%;

            padding: 11px 12px;

            margin-bottom: 4px;

            border-radius: 8px;

            color: #a7aab2;

            font-size: 14px;

            transition: 0.2s;
        }

        .menu-item:hover {
            background: #1b1d21;

            color: white;
        }

        .menu-item.active {
            background: #1d1f23;

            color: #38a9ff;
        }

        .menu-icon {
            width: 28px;

            font-size: 17px;

            margin-right: 8px;

            text-align: center;
        }


        /* LOGOUT */

        .sidebar-bottom {
            padding: 14px;

            border-top: 1px solid #25262a;
        }

        .logout-button {
            width: 100%;

            border: none;

            background: transparent;

            color: #a7aab2;

            padding: 11px 12px;

            border-radius: 8px;

            cursor: pointer;

            text-align: left;

            font-size: 14px;
        }

        .logout-button:hover {
            background: #1b1d21;

            color: #ff6b6b;
        }


        /* =========================
           AREA KONTEN
        ========================= */

        .main-area {
            margin-left: 250px;

            width: calc(100% - 250px);

            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 72px;

            background: #0d0e10;

            border-bottom: 1px solid #25262a;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;
        }

        .page-title {
            font-size: 18px;

            font-weight: 600;

            color: white;
        }

        .topbar-right {
            display: flex;

            align-items: center;

            gap: 18px;

            position: relative;
        }


        /* =========================
           SEARCH
        ========================= */

        .search-box {
            width: 260px;

            height: 40px;

            background: #17191c;

            border: 1px solid #292b30;

            border-radius: 9px;

            display: flex;

            align-items: center;

            padding: 0 13px;
        }

        .search-icon {
            color: #747982;

            margin-right: 8px;

            font-size: 16px;
        }

        .search-box input {
            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            color: white;

            font-size: 13px;
        }

        .search-box input::placeholder {
            color: #70747d;
        }


        /* =========================
           SEARCH RESULTS
        ========================= */

        .search-results {
            display: none;

            position: absolute;

            top: 50px;

            right: 55px;

            width: 260px;

            background: #17191c;

            border: 1px solid #292b30;

            border-radius: 9px;

            padding: 8px;

            z-index: 999;

            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .search-result-item {
            display: block;

            padding: 11px 12px;

            color: #d6d8dd;

            border-radius: 7px;

            font-size: 13px;

            text-decoration: none;

            transition: 0.2s;
        }

        .search-result-item:hover {
            background: #24262b;

            color: white;
        }

        .search-empty {
            padding: 10px;

            color: #858991;

            font-size: 13px;
        }


        /* =========================
           PROFILE
        ========================= */

        .profile-circle {
            width: 38px;

            height: 38px;

            border-radius: 50%;

            background: #17191c;

            border: 1px solid #292b30;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 13px;

            font-weight: 600;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 32px;
        }


        /* =========================
           CARD
        ========================= */

        .card {
            background: #111214;

            border: 1px solid #25262a;

            border-radius: 13px;

            padding: 25px;

            margin-bottom: 24px;

            box-shadow:
                0 4px 20px rgba(0, 0, 0, 0.18);
        }

        .card h1 {
            margin: 0 0 8px;

            color: white;

            font-size: 25px;
        }

        .card p {
            color: #858991;

            font-size: 14px;
        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;

            margin-top: 25px;
        }

        .table {
            width: 100%;

            border-collapse: collapse;

            background: #111214;

            border: 1px solid #292b30;

            border-radius: 9px;

            overflow: hidden;
        }

        .table th {
            background: #181a1e;

            color: #aeb2ba;

            font-size: 12px;

            font-weight: 600;

            text-align: left;

            padding: 14px 15px;

            border-bottom: 1px solid #292b30;
        }

        .table td {
            padding: 14px 15px;

            color: #d6d8dd;

            font-size: 13px;

            border-bottom: 1px solid #222428;
        }

        .table tbody tr:hover {
            background: #16181b;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 9px 14px;

            border-radius: 7px;

            border: 1px solid transparent;

            font-size: 13px;

            cursor: pointer;

            transition: 0.2s;
        }

        .btn:hover {
            transform: translateY(-1px);

            opacity: 0.9;
        }

        .btn-primary {
            background: #2563eb;

            color: white;
        }

        .btn-warning {
            background: #b7791f;

            color: white;
        }

        .btn-danger {
            background: #b91c1c;

            color: white;
        }

        .btn-secondary {
            background: #292b30;

            color: #d5d7dc;

            border-color: #373941;
        }


        /* =========================
           AKSI
        ========================= */

        .action-buttons {
            display: flex;

            align-items: center;

            gap: 7px;
        }

        .action-buttons form {
            margin: 0;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            color: #c8cbd1;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;

            padding: 11px 13px;

            background: #181a1e;

            border: 1px solid #303238;

            border-radius: 7px;

            color: white;

            outline: none;

            font-size: 13px;
        }

        .form-control:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 2px rgba(37, 99, 235, 0.15);
        }

        .form-control::placeholder {
            color: #70747d;
        }

        textarea.form-control {
            resize: vertical;
        }

        select.form-control option {
            background: #181a1e;

            color: white;
        }


        /* =========================
           DASHBOARD CARD
        ========================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 18px;

            margin-bottom: 25px;
        }

        .stat-card {
            background: #111214;

            border: 1px solid #25262a;

            border-radius: 12px;

            padding: 22px;
        }

        .stat-card-title {
            color: #858991;

            font-size: 13px;

            margin-bottom: 12px;
        }

        .stat-card-number {
            color: white;

            font-size: 28px;

            font-weight: 700;
        }

        .stat-card-icon {
            color: #38a9ff;

            font-size: 20px;

            margin-bottom: 15px;
        }


        /* =========================
           ALERT
        ========================= */

        .alert-success {
            background: #10251b;

            border: 1px solid #1e5438;

            color: #73d69b;

            padding: 12px 15px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 13px;
        }

        .alert-danger {
            background: #2a1515;

            border: 1px solid #5b2727;

            color: #ff8d8d;

            padding: 12px 15px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 13px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main-area {
                margin-left: 210px;

                width: calc(100% - 210px);
            }

            .dashboard-grid {
                grid-template-columns: 1fr 1fr;
            }

            .search-box {
                width: 190px;
            }

            .search-results {
                right: 55px;

                width: 220px;
            }
        }


        @media (max-width: 700px) {

            .sidebar {
                width: 70px;
            }

            .sidebar-header {
                justify-content: center;

                padding: 15px;
            }

            .logo-text {
                display: none;
            }

            .logo-icon {
                margin: 0;
            }

            .menu-title {
                display: none;
            }

            .menu-item {
                justify-content: center;

                padding: 12px 5px;
            }

            .menu-icon {
                margin: 0;
            }

            .menu-text {
                display: none;
            }

            .main-area {
                margin-left: 70px;

                width: calc(100% - 70px);
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 0 15px;
            }

            .search-box {
                display: none;
            }

            .search-results {
                display: none !important;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

<div class="app-layout">


{{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="sidebar-header">

            <div class="logo-icon">
                🎓
            </div>

            <div class="logo-text">

                <strong>
                    APLIKASI
                </strong>

                <strong>
                    SERTIFIKASI
                </strong>

                <span>
                    Rekayasa Perangkat Lunak
                </span>

            </div>

        </div>


        <div class="sidebar-menu">


            {{-- MENU UTAMA --}}

            <div class="menu-title">
                Menu Utama
            </div>


            <a href="{{ route('dashboard') }}"
               class="menu-item">

                <span class="menu-icon">
                    🏠
                </span>

                <span class="menu-text">
                    Dashboard
                </span>

            </a>


            {{-- SERTIFIKASI --}}

            <div class="menu-title">
                Sertifikasi
            </div>


            <a href="{{ route('skema.index') }}"
               class="menu-item">

                <span class="menu-icon">
                    📋
                </span>

                <span class="menu-text">
                    Skema Sertifikasi
                </span>

            </a>


            <a href="{{ route('peserta.index') }}"
               class="menu-item">

                <span class="menu-icon">
                    👥
                </span>

                <span class="menu-text">
                    Data Peserta
                </span>

            </a>

        </div>


        {{-- LOGOUT --}}
        <div class="sidebar-bottom">

            <form action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button type="submit"
                        class="logout-button">

                    <span class="menu-icon">
                        🚪
                    </span>

                    Logout

                </button>

            </form>

        </div>

    </aside>



    {{-- =========================
         MAIN AREA
    ========================== --}}

    <main class="main-area">


        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="page-title">

                @yield('title', 'Dashboard')

            </div>


            <div class="topbar-right">


                {{-- SEARCH --}}

                <div class="search-box">

                    <span class="search-icon">
                        🔍
                    </span>

                    <input
                        type="text"
                        id="globalSearch"
                        placeholder="Search..."
                        autocomplete="off"
                    >

                </div>


                {{-- HASIL SEARCH --}}

                <div id="searchResults"
                     class="search-results">
                </div>


                {{-- PROFILE --}}

                <div class="profile-circle">

                    @auth

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    @else

                        A

                    @endauth

                </div>

            </div>

        </header>



{{-- CONTENT --}}    

         <section class="content">

            @if(session('success'))

                <div class="alert-success auto-hide-alert">
                    {{ session('success') }}
                </div>

            @endif


            @if(session('error'))

                <div class="alert-danger auto-hide-alert">
                    {{ session('error') }}
                </div>

            @endif


            @yield('content')

        </section>

    </main>

</div>


{{-- GLOBAL SEARCH --}}    

<script>

    const globalSearch = document.getElementById('globalSearch');

    const searchResults = document.getElementById('searchResults');


    const menus = [

        {
            name: 'Dashboard',
            url: "{{ route('dashboard') }}"
        },

        {
            name: 'Data Peserta',
            url: "{{ route('peserta.index') }}"
        },

        {
            name: 'Skema Sertifikasi',
            url: "{{ route('skema.index') }}"
        }

    ];


    globalSearch.addEventListener('input', function () {

        const keyword = this.value
            .toLowerCase()
            .trim();


        searchResults.innerHTML = '';


        if (keyword === '') {

            searchResults.style.display = 'none';

            return;

        }


        const results = menus.filter(function (menu) {

            return menu.name
                .toLowerCase()
                .includes(keyword);

        });


        if (results.length === 0) {

            searchResults.innerHTML = `
                <div class="search-empty">
                    Menu tidak ditemukan.
                </div>
            `;

        } else {

            results.forEach(function (menu) {

                searchResults.innerHTML += `
                    <a
                        href="${menu.url}"
                        class="search-result-item"
                    >
                        🔎 ${menu.name}
                    </a>
                `;

            });

        }


        searchResults.style.display = 'block';

    });


    document.addEventListener('click', function (event) {

        if (
            !globalSearch.contains(event.target) &&
            !searchResults.contains(event.target)
        ) {

            searchResults.style.display = 'none';

        }

    });


    /*auto hide*/

    document.addEventListener('DOMContentLoaded', function () {

        const alerts = document.querySelectorAll(
            '.auto-hide-alert'
        );

        alerts.forEach(function (alert) {

            setTimeout(function () {

                alert.style.transition =
                    'opacity 0.5s ease';

                alert.style.opacity = '0';

                setTimeout(function () {

                    if (alert.parentNode) {

                        alert.parentNode.removeChild(alert);

                    }

                }, 500);

            }, 3000);

        });

    });

</script>


</body>

</html>