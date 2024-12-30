<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>FINISH GOOD</title>

    {{-- <img src="nama_file_gambar.jpg" alt="Deskripsi gambar"> --}}
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"> --}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('backend/dist/style/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\fontawesome-free-6.2.1\css\all.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- CSS Libraries -->
    <script src="{{ asset('js/sweetalert2@11.6.15.all.min.js') }}"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

</head>
<style type="text/css">
    .navbar-inverse {
        background-color: #20598f;

        font-size: 18px;
    }

    .btn-secondary {
        background-color: #20598f;
    }

    .red-icon {
        color: #cf7c10;
    }

    /* #myTable_paginate {
        float: right;
    }

    #myTable_paginate .paginate_button {
        margin-left: 5px;
        margin-right: 5px;
    } */
    .hidden-data {
        display: none;
    }
</style>

<body class="sidebar-gone">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg navbar-inverse "></div>

            <!-- Navbar -->
            @include('layouts.admin.partials.navbar')

            <!-- Sidebar -->
            {{-- <div class="sidebar-bg navbar-inverse "></div> --}}
            @include('layouts.admin.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        {{-- <h1>Dashboard - ADM</h1> --}}
                        <h1>
                            @yield('judul')
                        </h1>
                    </div>
                    {{-- @include('ADM.Dn_no.index') --}}
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                {{-- <div class="col-sm-6">
                                    <!-- <h1>Contacts</h1> -->
                                    @yield('judul')
                                </div> --}}

                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Default box -->
                        @yield('content')
                        <!-- /.card -->

                    </section>
                    {{-- </section> --}}
                    {{-- <div class="section-body">
                    @yield('content')
                </div> --}}
            </div>
            @include('layouts.admin.partials.footer')
        </div>
    </div>

    <!-- General JS Scripts -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"></script> --}}
    <script src="{{ asset('backend/dist/script/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
