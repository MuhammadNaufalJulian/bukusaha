<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BukUsaha - Pembukuan Digital untuk UMKM</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Plus Jakarta Sans',sans-serif;
        }

        body{
            background:#ecfdf5;
            overflow-x:hidden;
            color:#064e3b;
        }

        html{
            scroll-behavior:smooth;
        }

        a{
            text-decoration:none;
        }

        /* NAVBAR */

        .navbar{
            width:100%;
            padding:20px 8%;
            display:flex;
            justify-content:space-between;
            align-items:center;
            position:fixed;
            top:0;
            left:0;
            z-index:999;
            backdrop-filter:blur(14px);
            background:rgba(255,255,255,.65);
            border-bottom:1px solid rgba(255,255,255,.3);
        }

        .logo{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .logo img{
            width:48px;
        }

        .logo h2{
            color:#064e3b;
            font-size:24px;
            font-weight:800;
        }

        .nav-btn{
            background:linear-gradient(135deg,#10b981,#059669);
            color:white;
            padding:14px 22px;
            border-radius:14px;
            font-weight:700;
            box-shadow:0 10px 25px rgba(16,185,129,.25);
            transition:.3s;
        }

        .nav-btn:hover{
            transform:translateY(-2px);
        }

        /* HERO */

        .hero{
            min-height:100vh;
            padding:140px 8% 80px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:60px;
            flex-wrap:wrap;
            position:relative;
        }

        .hero-left{
            flex:1;
            min-width:300px;
            animation:fadeUp 1s ease;
        }

        .hero-badge{
            display:inline-flex;
            align-items:center;
            gap:10px;
            background:#d1fae5;
            color:#047857;
            padding:10px 18px;
            border-radius:999px;
            font-size:14px;
            margin-bottom:25px;
            font-weight:700;
        }

        .hero h1{
            font-size:64px;
            line-height:1.1;
            margin-bottom:25px;
            color:#022c22;
        }

        .hero h1 span{
            color:#10b981;
        }

        .hero p{
            font-size:18px;
            color:#4b5563;
            line-height:1.8;
            margin-bottom:35px;
            max-width:600px;
        }

        .hero-buttons{
            display:flex;
            gap:18px;
            flex-wrap:wrap;
        }

        .btn-primary{
            background:linear-gradient(135deg,#10b981,#059669);
            color:white;
            padding:16px 26px;
            border-radius:16px;
            font-weight:700;
            box-shadow:0 15px 30px rgba(16,185,129,.25);
            transition:.3s;
        }

        .btn-primary:hover{
            transform:translateY(-3px);
        }

        .btn-secondary{
            background:white;
            color:#064e3b;
            padding:16px 26px;
            border-radius:16px;
            font-weight:700;
            border:1px solid #d1fae5;
            transition:.3s;
        }

        .btn-secondary:hover{
            background:#f0fdf4;
        }

        /* MOCKUP */

        .hero-right{
            flex:1;
            min-width:320px;
            display:flex;
            justify-content:center;
            animation:float 4s ease-in-out infinite;
        }

        .mockup{
            width:100%;
            max-width:500px;
            background:white;
            border-radius:32px;
            padding:28px;
            box-shadow:0 25px 60px rgba(0,0,0,.12);
        }

        .mockup-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .mockup-balance{
            background:linear-gradient(135deg,#10b981,#047857);
            padding:28px;
            border-radius:26px;
            color:white;
            margin-bottom:25px;
        }

        .mockup-balance h3{
            font-size:14px;
            opacity:.9;
            margin-bottom:12px;
        }

        .mockup-balance h1{
            font-size:38px;
        }

        .mini-cards{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px;
        }

        .mini-card{
            background:#f0fdf4;
            padding:20px;
            border-radius:20px;
        }

        .mini-card p{
            color:#6b7280;
            font-size:13px;
            margin-bottom:10px;
        }

        .mini-card h2{
            color:#065f46;
            font-size:24px;
        }

        /* FEATURES */

        .section{
            padding:100px 8%;
        }

        .section-title{
            text-align:center;
            margin-bottom:70px;
        }

        .section-title h2{
            font-size:48px;
            color:#022c22;
            margin-bottom:18px;
        }

        .section-title p{
            color:#6b7280;
            max-width:700px;
            margin:auto;
            line-height:1.8;
        }

        .features{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:25px;
        }

        .feature-card{
            background:white;
            padding:35px;
            border-radius:28px;
            box-shadow:0 10px 30px rgba(0,0,0,.06);
            transition:.35s;
        }

        .feature-card:hover{
            transform:translateY(-8px);
        }

        .feature-icon{
            width:70px;
            height:70px;
            border-radius:22px;
            background:#d1fae5;
            color:#047857;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:30px;
            margin-bottom:25px;
        }

        .feature-card h3{
            font-size:24px;
            margin-bottom:15px;
            color:#064e3b;
        }

        .feature-card p{
            color:#6b7280;
            line-height:1.8;
        }

        /* CTA */

        .cta{
            margin:100px 8%;
            background:linear-gradient(135deg,#10b981,#047857);
            border-radius:40px;
            padding:70px;
            text-align:center;
            color:white;
            position:relative;
            overflow:hidden;
        }

        .cta h2{
            font-size:50px;
            margin-bottom:20px;
        }

        .cta p{
            max-width:700px;
            margin:auto;
            line-height:1.8;
            margin-bottom:35px;
            opacity:.92;
        }

        .cta a{
            display:inline-block;
            background:white;
            color:#047857;
            padding:16px 28px;
            border-radius:16px;
            font-weight:800;
        }

        /* FOOTER */

        footer{
            padding:40px 8%;
            text-align:center;
            color:#6b7280;
        }

        /* ANIMATION */

        @keyframes fadeUp{

            from{
                opacity:0;
                transform:translateY(50px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }

        }

        @keyframes float{

            0%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-15px);
            }

            100%{
                transform:translateY(0px);
            }

        }

        /* RESPONSIVE */

        @media(max-width:768px){

            .hero h1{
                font-size:42px;
            }

            .section-title h2{
                font-size:36px;
            }

            .cta{
                padding:50px 30px;
            }

            .cta h2{
                font-size:36px;
            }

            .navbar{
                padding:18px 5%;
            }

            .hero{
                padding:130px 5% 70px;
            }

            .section{
                padding:80px 5%;
            }

        }

    </style>

</head>
<body>

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="logo">

            <img src="{{ asset('logo-bukusaha.png') }}" alt="BukUsaha">

            <h2>BukUsaha</h2>

        </div>

        <a href="/login" class="nav-btn">
            Masuk
        </a>

    </nav>

    <!-- HERO -->

    <section class="hero">

        <div class="hero-left">

            <div class="hero-badge">
                🚀 Pembukuan Digital Modern untuk UMKM
            </div>

            <h1>
                Kelola Keuangan Usaha
                Jadi Lebih
                <span>Mudah</span>
            </h1>

            <p>
                BukUsaha membantu UMKM mencatat pemasukan,
                pengeluaran, dan memantau keuntungan bisnis
                secara real-time dengan tampilan modern,
                cepat, dan mudah digunakan.
            </p>

            <div class="hero-buttons">

                <a href="/register" class="btn-primary">
                    Mulai Sekarang
                </a>

                <a href="/login" class="btn-secondary">
                    Login Dashboard
                </a>

            </div>

        </div>

        <div class="hero-right">

            <div class="mockup">

                <div class="mockup-top">

                    <h3>Dashboard BukUsaha</h3>

                    <span>📈</span>

                </div>

                <div class="mockup-balance">

                    <h3>Total Saldo</h3>

                    <h1>Rp 12.500.000</h1>

                </div>

                <div class="mini-cards">

                    <div class="mini-card">

                        <p>Pemasukan</p>

                        <h2>+ Rp 8jt</h2>

                    </div>

                    <div class="mini-card">

                        <p>Pengeluaran</p>

                        <h2>- Rp 2jt</h2>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- FITUR -->

    <section class="section">

        <div class="section-title">

            <h2>Fitur Unggulan</h2>

            <p>
                Semua kebutuhan pencatatan keuangan UMKM
                dalam satu platform modern.
            </p>

        </div>

        <div class="features">

            <div class="feature-card">

                <div class="feature-icon">
                    💰
                </div>

                <h3>Catat Transaksi</h3>

                <p>
                    Simpan pemasukan dan pengeluaran usaha
                    dengan cepat dan praktis.
                </p>

            </div>

            <div class="feature-card">

                <div class="feature-icon">
                    📊
                </div>

                <h3>Grafik Keuangan</h3>

                <p>
                    Pantau kondisi bisnis melalui dashboard
                    dan grafik interaktif.
                </p>

            </div>

            <div class="feature-card">

                <div class="feature-icon">
                    ⚡
                </div>

                <h3>Realtime</h3>

                <p>
                    Semua data langsung terupdate secara
                    otomatis dan realtime.
                </p>

            </div>

        </div>

    </section>

    <!-- CTA -->

    <section class="cta">

        <h2>
            Mulai Kelola Usaha Lebih Profesional
        </h2>

        <p>
            Gunakan BukUsaha untuk membantu bisnis UMKM
            berkembang dengan pencatatan keuangan modern.
        </p>

        <a href="/register">
            Daftar Gratis
        </a>

    </section>

    <!-- FOOTER -->

    <footer>

        © {{ date('Y') }} BukUsaha • Pembukuan Digital untuk UMKM

    </footer>

</body>
</html>