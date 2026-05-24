<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BukuUsaha</title>

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


.register-container{
    width:100%;
    max-width:980px;

    background:white;

    border-radius:28px;

    overflow:hidden;

    display:grid;
    grid-template-columns:1fr 1fr;

    box-shadow:
    0 20px 45px rgba(16,185,129,.15);

    transform:scale(.92);
    transform-origin:center;
}

        /* LEFT */

        .register-left{
            background:
            linear-gradient(
                135deg,
                #10b981,
                #059669
            );

            color:white;

            padding:50px;

            position:relative;

            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .register-left::before{
            content:'';
            position:absolute;
            width:300px;
            height:300px;
            border-radius:50%;
            background:rgba(255,255,255,.08);
            top:-100px;
            left:-100px;
        }

        .register-left::after{
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

            background:rgba(255,255,255,.18);

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:42px;

            margin-bottom:30px;

            backdrop-filter:blur(10px);

        }

        .register-left h1{
            font-size:54px;
            line-height:1.1;
            margin-bottom:22px;
            font-weight:800;
        }

        .register-left p{
            font-size:19px;
            line-height:1.8;
            opacity:.95;
            max-width:480px;
        }

        /* RIGHT */

        .register-right{
            padding:45px;

            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .register-right h2{
            font-size:42px;
            color:#064e3b;
            margin-bottom:12px;
            font-weight:800;
        }

        .subtitle{
            color:#64748b;
            margin-bottom:35px;
            line-height:1.7;
        }

        .form-group{
            margin-bottom:22px;
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

        .register-button{
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

            margin-top:10px;

            transition:.25s;

            box-shadow:
            0 15px 30px rgba(16,185,129,.25);
        }

        .register-button:hover{
            transform:translateY(-2px);
        }

        .login-text{
            margin-top:28px;
            text-align:center;
            color:#64748b;
            font-size:15px;
        }

        .login-text a{
            color:#059669;
            font-weight:700;
            text-decoration:none;
        }

        /* MOBILE */

        @media(max-width:900px){

            .register-container{
                grid-template-columns:1fr;
            }

            .register-left{
                display:none;
            }

            .register-right{
                padding:40px 25px;
            }

            .register-right h2{
                font-size:36px;
            }

        }

        @media(max-width:500px){

            body{
                padding:14px;
            }

            .register-container{
                border-radius:24px;
            }

            .register-right{
                padding:30px 20px;
            }

            .register-right h2{
                font-size:32px;
            }

            .form-input{
                height:54px;
                font-size:15px;
            }

            .register-button{
                height:56px;
                font-size:16px;
            }

        }


        /* DESKTOP BESAR */

@media(min-width:1400px){

    .register-container{
        transform:scale(.88);
    }

}

/* LAPTOP */

@media(max-width:1200px){

    .register-container{
        max-width:900px;
        transform:scale(.9);
    }

}

/* TABLET */

@media(max-width:900px){

    .register-container{
        transform:scale(1);
        max-width:520px;
    }

}

/* MOBILE */

@media(max-width:500px){

    .register-container{
        max-width:100%;
        border-radius:24px;
    }

    @media(max-width:900px){

    .logo-box-mobile{
        display:flex;
    }

}

}

    </style>
</head>
<body>

<div class="register-container">

    <!-- LEFT -->

    <div class="register-left">

        <div class="logo-box">
            <img src="{{ asset('logoApp-bukusaha.png') }}" alt="Logo BukuUsaha">
        </div>

        <h1>
            Mulai Kelola
            Keuangan Bisnis
        </h1>

        <p>
            Daftar sekarang dan pantau pemasukan,
            pengeluaran, serta perkembangan usaha Anda
            dengan dashboard BukuUsaha yang modern
            dan mudah digunakan.
        </p>

    </div>

    <!-- RIGHT -->

    <div class="register-right">

    <div class="logo-box-mobile">
            <img src="{{ asset('logo-bukusaha.png') }}" alt="Logo BukUsaha">
        </div>

        <h2>Daftar</h2>

        <p class="subtitle">
            Buat akun baru untuk mulai menggunakan BukuUsaha.
        </p>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <!-- NAME -->

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="form-input"
                    placeholder="Masukkan nama lengkap"
                >

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2"
                />

            </div>

            <!-- EMAIL -->

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
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

            <!-- CONFIRM PASSWORD -->

            <div class="form-group">

                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="form-input"
                    placeholder="Ulangi password"
                >

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2"
                />

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                class="register-button"
            >
                Daftar Sekarang
            </button>

            <!-- LOGIN -->

            <div class="login-text">

                Sudah punya akun?

                <a href="{{ route('login') }}">
                    Login disini
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>