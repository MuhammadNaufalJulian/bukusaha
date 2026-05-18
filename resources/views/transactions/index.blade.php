<x-app-layout>

<div style="
    background:#f5f3ff;
    min-height:100vh;
    padding:30px;
">

    <!-- ALERT -->

    @if(session('success'))

    <div style="
        background:linear-gradient(135deg,#22c55e,#16a34a);
        color:white;
        padding:18px 22px;
        border-radius:18px;
        margin-bottom:25px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        box-shadow:0 10px 25px rgba(34,197,94,.25);
    ">

        <div style="
            display:flex;
            align-items:center;
            gap:12px;
        ">

            <div style="
                width:40px;
                height:40px;
                border-radius:12px;
                background:rgba(255,255,255,.2);
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:20px;
            ">
                ✓
            </div>

            <div>

                <div style="
                    font-weight:bold;
                    font-size:16px;
                ">
                    Berhasil
                </div>

                <div style="
                    font-size:14px;
                    opacity:.9;
                ">
                    {{ session('success') }}
                </div>

            </div>

        </div>

    </div>

    @endif

    <!-- HEADER -->

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:15px;
    ">

        <div>

            <h1 style="
                font-size:35px;
                font-weight:bold;
                color:#312e81;
                margin-bottom:8px;
            ">
                Semua Transaksi
            </h1>

            <p style="
                color:#6366f1;
            ">
                Kelola seluruh transaksi keuangan
            </p>

        </div>

        <a href="/transactions/create"
           style="
                background:linear-gradient(135deg,#2563eb,#1d4ed8);
                color:white;
                padding:14px 22px;
                border-radius:15px;
                text-decoration:none;
                font-weight:bold;
                box-shadow:0 8px 20px rgba(37,99,235,.25);
           ">
            + Tambah Transaksi
        </a>

    </div>

    <!-- CARD STATISTIK -->

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
        gap:20px;
        margin-bottom:30px;
    ">

        <!-- PEMASUKAN -->

        <div style="
            background:white;
            padding:25px;
            border-radius:25px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        ">

            <p style="
                color:#64748b;
                margin-bottom:12px;
            ">
                Total Pemasukan
            </p>

            <h2 style="
                color:#16a34a;
                font-size:35px;
                font-weight:bold;
            ">
                Rp {{ number_format($totalIncome) }}
            </h2>

        </div>

        <!-- PENGELUARAN -->

        <div style="
            background:white;
            padding:25px;
            border-radius:25px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        ">

            <p style="
                color:#64748b;
                margin-bottom:12px;
            ">
                Total Pengeluaran
            </p>

            <h2 style="
                color:#dc2626;
                font-size:35px;
                font-weight:bold;
            ">
                Rp {{ number_format($totalExpense) }}
            </h2>

        </div>

    </div>

    <!-- FILTER -->

    <form method="GET"
          style="
            display:flex;
            gap:15px;
            flex-wrap:wrap;
            margin-bottom:25px;
            background:white;
            padding:20px;
            border-radius:22px;
            box-shadow:0 5px 15px rgba(0,0,0,.06);
          ">

        <!-- SEARCH -->

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari transaksi..."
            style="
                padding:14px;
                border-radius:14px;
                border:1px solid #ddd;
                min-width:250px;
                outline:none;
            "
        >

        <!-- TYPE -->

        <select
            name="type"
            style="
                padding:14px;
                border-radius:14px;
                border:1px solid #ddd;
                outline:none;
            "
        >

            <option value="">Semua Jenis</option>

            <option value="pemasukan"
                {{ request('type') == 'pemasukan' ? 'selected' : '' }}>
                Pemasukan
            </option>

            <option value="pengeluaran"
                {{ request('type') == 'pengeluaran' ? 'selected' : '' }}>
                Pengeluaran
            </option>

        </select>

        <!-- BULAN -->

        <select
            name="month"
            style="
                padding:14px;
                border-radius:14px;
                border:1px solid #ddd;
                outline:none;
            "
        >

            <option value="">Semua Bulan</option>

            @for($i = 1; $i <= 12; $i++)

                <option value="{{ $i }}"
                    {{ request('month') == $i ? 'selected' : '' }}>

                    {{ date('F', mktime(0,0,0,$i,1)) }}

                </option>

            @endfor

        </select>

        <!-- TAHUN -->

        <select
            name="year"
            style="
                padding:14px;
                border-radius:14px;
                border:1px solid #ddd;
                outline:none;
            "
        >

            @for($i = date('Y'); $i >= 2020; $i--)

                <option value="{{ $i }}"
                    {{ request('year', date('Y')) == $i ? 'selected' : '' }}>

                    Tahun {{ $i }}

                </option>

            @endfor

        </select>

        <!-- BUTTON -->

        <button
            type="submit"
            style="
                background:#2563eb;
                color:white;
                border:none;
                padding:14px 22px;
                border-radius:14px;
                font-weight:bold;
                cursor:pointer;
            "
        >
            Filter
        </button>

    </form>

    <!-- TABLE -->

    <div style="
        background:white;
        border-radius:25px;
        overflow:hidden;
        box-shadow:0 5px 15px rgba(0,0,0,.08);
    ">

        <div style="
            overflow-x:auto;
        ">

            <table style="
                width:100%;
                border-collapse:collapse;
                min-width:850px;
            ">

                <thead style="
                    background:#eef2ff;
                ">

                    <tr>

                        <th style="padding:20px;text-align:left;">
                            Tanggal
                        </th>

                        <th style="padding:20px;text-align:left;">
                            Kategori
                        </th>

                        <th style="padding:20px;text-align:left;">
                            Jenis
                        </th>

                        <th style="padding:20px;text-align:left;">
                            Nominal
                        </th>

                        <th style="padding:20px;text-align:center;">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transactions as $transaction)

                    @php

                        $amountColor = $transaction->type == 'pemasukan'
                            ? '#16a34a'
                            : '#dc2626';

                    @endphp

                    <tr style="
                        border-bottom:1px solid #eee;
                    ">

                        <td style="
                            padding:20px;
                            color:#334155;
                            font-weight:500;
                        ">
                            {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}
                        </td>

                        <td style="padding:20px;">

                            <div style="
                                font-weight:bold;
                                margin-bottom:5px;
                                color:#0f172a;
                            ">
                                {{ $transaction->category }}
                            </div>

                            <small style="
                                color:#64748b;
                            ">
                                {{ $transaction->description }}
                            </small>

                        </td>

                        <td style="padding:20px;">

                            @if($transaction->type == 'pemasukan')

                                <span style="
                                    background:#dcfce7;
                                    color:#16a34a;
                                    padding:8px 14px;
                                    border-radius:30px;
                                    font-size:13px;
                                    font-weight:bold;
                                ">
                                    Pemasukan
                                </span>

                            @else

                                <span style="
                                    background:#fee2e2;
                                    color:#dc2626;
                                    padding:8px 14px;
                                    border-radius:30px;
                                    font-size:13px;
                                    font-weight:bold;
                                ">
                                    Pengeluaran
                                </span>

                            @endif

                        </td>

                        <td style="padding:18px;font-weight:bold;">

    @if($transaction->type == 'pemasukan')

        <span style="color:#16a34a;">

            +

            Rp {{ number_format($transaction->amount) }}

        </span>

    @else

        <span style="color:#dc2626;">

            -

            Rp {{ number_format($transaction->amount) }}

        </span>

    @endif

</td>

                        <td style="
                            padding:20px;
                            text-align:center;
                        ">

                            <div style="
                                display:flex;
                                justify-content:center;
                                gap:10px;
                                flex-wrap:wrap;
                            ">

                                <!-- EDIT -->

                                <a href="/transactions/{{ $transaction->id }}/edit"
                                   style="
                                        background:#2563eb;
                                        color:white;
                                        padding:10px 16px;
                                        border-radius:12px;
                                        text-decoration:none;
                                        font-size:14px;
                                        font-weight:bold;
                                   ">
                                    Edit
                                </a>

                                <!-- DELETE -->

                                <form action="/transactions/{{ $transaction->id }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus transaksi ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            style="
                                                background:#dc2626;
                                                color:white;
                                                border:none;
                                                padding:10px 16px;
                                                border-radius:12px;
                                                font-size:14px;
                                                font-weight:bold;
                                                cursor:pointer;
                                            ">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            style="
                                padding:40px;
                                text-align:center;
                                color:#64748b;
                            ">

                            Belum ada transaksi

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- PAGINATION -->

    <div style="
        margin-top:25px;
    ">
        {{ $transactions->withQueryString()->links() }}
    </div>

</div>

</x-app-layout>