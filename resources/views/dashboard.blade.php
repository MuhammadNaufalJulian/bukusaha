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
    background:linear-gradient(135deg,#22c55e,#16a34a);
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
    background:#f5eef8;
    min-height:100vh;
    padding:25px;
">

    <!-- HEADER -->

    <div style="
        background:#f3eef7;
        padding:25px;
        border-radius:25px;
        margin-bottom:25px;
    ">

        <h1 style="
            font-size:34px;
            font-weight:bold;
            color:#312e81;
            margin-bottom:8px;
        ">
            Dashboard Keuangan
        </h1>

        <p style="
            color:#6366f1;
            font-size:15px;
        ">
            Ringkasan transaksi dan keuangan Anda
        </p>

    </div>

    <!-- CARD UTAMA -->

    <div style="
        background:linear-gradient(135deg,#2563eb,#06b6d4);
        border-radius:25px;
        padding:30px;
        color:white;
        position:relative;
        overflow:hidden;
        margin-bottom:25px;
        box-shadow:0 10px 30px rgba(37,99,235,.3);
    ">

        <div style="
            width:70px;
            height:70px;
            background:rgba(255,255,255,.2);
            border-radius:18px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin-bottom:30px;
            font-size:30px;
        ">
            💳
        </div>

        <div style="
            position:absolute;
            top:25px;
            right:25px;
            background:rgba(255,255,255,.2);
            padding:8px 18px;
            border-radius:30px;
            font-size:13px;
        ">
            Total
        </div>

        <div style="
            border:1px solid rgba(255,255,255,.3);
            border-radius:20px;
            padding:25px;
            backdrop-filter:blur(5px);
        ">

            <p style="
                font-size:14px;
                opacity:.9;
                margin-bottom:10px;
                letter-spacing:1px;
            ">
                SALDO SAAT INI
            </p>

            <h1 style="
                font-size:48px;
                font-weight:bold;
                margin-bottom:20px;
            ">
                Rp {{ number_format($balance) }}
            </h1>

            <hr style="
                border:none;
                border-top:1px solid rgba(255,255,255,.3);
                margin-bottom:15px;
            ">

            <div style="
                display:flex;
                align-items:center;
                gap:10px;
                font-size:14px;
            ">

                <div style="
                    width:8px;
                    height:8px;
                    background:#4ade80;
                    border-radius:50%;
                "></div>

                Aktif

            </div>

        </div>

    </div>
    

    <!-- GRID CARD -->

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
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

<div style="margin-top:35px;">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
        margin-left:30px;
    ">

        <h2 style="
            font-size:28px;
            font-weight:bold;
            color:#1e293b;
        ">
            Transaksi Terbaru
        </h2>
        <div style="margin-top:20px;">

    <a href="/transactions/create"
       style="
            background:#2563eb;
            color:white;
            padding:12px 20px;
            border-radius:12px;
            text-decoration:none;
            font-weight:bold;
            display:inline-block;
       ">
        + Tambah Transaksi
    </a>

</div>

        <a href="/transactions"
           style="
                color:#2563eb;
                text-decoration:none;
                font-weight:bold;
                margin-right:30px;
           ">
            Lihat Semua
        </a>

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

    <div style="
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

        <div style="margin-top:10px;">

            <a
                href="/transactions/{{ $transaction->id }}/edit"
                style="
                    color:#2563eb;
                    text-decoration:none;
                    font-size:14px;
                    font-weight:bold;
                "
            >
                ✏️ Edit
            </a>

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

<!-- GRAFIK KEUANGAN -->

<div style="
    margin:40px 30px 40px 30px;
    background:white;
    border-radius:25px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
">

    <h2 style="
        font-size:28px;
        font-weight:bold;
        margin-bottom:25px;
        color:#1e293b;
    ">
        Grafik Keuangan
    </h2>

    <div style="
    position:relative;
    height:400px;
    width:100%;
">
    <canvas id="financeChart"></canvas>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('financeChart').getContext('2d');

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Ags',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],

            datasets: [

                {
                    label: 'Pemasukan',

                    data: [
    1200000,
    1800000,
    1500000,
    2100000,
    2400000,
    1900000,
    2600000,
    2800000,
    2200000,
    3100000,
    3500000,
    4000000
],

                    borderColor: '#16a34a',

                    backgroundColor: 'rgba(22,163,74,0.1)',

                    tension: 0.4,

                    fill: true
                },

                {
                    label: 'Pengeluaran',

                    data: [
    800000,
    1200000,
    1000000,
    1500000,
    1800000,
    1400000,
    1900000,
    2100000,
    1600000,
    2200000,
    2500000,
    300000
],

                    borderColor: '#dc2626',

                    backgroundColor: 'rgba(220,38,38,0.1)',

                    tension: 0.4,

                    fill: true
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false

        }

    });

});

</script>
</x-app-layout>