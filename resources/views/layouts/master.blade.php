<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="shortcut icon" href="{{ asset('public/img/bnsp2.jpg') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('public/css/login.css') }}"> -->

    <style>
        html {
            box-sizing: border-box;
            font-size: 62.5%;
        }
        html *,
        html *:before,
        html *:after {
            box-sizing: inherit;
        }

        body {
            background-color:  white;
        }

        .container {
            display: grid;
            place-items: center;
            height: 100vh;
        }

        .box {
            position: relative;
            display: flex;
            align-items: center;
            width: 90%;
            max-width: 600px;
            padding: 220px 20px 20px;
            overflow: hidden;
            background-color: white;
            border-radius: 5px;
            -webkit-box-shadow: 0px 0px 65px -8px rgba(0,0,0,0.49);
            -moz-box-shadow: 0px 0px 65px -8px rgba(0,0,0,0.49);
            box-shadow: 0px 0px 65px -8px rgba(0,0,0,0.49);
        }
        @media (min-width: 768px) {
            .box {
                min-height: 400px;
                padding: 0;
            }
            .box__toggle:checked + .box__image {
                left: 300px;
            }
        }

        @media (max-width: 767px) {
            .box__toggle:checked ~ .form--register {
                width: 100%;
                height: auto;
                opacity: 1;
            }
            .box__toggle:checked ~ .form--login {
                width: 0;
                height: 0;
                opacity: 0;
            }
        }

        .box__image {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 200px;
            object-fit: cover;
            object-position: 0 bottom;
            transition: 0.4s ease-in-out;
        }

        @media (min-width: 768px) {
            .box__image {
                width: 300px;
                height: 100%;
                object-position: 0 0;
            }
        }

        .form {
            width: 100%;
            overflow: hidden;
            text-align: left;
            transition: 0.3s;
        }

        @media (min-width: 768px) {
            .form {
                width: 300px;
                padding: 0 20px;
            }
        }

        .form__title {
            margin-bottom: 25px;
            font-family: "Montserrat", sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
        }
        .form--login {
            opacity: 1;
            transition: opacity 0.5s ease;
        }
        .form--register {
            width: 0;
            height: 0;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        @media (min-width: 768px) {
            .form--register {
                width: 300px;
                height: auto;
                opacity: 1;
            }
        }

        .form__helper {
            position: relative;
            margin-bottom: 25px;
        }
        .form__helper:last-of-type {
            margin-bottom: 0;
        }
        .form__label {
            position: absolute;
            bottom: 12px;
            left: 0;
            color: black;
            font-family: "Lato", sans-serif;
            font-size: 1.4rem;
            transition: 0.3s;
        }
        .form__input {
            position: relative;
            width: 100%;
            padding: 5px 0;
            color: black;
            background-color: transparent;
            border-width: 0;
            border-bottom: 1px solid black;
            outline: none;
            font-family: "Lato", sans-serif;
            font-size: 1.3rem;
        }
        .form__input::placeholder {
            opacity: 0;
        }
        .form__input:not(:placeholder-shown) + .form__label {
            bottom: 25px;
            color: #085c83;
            font-size: 1.2rem;
        }
        .form__input:focus {
            border-bottom-color: #085c83;
        }
        .form__input:focus + .form__label {
            bottom: 30px;
            color: #085c83;
            font-size: 1.2rem;
        }
        .form__button {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            color: white;
            background-color: #085c83;
            border: 0;
            cursor: pointer;
            font-family: "Lato", sans-serif;
            font-size: 1.2rem;
            font-weight: 300;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .form__text {
            margin-top: 10px;
            font-family: "Lato", sans-serif;
            font-size: 1.4rem;
        }
        .form__link {
            color: #085c83;
            cursor: pointer;
        }

    </style>

</head>
<body>
	<div class="container">
		@yield('content')
	</div>
</body>
</html>