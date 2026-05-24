<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BukUsaha</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            min-height:100vh;
            background:
            linear-gradient(
                135deg,
                #ecfdf5,
                #d1fae5
            );

            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
        }

        .login-container{
            width:100%;
            max-width:1100px;
            min-height:650px;

            background:white;

            border-radius:32px;

            overflow:hidden;

            display:grid;
            grid-template-columns:1fr 1fr;

            box-shadow:
            0 25px 50px rgba(16,185,129,.15);
        }

        /* LEFT */

        .login-left{
            background:
            linear-gradient(
                135deg,
                #10b981,
                #059669
            );

            color:white;

            padding:70px;

            position:relative;

            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .login-left::before{
            content:'';
            position:absolute;
            width:300px;
            height:300px;
            border-radius:50%;
            background:rgba(255,255,255,.08);
            top:-100px;
            left:-100px;
        }

        .login-left::after{
            content:'';
            position:absolute;
            width:220px;
            height:220px;
            border-radius:50%;
            background:rgba(255,255,255,.06);
            bottom:-80px;
            right:-80px;
        }

        .logo-box{
            width:200px;
            height:200px;
            border-radius:24px;

            background:rgba(255,255,255,.18);

            display:flex;
            align-items:center;
            justify-content:center;
            

            font-size:42px;

            margin-bottom:30px;

            backdrop-filter:blur(10px);
        }

    

        .logo-box-mobile{
            width:360px;
            height:90px;
            border-radius:24px;
            display:hidden;

            background:rgba(255,255,255,.18);

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:42px;

            margin-bottom:30px;

            backdrop-filter:blur(10px);
        }

        .login-left h5{
            font-size:26px;
            line-height:1.1;
            margin-bottom:22px;
            font-weight:800;
        }

        .login-left p{
            font-size:19px;
            line-height:1.8;
            opacity:.95;
            max-width:480px;
        }

        /* RIGHT */

        .login-right{
            padding:70px;

            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .login-right h2{
            font-size:46px;
            color:#064e3b;
            margin-bottom:12px;
            font-weight:800;
        }

        .login-right .subtitle{
            color:#64748b;
            margin-bottom:40px;
            font-size:17px;
            line-height:1.7;
        }

        .form-group{
            margin-bottom:24px;
        }

        .form-group label{
            display:block;
            margin-bottom:10px;
            font-weight:700;
            color:#065f46;
        }

        .form-input{
            width:100%;
            height:58px;

            border-radius:18px;

            border:2px solid #d1fae5;

            padding:0 20px;

            font-size:16px;

            outline:none;

            transition:.25s;
        }

        .form-input:focus{
            border-color:#10b981;
            box-shadow:
            0 0 0 5px rgba(16,185,129,.12);
        }

        .remember-wrapper{
            display:flex;
            align-items:center;
            justify-content:space-between;

            margin-bottom:30px;

            flex-wrap:wrap;
            gap:12px;
        }

        .remember-me{
            display:flex;
            align-items:center;
            gap:10px;
            color:#334155;
        }

        .forgot-link{
            color:#059669;
            text-decoration:none;
            font-weight:700;
        }

        .login-button{
            width:100%;
            height:60px;

            border:none;

            border-radius:18px;

            background:
            linear-gradient(
                135deg,
                #10b981,
                #059669
            );

            color:white;

            font-size:18px;
            font-weight:700;

            cursor:pointer;

            transition:.25s;

            box-shadow:
            0 15px 30px rgba(16,185,129,.25);
        }

        .login-button:hover{
            transform:translateY(-2px);
        }

        .register-text{
            margin-top:30px;
            text-align:center;
            color:#64748b;
            font-size:15px;
        }

        .register-text a{
            color:#059669;
            font-weight:700;
            text-decoration:none;
        }

        /* MOBILE */

        @media(max-width:900px){

            .login-container{
                grid-template-columns:1fr;
            }

            .login-left{
                display:none;
            }

            .login-right{
                padding:40px 25px;
            }

            .login-right h2{
                font-size:36px;
            }

        }

        @media(max-width:500px){

            body{
                padding:14px;
            }

            .login-container{
                border-radius:24px;
            }

            .login-right{
                padding:30px 20px;
            }

            .login-right h2{
                font-size:32px;
            }

            .form-input{
                height:54px;
                font-size:15px;
            }

            .login-button{
                height:56px;
                font-size:16px;
            }

        }

    </style>
</head>
<body>

<div class="login-container">

    <!-- LEFT -->

    <div class="login-left">

        <div class="logo-box">
            <img src="{{ asset('logoApp-bukusaha.png') }}" alt="Logo BukUsaha">
        </div>

        <h5>
            Masih pake pembukuan fisik?, udah gk jaman!
        </h5>

        <p>
            Kelola pemasukan, pengeluaran,
            dan perkembangan bisnis Anda
            dengan dashboard modern,
            cepat, dan mudah digunakan.
        </p>

    </div>

    <!-- RIGHT -->

    <div class="login-right">

    <div class="logo-box-mobile">
            <img src="{{ asset('logo-bukusaha.png') }}" alt="Logo BukUsaha">
        </div>

        <h2>Masuk</h2>

        <p class="subtitle">
            Login untuk melanjutkan ke dashboard BukUsaha.
        </p>

        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="form-input"
                    placeholder="Masukkan email"
                >

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />

            </div>

            <!-- PASSWORD -->

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required
                    class="form-input"
                    placeholder="Masukkan password"
                >

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />

            </div>

            <!-- REMEMBER -->

            <div class="remember-wrapper">

                <label class="remember-me">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    Remember me

                </label>

                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="forgot-link"
                    >
                        Lupa password?
                    </a>

                @endif

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="login-button"
            >
                Login Sekarang
            </button>

            <!-- REGISTER -->

            @if (Route::has('register'))

                <div class="register-text">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Daftar disini
                    </a>

                </div>

            @endif

        </form>

    </div>

</div>

</body>
</html>