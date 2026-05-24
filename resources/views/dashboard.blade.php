<style>

.income-text{
    color:#10b981;
}

.expense-text{
    color:#ef4444;
}

.income-icon{
    background:#dcfce7;
    color:#16a34a;
}

.expense-icon{
    background:#fee2e2;
    color:#dc2626;
}

</style>

<!-- MODAL HAPUS -->

<div
    id="deleteModal"
    style="
        position:fixed;
        inset:0;
        background:rgba(15,23,42,.55);
        backdrop-filter:blur(5px);
        display:none;
        align-items:center;
        justify-content:center;
        z-index:99999;
        padding:20px;
    "
>

    <div
        style="
            background:white;
            width:100%;
            max-width:420px;
            border-radius:28px;
            padding:30px;
            animation:popup .25s ease;
            box-shadow:0 20px 50px rgba(0,0,0,.25);
        "
    >

        <div style="
            width:75px;
            height:75px;
            margin:auto;
            border-radius:22px;
            background:#fee2e2;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:38px;
            margin-bottom:20px;
        ">
            🗑️
        </div>

        <h2 style="
            text-align:center;
            font-size:28px;
            font-weight:bold;
            color:#0f172a;
            margin-bottom:12px;
        ">
            Hapus Transaksi?
        </h2>

        <p style="
            text-align:center;
            color:#64748b;
            line-height:1.7;
            font-size:15px;
            margin-bottom:28px;
        ">
            Data transaksi akan dihapus permanen dan tidak dapat dikembalikan lagi.
        </p>

        <div style="
            display:flex;
            gap:12px;
        ">

            <button
                onclick="closeDeleteModal()"
                style="
                    flex:1;
                    border:none;
                    background:#e2e8f0;
                    color:#0f172a;
                    padding:14px;
                    border-radius:14px;
                    font-weight:bold;
                    cursor:pointer;
                    font-size:15px;
                "
            >
                Batal
            </button>

            <button
                id="confirmDeleteBtn"
                style="
                    flex:1;
                    border:none;
                    background:linear-gradient(135deg,#ef4444,#dc2626);
                    color:white;
                    padding:14px;
                    border-radius:14px;
                    font-weight:bold;
                    cursor:pointer;
                    font-size:15px;
                    box-shadow:0 10px 25px rgba(239,68,68,.35);
                "
            >
                Ya, Hapus
            </button>

        </div>

    </div>

</div>

<style>

@keyframes popup {

    from{
        transform:scale(.85);
        opacity:0;
    }

    to{
        transform:scale(1);
        opacity:1;
    }

}

</style>

<script>

let selectedForm = null;

function showDeleteModal(event, form){

    event.preventDefault();

    selectedForm = form;

    document.getElementById('deleteModal').style.display = 'flex';

    return false;
}

function closeDeleteModal(){

    document.getElementById('deleteModal').style.display = 'none';

}

document
    .getElementById('confirmDeleteBtn')
    .addEventListener('click', function(){

        if(selectedForm){

            selectedForm.submit();

        }

    });

</script>

<x-app-layout>

@if(session('success'))

<div id="success-alert" style="
    position:fixed;
    top:25px;
    right:25px;
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    padding:18px 22px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
    z-index:9999;
    min-width:320px;
    animation:slideIn .4s ease;
">

    <div style="
        display:flex;
        align-items:center;
        gap:15px;
    ">

        <div style="
            width:45px;
            height:45px;
            background:rgba(255,255,255,.2);
            border-radius:12px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
        ">
            ✓
        </div>

        <div>

            <h3 style="
                margin:0;
                font-size:17px;
                font-weight:bold;
            ">
                Berhasil
            </h3>

            <p style="
                margin:4px 0 0 0;
                opacity:.95;
                font-size:14px;
            ">
                {{ session('success') }}
            </p>

        </div>

    </div>

</div>

<style>

@keyframes slideIn {

    from{
        opacity:0;
        transform:translateX(100px);
    }

    to{
        opacity:1;
        transform:translateX(0);
    }

}

</style>

<script>

setTimeout(() => {

    const alertBox =
        document.getElementById('success-alert');

    if(alertBox){

        alertBox.style.transition = '0.5s';
        alertBox.style.opacity = '0';

        setTimeout(() => {

            alertBox.remove();

        },500);

    }

},3000);

</script>

@endif

<div style="
    background:#ecfdf5;
    min-height:100vh;
    padding:25px;
">

    <!-- HEADER -->

<a href="/transactions">

    <div  style="
        background:#d1fae5;
        padding:25px;
        border-radius:25px;
        margin-bottom:25px;
        cursor:pointer;
        transition:.2s;
    "
    onmouseover="this.style.transform='scale(1.01)'"
    onmouseout="this.style.transform='scale(1)'"
    >
    

        <h1 style="
            font-size:34px;
            font-weight:bold;
            color:#064e3b;
            margin-bottom:8px;
        ">
            Dashboard Keuangan • v1.0
        </h1>

        <p style="
            color:#047857;
            font-size:15px;
        ">
            Ringkasan transaksi dan keuangan Anda
        </p>

    </div>

</a>

    <!-- CARD UTAMA -->

    <!-- QUICK ACTION -->

<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(150px,1fr));
    gap:20px;
    margin-bottom:25px;
">

    <!-- QUICK ACTION -->

<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(150px,1fr));
    gap:20px;
    margin-bottom:25px;
">

    <!-- TAMBAH PEMASUKAN -->

    <button
    type="button"
        onclick="openTransactionModal('pemasukan')"
        style="
            border:none;
            cursor:pointer;
            background:linear-gradient(135deg,#10b981,#059669);
            border-radius:28px;
            padding:32px;
            color:white;
            text-decoration:none;
            position:relative;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(16,185,129,.25);
            transition:.25s;
            display:block;
            text-align:left;
        "
        onmouseover="this.style.transform='translateY(-4px)'"
        onmouseout="this.style.transform='translateY(0)'"
    >

        <div style="
            position:absolute;
            top:-40px;
            right:-40px;
            width:140px;
            height:140px;
            background:rgba(255,255,255,.08);
            border-radius:50%;
        "></div>

        <div style="
            width:75px;
            height:75px;
            border-radius:22px;
            background:rgba(255,255,255,.18);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:34px;
            margin-bottom:28px;
            backdrop-filter:blur(5px);
        ">
            ↗
        </div>

        <h2 style="
            font-size:34px;
            font-weight:bold;
            margin-bottom:10px;
        ">
            Tambah
            <br>
            Pemasukan
        </h2>

        <p style="
            opacity:.92;
            line-height:1.7;
            font-size:15px;
            margin-bottom:25px;
        ">
            Catat pemasukan usaha harian dengan cepat dan rapi.
        </p>

    </button>

    <!-- TAMBAH PENGELUARAN -->

    <button
    type="button"
        onclick="openTransactionModal('pengeluaran')"
        style="
            border:none;
            cursor:pointer;
            background:linear-gradient(135deg,#ef4444,#dc2626);
            border-radius:28px;
            padding:32px;
            color:white;
            text-decoration:none;
            position:relative;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(239,68,68,.22);
            transition:.25s;
            display:block;
            text-align:left;
        "
        onmouseover="this.style.transform='translateY(-4px)'"
        onmouseout="this.style.transform='translateY(0)'"
    >

        <div style="
            position:absolute;
            top:-40px;
            right:-40px;
            width:140px;
            height:140px;
            background:rgba(255,255,255,.08);
            border-radius:50%;
        "></div>

        <div style="
            width:75px;
            height:75px;
            border-radius:22px;
            background:rgba(255,255,255,.18);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:34px;
            margin-bottom:28px;
            backdrop-filter:blur(5px);
        ">
            ↘
        </div>

        <h2 style="
            font-size:34px;
            font-weight:bold;
            margin-bottom:10px;
        ">
            Tambah
            <br>
            Pengeluaran
        </h2>

        <p style="
            opacity:.92;
            line-height:1.7;
            font-size:15px;
            margin-bottom:25px;
        ">
            Kelola pengeluaran usaha agar cashflow tetap sehat.
        </p>

    </button>

</div>



</div>


    <!-- GRID CARD -->

    <div class="mobile-grid-1" style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
        gap:20px;
    ">

        <!-- PENDAPATAN HARI INI -->

        <div style="
            background:white;
            border-radius:22px;
            padding:22px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#22c55e;
                border-radius:15px;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:22px;
                margin-bottom:25px;
            ">
                ↗
            </div>

            <div style="
                border:1px solid #eee;
                border-radius:15px;
                padding:15px;
            ">

                <p style="
                    color:#737373;
                    font-size:13px;
                    margin-bottom:10px;
                ">
                    PENDAPATAN HARI INI
                </p>

                <h2 style="
                    color:#16a34a;
                    font-size:32px;
                    font-weight:bold;
                    margin-bottom:15px;
                ">
                    Rp {{ number_format($todayIncome) }}
                </h2>

                <hr style="
                    border:none;
                    border-top:1px solid #ddd;
                    margin-bottom:10px;
                ">

                <div style="
                    display:flex;
                    gap:6px;
                ">
                    <div style="
                        width:6px;
                        height:6px;
                        background:#22c55e;
                        border-radius:50%;
                    "></div>

                    <div style="
                        width:6px;
                        height:6px;
                        background:#22c55e;
                        border-radius:50%;
                    "></div>
                </div>

            </div>

        </div>

        <!-- PENGELUARAN -->

        <div style="
            background:white;
            border-radius:22px;
            padding:22px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#ef4444;
                border-radius:15px;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:22px;
                margin-bottom:25px;
            ">
                ↘
            </div>

            <div style="
                border:1px solid #eee;
                border-radius:15px;
                padding:15px;
            ">

                <p style="
                    color:#737373;
                    font-size:13px;
                    margin-bottom:10px;
                ">
                    PENGELUARAN HARI INI
                </p>

                <h2 style="
                    color:#dc2626;
                    font-size:32px;
                    font-weight:bold;
                    margin-bottom:15px;
                ">
                    Rp {{ number_format($todayExpense) }}
                </h2>

                <hr style="
                    border:none;
                    border-top:1px solid #ddd;
                    margin-bottom:10px;
                ">

                <div style="
                    display:flex;
                    gap:6px;
                ">
                    <div style="
                        width:6px;
                        height:6px;
                        background:#ef4444;
                        border-radius:50%;
                    "></div>

                    <div style="
                        width:6px;
                        height:6px;
                        background:#ef4444;
                        border-radius:50%;
                    "></div>
                </div>

            </div>

        </div>

        <!-- LABA -->

        <div style="
            background:white;
            border-radius:22px;
            padding:22px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#a855f7;
                border-radius:15px;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:22px;
                margin-bottom:25px;
            ">
                📊
            </div>

            <div style="
                border:1px solid #eee;
                border-radius:15px;
                padding:15px;
            ">

                <p style="
                    color:#737373;
                    font-size:13px;
                    margin-bottom:10px;
                ">
                    LABA BERSIH BULAN INI
                </p>

                <h2 style="
                    color:#9333ea;
                    font-size:32px;
                    font-weight:bold;
                    margin-bottom:15px;
                ">
                    Rp {{ number_format($profit) }}
                </h2>

                <hr style="
                    border:none;
                    border-top:1px solid #ddd;
                    margin-bottom:10px;
                ">

                <div style="
                    display:flex;
                    gap:6px;
                ">
                    <div style="
                        width:6px;
                        height:6px;
                        background:#a855f7;
                        border-radius:50%;
                    "></div>

                    <div style="
                        width:6px;
                        height:6px;
                        background:#a855f7;
                        border-radius:50%;
                    "></div>
                </div>

            </div>

        </div>

        <!-- PENDAPATAN BULAN -->

        <div style="
            background:white;
            border-radius:22px;
            padding:22px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#10b981;
                border-radius:15px;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:22px;
                margin-bottom:25px;
            ">
                $
            </div>

            <div style="
                border:1px solid #eee;
                border-radius:15px;
                padding:15px;
            ">

                <p style="
                    color:#737373;
                    font-size:13px;
                    margin-bottom:10px;
                ">
                    PENDAPATAN BULAN INI
                </p>

                <h2 style="
                    color:#059669;
                    font-size:32px;
                    font-weight:bold;
                    margin-bottom:15px;
                ">
                    Rp {{ number_format($monthIncome) }}
                </h2>

                <hr style="
                    border:none;
                    border-top:1px solid #ddd;
                    margin-bottom:10px;
                ">

                <div style="
                    display:flex;
                    gap:6px;
                ">
                    <div style="
                        width:6px;
                        height:6px;
                        background:#10b981;
                        border-radius:50%;
                    "></div>

                    <div style="
                        width:6px;
                        height:6px;
                        background:#10b981;
                        border-radius:50%;
                    "></div>
                </div>

            </div>

        </div>

        <!-- PENGELUARAN BULAN -->

        <div style="
            background:white;
            border-radius:22px;
            padding:22px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        ">

            <div style="
                width:55px;
                height:55px;
                background:#f97316;
                border-radius:15px;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:22px;
                margin-bottom:25px;
            ">
                👜
            </div>

            <div style="
                border:1px solid #eee;
                border-radius:15px;
                padding:15px;
            ">

                <p style="
                    color:#737373;
                    font-size:13px;
                    margin-bottom:10px;
                ">
                    PENGELUARAN BULAN INI
                </p>

                <h2 style="
                    color:#ea580c;
                    font-size:32px;
                    font-weight:bold;
                    margin-bottom:15px;
                ">
                    Rp {{ number_format($monthExpense) }}
                </h2>

                <hr style="
                    border:none;
                    border-top:1px solid #ddd;
                    margin-bottom:10px;
                ">

                <div style="
                    display:flex;
                    gap:6px;
                ">
                    <div style="
                        width:6px;
                        height:6px;
                        background:#f97316;
                        border-radius:50%;
                    "></div>

                    <div style="
                        width:6px;
                        height:6px;
                        background:#f97316;
                        border-radius:50%;
                    "></div>
                </div>

            </div>

        </div>

    </div>

</div>


<!-- TRANSAKSI TERBARU -->

<div class="transaction-card" style="margin-top:35px;">

    <div class="mobile-column" style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    ">

        <h2 style="
            font-size:28px;
            font-weight:bold;
            color:#10b981;
        ">
            Transaksi Terbaru
        </h2>
        <div style="margin-top:20px;">



</div>

    </div>

    <div style="
        display:flex;
        flex-direction:column;
        gap:15px;
    ">

        @foreach($latestTransactions as $transaction)

<div style="
    background:white;
    margin:0 30px;
    border-radius:20px;
    padding:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);

    display:flex;
    justify-content:space-between;
    align-items:center;
">

    <!-- KIRI -->

    <div style="
        display:flex;
        align-items:center;
        gap:18px;
    ">

        <!-- ICON -->

       @php

$bgColor = $transaction->type == 'pemasukan'
    ? '#dcfce7'
    : '#fee2e2';

$textColor = $transaction->type == 'pemasukan'
    ? '#16a34a'
    : '#dc2626';

@endphp
<div class="{{ $transaction->type == 'pemasukan' ? 'income-icon' : 'expense-icon' }}"
    style="
        width:60px;
        height:60px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:24px;
        flex-shrink:0;
    "
>

            {{ $transaction->type == 'pemasukan' ? '↗' : '↘' }}

        </div>

        <!-- INFO -->

        <div>

            <h3 style="
                font-size:18px;
                font-weight:bold;
                color:#0f172a;
                margin-bottom:5px;
            ">
                {{ $transaction->category }}
            </h3>

            <p style="
                color:#64748b;
                font-size:14px;
                margin-bottom:5px;
            ">
                {{ $transaction->description }}
            </p>

            <small style="
                color:#94a3b8;
                font-size:12px;
            ">
                {{ $transaction->transaction_date }}
            </small>

        </div>

    </div>

    <!-- KANAN -->

    <div class="transaction-right" style="
        text-align:right;
        min-width:180px;
    ">

        @php
    $amountColor = $transaction->type == 'pemasukan'
        ? '#10b981'
        : '#ef4444';
@endphp

<h2
    style="font-size:24px;font-weight:bold;"
    class="{{ $transaction->type == 'pemasukan' ? 'income-text' : 'expense-text' }}"
>

            {{ $transaction->type == 'pemasukan' ? '+' : '-' }}
            Rp {{ number_format($transaction->amount) }}

        </h2>

        <p style="
            font-size:13px;
            color:#64748b;
            text-transform:capitalize;
            margin-top:5px;
        ">
            {{ $transaction->type }}
        </p>

        <!-- EDIT -->

        <div style="
        margin-top:10px;
        text-align:right;
        ">

            <button
    type="button"

    onclick="openEditModal(
        '{{ $transaction->id }}',
        '{{ $transaction->type }}',
        '{{ $transaction->category }}',
        '{{ $transaction->description }}',
        '{{ $transaction->amount }}',
        '{{ $transaction->transaction_date }}'
    )"

    style="
        background:none;
        border:none;
        color:#10b981;
        font-size:14px;
        font-weight:bold;
        cursor:pointer;
        padding:0;
    "
>
    ✏️ Edit
</button>

            <form
    action="/transactions/{{ $transaction->id }}"
    method="POST"
    style="margin-top:10px;"
    onsubmit="return showDeleteModal(event, this)"
>

    @csrf
    @method('DELETE')

    <button
        type="submit"
        style="
            background:none;
            border:none;
            color:#ef4444;
            font-size:14px;
            font-weight:bold;
            cursor:pointer;
            padding:0;
        "
    >
        🗑️ Hapus
    </button>

</form>

        </div>

    </div>

</div>

@endforeach
    </div>

</div>



<!-- MODAL TAMBAH TRANSAKSI -->

<div
    id="transactionModal"
    style="
        position:fixed;
        inset:0;
        background:rgba(15,23,42,.55);
        backdrop-filter:blur(5px);
        display:none;
        align-items:center;
        justify-content:center;
        z-index:999999;
        padding:20px;
    "
>

    <div
        style="
            background:white;
            width:100%;
            max-width:550px;
            border-radius:30px;
            padding:30px;
            position:relative;
            animation:popup .25s ease;
            max-height:90vh;
            overflow-y:auto;
            box-shadow:0 20px 50px rgba(0,0,0,.25);
        "
    >

        <!-- CLOSE -->

        <button
            type="button"
            onclick="closeTransactionModal()"
            style="
                position:absolute;
                top:18px;
                right:18px;
                width:42px;
                height:42px;
                border:none;
                border-radius:12px;
                background:#f1f5f9;
                font-size:20px;
                cursor:pointer;
                font-weight:bold;
            "
        >
            ✕
        </button>

        <!-- TITLE -->

        <h2
            id="transactionModalTitle"
            style="
                font-size:30px;
                font-weight:bold;
                margin-bottom:10px;
                color:#0f172a;
            "
        >
            Tambah Transaksi
        </h2>

        <p
            id="transactionModalDesc"
            style="
                color:#64748b;
                margin-bottom:30px;
            "
        >
            Tambahkan pemasukan atau pengeluaran baru
        </p>

        <!-- FORM -->

        <form
            id="transactionForm"
            action="/transactions"
            method="POST"
        >

            @csrf

            <!-- TYPE -->

            <input
                type="hidden"
                name="type"
                id="transactionType"
            >

            <!-- CATEGORY -->

            <div style="margin-bottom:20px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    Kategori
                </label>

                <input
                    type="text"
                    name="category"
                    required
                    placeholder="Contoh: Penjualan"
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                        outline:none;
                    "
                >

            </div>

            <!-- AMOUNT -->

            <div style="margin-bottom:20px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    Jumlah
                </label>

                <input
                    type="number"
                    name="amount"
                    required
                    placeholder="Masukkan nominal"
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                        outline:none;
                    "
                >

            </div>

            <!-- DESCRIPTION -->

            <div style="margin-bottom:20px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="4"
                    placeholder="Masukkan deskripsi transaksi"
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                        resize:none;
                        outline:none;
                    "
                ></textarea>

            </div>

            <!-- DATE -->

            <div style="margin-bottom:30px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                ">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="transaction_date"
                    value="{{ date('Y-m-d') }}"
                    required
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                        outline:none;
                    "
                >

            </div>

            <!-- BUTTON -->

            <button
                type="submit"
                id="transactionSubmitBtn"
                style="
                    width:100%;
                    background:linear-gradient(135deg,#10b981,#059669);
                    color:white;
                    border:none;
                    padding:16px;
                    border-radius:16px;
                    font-size:16px;
                    font-weight:bold;
                    cursor:pointer;
                    box-shadow:0 10px 25px rgba(16,185,129,.25);
                "
            >
                ➕ Simpan Transaksi
            </button>

        </form>

    </div>

</div>

<!-- SCRIPT MODAL TRANSAKSI -->

<script>

function openTransactionModal(type){

    const modal =
        document.getElementById('transactionModal');

    const form =
        document.getElementById('transactionForm');

    form.reset();

    document.getElementById('transactionType')
        .value = type;

    const title =
        document.getElementById('transactionModalTitle');

    const desc =
        document.getElementById('transactionModalDesc');

    const btn =
        document.getElementById('transactionSubmitBtn');

    if(type === 'pemasukan'){

        title.innerHTML = 'Tambah Pemasukan';

        desc.innerHTML =
            'Tambahkan data pemasukan baru';

        btn.style.background =
            'linear-gradient(135deg,#10b981,#059669)';

    }else{

        title.innerHTML = 'Tambah Pengeluaran';

        desc.innerHTML =
            'Tambahkan data pengeluaran baru';

        btn.style.background =
            'linear-gradient(135deg,#ef4444,#dc2626)';

    }

    modal.style.display = 'flex';

}

function closeTransactionModal(){

    document.getElementById('transactionModal')
        .style.display = 'none';

}

window.addEventListener('click', function(event){

    const modal =
        document.getElementById('transactionModal');

    if(event.target === modal){

        closeTransactionModal();

    }

});

</script>

<!-- MODAL EDIT -->

<div
    id="editModal"
    style="
        position:fixed;
        inset:0;
        background:rgba(15,23,42,.55);
        backdrop-filter:blur(5px);
        display:none;
        align-items:center;
        justify-content:center;
        z-index:999999;
        padding:20px;
    "
>

    <div style="
        background:white;
        width:100%;
        max-width:520px;
        border-radius:28px;
        padding:30px;
        animation:popup .25s ease;
        box-shadow:0 20px 50px rgba(0,0,0,.25);
    ">

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        ">

            <h2 style="
                font-size:28px;
                font-weight:bold;
                color:#0f172a;
            ">
                Edit Transaksi
            </h2>

            <button
                onclick="closeEditModal()"
                style="
                    border:none;
                    background:#f1f5f9;
                    width:42px;
                    height:42px;
                    border-radius:12px;
                    cursor:pointer;
                    font-size:18px;
                "
            >
                ✕
            </button>

        </div>

        <form
            id="editForm"
            method="POST"
        >

            @csrf
            @method('PUT')

            <input
                type="hidden"
                name="type"
                id="editType"
            >

            <!-- KATEGORI -->

            <div style="margin-bottom:18px;">

                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:bold;
                    color:#334155;
                ">
                    Kategori
                </label>

                <input
                    type="text"
                    name="category"
                    id="editCategory"
                    required
                    style="
                        width:100%;
                        padding:14px;
                        border-radius:14px;
                        border:1px solid #dbe2ea;
                        outline:none;
                    "
                >

            </div>

            <!-- DESKRIPSI -->

            <div style="margin-bottom:18px;">

                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:bold;
                    color:#334155;
                ">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    id="editDescription"
                    rows="3"
                    style="
                        width:100%;
                        padding:14px;
                        border-radius:14px;
                        border:1px solid #dbe2ea;
                        outline:none;
                        resize:none;
                    "
                ></textarea>

            </div>

            <!-- NOMINAL -->

            <div style="margin-bottom:18px;">

                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:bold;
                    color:#334155;
                ">
                    Nominal
                </label>

                <input
                    type="number"
                    name="amount"
                    id="editAmount"
                    required
                    style="
                        width:100%;
                        padding:14px;
                        border-radius:14px;
                        border:1px solid #dbe2ea;
                        outline:none;
                    "
                >

            </div>

            <!-- TANGGAL -->

            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:bold;
                    color:#334155;
                ">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="transaction_date"
                    id="editDate"
                    required
                    style="
                        width:100%;
                        padding:14px;
                        border-radius:14px;
                        border:1px solid #dbe2ea;
                        outline:none;
                    "
                >

            </div>

            <button
                type="submit"
                id="editSubmitButton"
                style="
                    width:100%;
                    border:none;
                    padding:16px;
                    border-radius:16px;
                    color:white;
                    font-size:16px;
                    font-weight:bold;
                    cursor:pointer;
                    background:linear-gradient(135deg,#10b981,#059669);
                "
            >
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>


<script>

function openEditModal(
    id,
    type,
    category,
    description,
    amount,
    date
){

    document.getElementById('editModal').style.display = 'flex';

    document.getElementById('editForm').action =
        '/transactions/' + id;

    document.getElementById('editType').value =
        type;

    document.getElementById('editCategory').value =
        category;

    document.getElementById('editDescription').value =
        description;

    document.getElementById('editAmount').value =
        amount;

    document.getElementById('editDate').value =
        date;

    const btn =
        document.getElementById('editSubmitButton');

    if(type === 'pemasukan'){

        btn.style.background =
            'linear-gradient(135deg,#10b981,#059669)';

    }else{

        btn.style.background =
            'linear-gradient(135deg,#ef4444,#dc2626)';

    }

}

function closeEditModal(){

    document.getElementById('editModal').style.display = 'none';

}

</script>


<style>

/* =========================
   RESPONSIVE MOBILE
========================= */

@media (max-width:768px){

    body{
        overflow-x:hidden;
    }

    /* WRAPPER */

    .mobile-grid-1{
        grid-template-columns:1fr !important;
    }

    /* HEADER */

    h1{
        font-size:26px !important;
    }

    /* QUICK ACTION */

    .mobile-column{
        flex-direction:column !important;
        align-items:flex-start !important;
        gap:15px;
        margin-left:50px;

    }

    /* TRANSACTION CARD */

    .transaction-card{
        margin-top:25px !important;
    }

    /* TRANSACTION ITEM */

    .transaction-card > div:last-child > div{
        flex-direction:column !important;
        align-items:flex-start !important;
        gap:18px;
    }

    .transaction-right{
        width:100%;
        text-align:left !important;
    }

    /* CARD */

    .transaction-card h2{
        font-size:22px !important;
    }

    /* BUTTON */

    a,
    button{
        font-size:14px !important;
    }

    /* MODAL */

    #transactionModal > div,
    #editModal > div,
    #deleteModal > div{
        width:100% !important;
        max-width:100% !important;
        border-radius:24px !important;
        padding:22px !important;
    }

    /* TITLE MODAL */

    #transaction:ModalTitle{
        font-size:24px !important;
    }

    /* INPUT */

    input,
    textarea{
        font-size:16px !important;
    }

    /* SUCCESS ALERT */

    #success-alert{
        right:15px !important;
        left:15px !important;
        min-width:auto !important;
        top:15px !important;
    }

    /* SPACING */

    .transaction-card div[style*="margin:0 30px"]{
        margin:15px !important;

    }

    .transaction-card div[style*="margin-left:30px"]{
        margin-left:0 !important;
    }

}

/* EXTRA SMALL */

@media (max-width:480px){

    h1{
        font-size:22px !important;
    }

    .transaction-card h2{
        font-size:20px !important;
    }

    .transaction-right h2{
        font-size:20px !important;
    }

    #transactionModalTitle{
        font-size:22px !important;
    }

}

</style>

</x-app-layout>
