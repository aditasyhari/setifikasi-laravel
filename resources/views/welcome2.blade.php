<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikasi</title>

    <link rel="shortcut icon" href="{{ asset('public/img/bnsp2.jpg') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('public/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('public/css/welcome.css') }}"> -->

    <style>
        /* Global Styles */
        :root {
            --primary-color: #085c83;
            --dark-color: #141414;
            --light-color: #f4f4f4;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            -webkit-font-smoothing: antialiased;
            background: #000;
            color: #999;
        }

        ul {
            list-style: none;
        }

        h1,
        h2,
        h3,
        h4 {
            color: #fff;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        p {
            margin: 0.5rem 0;
        }

        img {
            width: 100%;
        }

        .showcase {
            width: 100%;
            height: 100vh;
            position: relative;
            background: url("{{ asset('public/img/bg1.jpg') }}") no-repeat center center/cover;
        }

        .showcase::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: inset 120px 100px 250px black, inset -120px -100px 250px black;
        }

        .showcase-top {
            position: relative;
            z-index: 2;
            height: 90px;
        }

        .showcase-top img {
            width: 100px;
            /* height: 100px; */
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            margin-left: 0;
        }

        .showcase-top #login, .showcase-top #dropdownMenuButton {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translate(-50%, -50%);
        }

        .showcase-content {
            position: relative;
            z-index: 2;
            width: 65%;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 9rem;
        }

        .showcase-content img {
            max-width: 300px;
            margin: 0 0 2rem;
        }

        .showcase-content p {
            text-transform: uppercase;
            color: #fff;
            font-weight: 400;
            font-size: 1.2rem;
            line-height: 1.25;
            margin: 0 0 2rem;
        }


        /* Buttons */
        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: #fff;
            padding: 0.4rem 1.3rem;
            font-size: 1rem;
            text-align: center;
            border: none;
            cursor: pointer;
            margin-right: 0.5rem;
            transition: opacity 0.2s ease-in;
            outline: none;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.45);
            border-radius: 2px;
        }

        .btn:hover {
            opacity: 0.9;
            color: white;
        }

        .btn-rounded {
            border-radius: 5px;
        }

        .btn-xl {
            font-size: 2rem;
            padding: 1.5rem 2.1rem;
            text-transform: uppercase;
        }

        .btn-lg {
            font-size: 1rem;
            padding: 0.8rem 1.3rem;
            text-transform: uppercase;
        }

        .btn-icon {
            margin-left: 1rem;
        }

        @media (max-width: 960px) {

            .showcase {
                height: 70vh;
            }

            .hide-sm {
                display: none;
            }

            .showcase-top img {
                top: 30%;
                left: 5%;
                transform: translate(0);
            }

            .showcase-content h1 {
                font-size: 3.7rem;
                line-height: 1;
            }

            .showcase-content p {
                font-size: 1.5rem;
            }

            .footer .footer-cols {
                grid-template-columns: repeat(2, 1fr);
            }

            .btn-xl {
                font-size: 1.5rem;
                padding: 1.4rem 2rem;
                text-transform: uppercase;
            }
        }

        @media (max-width: 700px) {
            .showcase::after {
                background: rgba(0, 0, 0, 0.6);
                box-shadow: inset 80px 80px 150px #000000, inset -80px -80px 150px #000000;
            }

            .showcase-top img {
                width: auto;
                max-height: 50px;
                /* position: absolute; */
                top: 15px;
            }

            .showcase-content p {
                font-size: 1rem;
            }

            .btn-xl {
                font-size: 1rem;
                padding: 1.2rem 1.6rem;
                text-transform: uppercase;
            }
        }

        @media(max-height: 600px) {
            .showcase-content {
                margin-top: 3rem;
            }
        }
    </style>

</head>
<body>
    
    <section class="showcase">
        <div class="showcase-top">
            <img src="{{ asset('public/img/logo-poliwangi.png') }}" alt="" />
            @if (Route::has('login'))
                @auth
                    <div data-toggle="dropdown" id="dropdownMenuButton" class="btn btn-rounded">  
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-haspopup="true" aria-expanded="false">
                        <!-- <a class="dropdown-item" href="#">{{Session::get('name')}}</a>  -->
                        <a class="dropdown-item" href="{{ url('/admin') }}">Dashboard</a> 
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" id="login" class="btn btn-rounded">Sign In</a>
                @endauth
            @endif
        </div>
        <div class="showcase-content">
            <img src="{{ asset('public/img/bnsp.jpg') }}" alt="">
            <p>
                Lembaga otoritas sertifikasi profesi yang independen dan terpercaya dalam menjamin kompetensi tenaga kerja di dalam maupun luar negeri
            </p>
            <a href="https://bnsp.go.id/" class="btn btn-xl">More Info
                <i class="fas fa-chevron-right btn-icon"></i>
            </a>
        </div>
    </section>

    <script src="{{ asset('public/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('public/admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>