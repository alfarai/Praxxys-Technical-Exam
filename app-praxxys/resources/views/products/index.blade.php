<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/js/app.js'])
    {{--
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            height: 100vh;
            display: grid;
            grid-template-columns: 330px 1fr;
            grid-template-rows: 60px 1fr;
            grid-template-areas:
                "side header"
                "side main";
        }

        .navbar-button-container {
            width: 100%;
            height: 50px;
            margin-bottom: 15px;
            display: flex;
            flex-direction: row;
            align-items: center;

        }

        .navbar-button-container:hover {
            background-color: #d2d1cf;
        }

        .divider {
            margin: 20px 0px 20px 0px;
            width: 90%;
            height: 1px;
            background-color: black;
        }

        .resize-table {
            width: 100%;
            height: auto;
        }

        .header {
            background-color: #212529;

            grid-area: header;
        }

        .sidebar {
            background-color: #D8D9DA;
            grid-area: side;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .main {
            background-color: #494f53;
            grid-area: main;
            padding: 20px;

            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 0.2fr 0.34fr 1fr;
            gap: 20px;

            grid-template-areas:
                "c1 c2"
                "c4 c5"
                "c3 c3";
        }

        .card {
            background-color: #f6f7f9;
            border-radius: 10px;
        }

        .card:nth-child(1) {
            grid-area: c1;
        }

        .card:nth-child(2) {
            grid-area: c2;
        }

        .product-table {
            grid-area: c3;
            background-color: #212529;
        }

        .card:nth-child(4) {
            grid-area: c4;
        }

        .card:nth-child(5) {
            grid-area: c5;
        }
    </style>
</head>

<body>

    {{-- @if(Session::has('success'))
    <div>
        {{Session::get('success')}}
    </div>
    @endif --}}




    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="h2 bi bi-list"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Contacts</a>
                        <a class="nav-link" href="#">About</a>

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="sidebar">



        <div class="navbar-button-container" style="margin-top:20px;">
            <span style="display: inline-block;margin-right:20px; margin-left:20px;">
                <i class="h2 bi bi-speedometer2"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h3 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Dashboard</a>
                </p>
            </span>
        </div>

        <div class="divider"></div>


        <div class="navbar-button-container">
            <span style="display: inline-block;margin-right:20px; margin-left:20px;">
                <i class="h1 bi bi-person"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">PRAXXYS</a>
                </p>
            </span>
        </div>

        <div class="divider"></div>



        <div class="navbar-button-container">
            <span style="display: inline-block;margin-right:20px; margin-left:20px;">
                <i class="h2 bi bi-house-door"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Home</a>
                </p>
            </span>
        </div>



        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-bell"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Notifications</a>
                </p>
            </span>
        </div>

        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-calendar2"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Calendar</a>
                </p>
            </span>
        </div>

        <div class="divider"></div>
        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-people"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Users</a>
                </p>
            </span>
        </div>

        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-journals"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">View Records</a>
                </p>
            </span>
        </div>

        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-database"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Manage Database</a>
                </p>
            </span>
        </div>


        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-book"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Logs</a>
                </p>
            </span>
        </div>
        <div class="divider"></div>
        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-gear"></i>
            </span>
            <span style="display: inline-block;">
                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="#">Settings</a>
                </p>
            </span>
        </div>



        <div class="navbar-button-container">
            <span style="display: inline-block;margin-left:20px;margin-right:20px; ">
                <i class="h2 bi bi-box-arrow-left"></i>
            </span>
            <span style="display: inline-block;">

                <p class="font-weight-bold h4 hover" style="margin-bottom: 0;">
                    <a class="icon-link icon-link-hover link-dark text-decoration-none" aria-current="page"
                        href="{{route('user.logout')}}">Logout</a>
                </p>
            </span>
        </div>


    </section>
    <main class="main">






        <div class="card bg-dark">

            <div class="card-body text-light">
                
                <div id="app2" style="margin-bottom:40px;">
                    <count />
                </div>
                <span style="display: inline-block"><a href="{{route('product.create')}}" class="btn btn-primary">Create Product</a></span>
            </div>
        </div>



        <div class="card bg-dark text-center">
            <div class="card-body text-light">
                <div class="mb-3" style="text-align:left;">
                    <h1 class="display-2">43</h1>
                </div>
                <div class="mb-3" style="text-align:left;">
                    <h4 class="fw-light fs-7">New Orders</h4>
                </div>
            </div>
        </div>

        <div class="card bg-dark text-center">
            <div class="card-body text-light">
                <div class="mb-3" style="text-align:left;">
                    <h1 class="display-2">23</h1>
                </div>
                <div class="mb-3" style="text-align:left;">
                    <h4 class="fw-light fs-7">Users online</h4>
                </div>
            </div>
        </div>

        <div class="card bg-dark text-center">
            <div class="card-body text-light">
                <div class="mb-3" style="text-align:left;">
                    <h1 class="display-2">142</h1>
                </div>
                <div class="mb-3" style="text-align:left;">
                    <h4 class="fw-light fs-7">User Registration</h4>
                </div>
            </div>
        </div>
        <div id="app" class="product-table">
            
            
                
            <h1 class="text-light display-2 text-center">Products</h1>
            


            <Products />
        </div>




    </main>

    {{-- <form id="logout " method="POST" action="{{route('user.logout')}}">
        @csrf
    </form> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>