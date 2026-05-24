<style>

.chart-wrapper{
    position:relative;
    width:100%;
    height:420px;
    background:white;
    border-radius:24px;
    padding:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

#financeChart{
    width:100% !important;
    height:100% !important;
}

/* MOBILE */

@media(max-width:768px){

    .chart-wrapper{
        height:300px;
        padding:15px;
        border-radius:18px;
    }

}

</style>

<style>


.action-wrapper{
    display:flex;
    flex-direction:column;
    gap:10px;
    width:100%;
}

.transaction-icon{
    width:55px;
    height:55px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
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

<x-app-layout>
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

<style>

*{
    box-sizing:border-box;
}

body{
    overflow-x:hidden;
}

.table-responsive::-webkit-scrollbar{
    height:8px;
}

.table-responsive::-webkit-scrollbar-thumb{
    background:#10b981;
    border-radius:999px;
}

@keyframes popup{
    from{
        opacity:0;
        transform:scale(.9) translateY(20px);
    }
    to{
        opacity:1;
        transform:scale(1) translateY(0);
    }
}

@media(max-width:768px){

    .page-wrapper{
        padding:18px !important;
    }

    .header-flex{
        flex-direction:column !important;
        align-items:flex-start !important;
    }

    .action-buttons{
        width:100%;
        flex-direction:column;
    }

    .action-buttons button{
        width:100%;
        justify-content:center;
    }

    .filter-form{
        flex-direction:column;
    }

    .filter-form input,
    .filter-form select,
    .filter-form button{
        width:100% !important;
        min-width:100% !important;
    }

    .stats-grid{
        grid-template-columns:1fr !important;
    }

    .modal-content{
        padding:22px !important;
        border-radius:24px !important;
    }

    .modal-content h2{
        font-size:24px !important;
    }

}

</style>

<div class="page-wrapper"
style="
    background:#ecfdf5;
    min-height:100vh;
    padding:30px;
">

    {{-- ALERT --}}

    @if(session('success'))

    <div style="
        background:linear-gradient(135deg,#10b981,#059669);
        color:white;
        padding:18px 22px;
        border-radius:18px;
        margin-bottom:25px;
        display:flex;
        align-items:center;
        gap:14px;
        box-shadow:0 10px 25px rgba(34,197,94,.25);
    ">

        <div style="
            width:45px;
            height:45px;
            border-radius:14px;
            background:rgba(255,255,255,.2);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
            flex-shrink:0;
        ">
            ✓
        </div>

        <div>

            <div style="
                font-weight:bold;
                font-size:16px;
                margin-bottom:3px;
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

    @endif

    {{-- HEADER --}}

<div class="header-flex"
    style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        gap:20px;
    ">

        <div>

            <h1 style="
                font-size:clamp(28px,5vw,38px);
                font-weight:bold;
                color:#064e3b;
                margin-bottom:8px;
                line-height:1.2;
            ">
                Semua Transaksi
            </h1>

            <p style="
                color:#047857;
                font-size:15px;
            ">
                Kelola seluruh transaksi keuangan Anda dengan mudah
            </p>

        </div>

        {{-- BUTTONS --}}

        <div class="action-buttons"
        style="
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            align-items:center;
        ">

            {{-- TAMBAH PEMASUKAN --}}

            <button
                type="button"
                onclick="openTransactionModal('pemasukan')"
                style="
                    border:none;
                    cursor:pointer;
                    background:linear-gradient(135deg,#10b981,#059669);
                    color:white;
                    padding:16px 24px;
                    border-radius:18px;
                    font-weight:bold;
                    font-size:15px;
                    display:flex;
                    align-items:center;
                    gap:10px;
                    box-shadow:0 10px 25px rgba(16,185,129,.25);
                    transition:.25s;
                "
            >

                <div style="
                    width:36px;
                    height:36px;
                    border-radius:12px;
                    background:rgba(255,255,255,.18);
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:18px;
                ">
                    ↗
                </div>

                + Tambah Pemasukan

            </button>

            {{-- TAMBAH PENGELUARAN --}}

            <button
                type="button"
                onclick="openTransactionModal('pengeluaran')"
                style="
                    border:none;
                    cursor:pointer;
                    background:linear-gradient(135deg,#ef4444,#dc2626);
                    color:white;
                    padding:16px 24px;
                    border-radius:18px;
                    font-weight:bold;
                    font-size:15px;
                    display:flex;
                    align-items:center;
                    gap:10px;
                    box-shadow:0 10px 25px rgba(239,68,68,.25);
                    transition:.25s;
                "
            >

                <div style="
                    width:36px;
                    height:36px;
                    border-radius:12px;
                    background:rgba(255,255,255,.18);
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:18px;
                ">
                    ↘
                </div>

                + Tambah Pengeluaran

            </button>

        </div>

    </div>

    {{-- CARD STATISTIK --}}

    <div class="stats-grid"
    style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
        gap:20px;
        margin-bottom:30px;
    ">

        {{-- PEMASUKAN --}}

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

        {{-- PENGELUARAN --}}

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

        {{-- LABA --}}

        <div style="
            background:white;
            padding:25px;
            border-radius:25px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
            position:relative;
            overflow:hidden;
        ">

            <div style="
                position:absolute;
                top:-30px;
                right:-30px;
                width:120px;
                height:120px;
                background:rgba(16,185,129,.08);
                border-radius:50%;
            "></div>

            <p style="
                display:inline-flex;
                align-items:center;
                gap:8px;
                background:#dcfce7;
                color:#16a34a;
                padding:8px 14px;
                border-radius:999px;
                font-size:13px;
                font-weight:bold;
                margin-bottom:14px;
            ">
                ▲ Profit Positif
            </p>

            <h2 style="
                color:#059669;
                font-size:35px;
                font-weight:bold;
            ">
                Rp {{ number_format($totalIncome - $totalExpense) }}
            </h2>

        </div>

    </div>


    
   {{-- FILTER GLOBAL --}}

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

    {{-- SEARCH --}}

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari transaksi..."
        style="
            padding:14px;
            border-radius:14px;
            border:1px solid #bbf7d0;
            min-width:250px;
            outline:none;
        "
    >

    {{-- TYPE --}}

    <select
        name="type"
        style="
            padding:14px;
            border-radius:14px;
            border:1px solid #bbf7d0;
            outline:none;
        "
    >

        <option value="">Semua Jenis</option>

        <option
            value="pemasukan"
            {{ request('type') == 'pemasukan' ? 'selected' : '' }}
        >
            Pemasukan
        </option>

        <option
            value="pengeluaran"
            {{ request('type') == 'pengeluaran' ? 'selected' : '' }}
        >
            Pengeluaran
        </option>

    </select>

    {{-- BULAN --}}

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

            <option
                value="{{ $i }}"
                {{ request('month') == $i ? 'selected' : '' }}
            >
                {{ date('F', mktime(0,0,0,$i,1)) }}
            </option>

        @endfor

    </select>

    {{-- TAHUN --}}

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

            <option
                value="{{ $i }}"
                {{ request('year', date('Y')) == $i ? 'selected' : '' }}
            >
                Tahun {{ $i }}
            </option>

        @endfor

    </select>

    {{-- BUTTON --}}

    <button
        type="submit"
        style="
            background:#10b981;
            color:white;
            border:none;
            padding:14px 24px;
            border-radius:14px;
            font-weight:bold;
            cursor:pointer;
        "
    >
        Filter
    </button>

</form>

    <div class="chart-wrapper">

    <canvas id="financeChart"></canvas>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const chartLabels = JSON.parse(
        '@json($chartLabels)'
    );

    const chartIncome = JSON.parse(
        '@json($chartIncome)'
    );

    const chartExpense = JSON.parse(
        '@json($chartExpense)'
    );

    const ctx =
        document.getElementById('financeChart');

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: chartLabels,

            datasets: [

                {
                    label: 'Pemasukan',

                    data: chartIncome,

                    borderColor: '#10b981',

                    backgroundColor:
                        'rgba(16,185,129,0.12)',

                    fill: true,

                    tension: 0.4
                },

                {
                    label: 'Pengeluaran',

                    data: chartExpense,

                    borderColor: '#dc2626',

                    backgroundColor:
                        'rgba(220,38,38,0.10)',

                    fill: true,

                    tension: 0.4
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


    


    {{-- TABLE --}}

    <div style="
        background:white;
        border-radius:28px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(16,185,129,.08);
    ">

        <div class="table-responsive">

            <table class="transaction-table">

                <thead style="
                    background:#d1fae5;
                ">

                    <tr>

                        <th style="padding:14px;text-align:left;color:#065f46;">
                            Tanggal
                        </th>

                        <th style="padding:14px;text-align:left;color:#065f46;">
                            Detail
                        </th>

                        <th style="padding:14px;text-align:left;color:#065f46;">
                            Jenis
                        </th>

                        <th style="padding:14px;text-align:left;color:#065f46;">
                            Nominal
                        </th>

                        <th style="padding:14px;text-align:center;color:#065f46;">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transactions as $transaction)

                    <tr style="
                        border-bottom:1px solid #ecfdf5;
                    ">

                        {{-- TANGGAL --}}

                        <td style="padding:22px;">

                            <div style="
                                font-weight:bold;
                                color:#0f172a;
                            ">
                                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d') }}
                            </div>

                            <small style="
                                color:#64748b;
                            ">
                                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('M Y') }}
                            </small>

                        </td>

                        {{-- DETAIL --}}

                        <td style="padding:22px;">

                            <div class="transaction-detail">

                                <div
    class="transaction-icon mobile-icon {{ $transaction->type == 'pemasukan'
        ? 'transaction-icon income-icon'
        : 'transaction-icon expense-icon'
    }}"
>

    {{ $transaction->type == 'pemasukan' ? '↗' : '↘' }}

</div>

                                <div>

                                    <div style="
                                        font-weight:bold;
                                        color:#0f172a;
                                        margin-bottom:4px;
                                    ">
                                        {{ $transaction->category }}
                                    </div>

                                    <small style="
                                        color:#64748b;
                                    ">
                                        {{ $transaction->description }}
                                    </small>

                                </div>

                            </div>

                        </td>

                        {{-- TYPE --}}

                        <td style="padding:22px;">

                            @if($transaction->type == 'pemasukan')

                            <span style="
                                background:#dcfce7;
                                color:#16a34a;
                                padding:10px 16px;
                                border-radius:999px;
                                font-size:13px;
                                font-weight:bold;
                            ">
                                Pemasukan
                            </span>

                            @else

                            <span style="
                                background:#fee2e2;
                                color:#dc2626;
                                padding:10px 16px;
                                border-radius:999px;
                                font-size:13px;
                                font-weight:bold;
                            ">
                                Pengeluaran
                            </span>

                            @endif

                        </td>

                        {{-- NOMINAL --}}

                        <td style="
                            padding:22px;
                            font-weight:bold;
                            font-size:18px;
                        ">

                            @if($transaction->type == 'pemasukan')

                            <span style="color:#16a34a;">
                                + Rp {{ number_format($transaction->amount) }}
                            </span>

                            @else

                            <span style="color:#dc2626;">
                                - Rp {{ number_format($transaction->amount) }}
                            </span>

                            @endif

                        </td>

                        {{-- AKSI --}}

                        <td style="
                            padding:22px;
                            text-align:center;
                        ">

                            <div class="action-wrapper"

                            >

                                {{-- EDIT --}}

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
        border:none;
        background:linear-gradient(135deg,#10b981,#059669);
        color:white;
        width:100%;
        display:flex;
        justify-content:center;
        align-items:center;
        text-align:center;
        padding:13px 14px;
        border-radius:14px;
        font-size:14px;
        font-weight:bold;
        cursor:pointer;
        white-space:normal;
    "
>
    ✏️ Edit
</button>

                                {{-- DELETE --}}

                               <form
                               style="
        border:none;
        background:linear-gradient(135deg,#ef4444,#dc2626);
        color:white;
        width:100%;
        display:flex;
        justify-content:center;
        align-items:center;
        text-align:center;
        padding:13px 14px;
        border-radius:14px;
        font-size:14px;
        font-weight:bold;
        cursor:pointer;
        white-space:normal;
    "


    action="/transactions/{{ $transaction->id }}"
    method="POST"
    onsubmit="return showDeleteModal(event, this)"
>

    @csrf
    @method('DELETE')

    <button type="submit">
        🗑️ Hapus
    </button>

</form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="5"
                            style="
                                padding:60px 30px;
                                text-align:center;
                                color:#64748b;
                            "
                        >

                            Belum ada transaksi

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}

    <div style="
        margin-top:25px;
    ">
        {{ $transactions->withQueryString()->links() }}
    </div>

</div>

{{-- MODAL TAMBAH --}}

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
        z-index:99999;
        padding:20px;
    "
>

    <div class="modal-content"
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
    ">

        <button
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

        <h2 id="modalTitle"
        style="
            font-size:30px;
            font-weight:bold;
            margin-bottom:10px;
            color:#0f172a;
        ">
            Tambah Transaksi
        </h2>

        <p style="
            color:#64748b;
            margin-bottom:30px;
        ">
            Tambahkan transaksi baru
        </p>

        <form action="/transactions" method="POST">

            @csrf

            <input
                type="hidden"
                name="type"
                id="transactionType"
            >

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
                    "
                >

            </div>

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
                    "
                >

            </div>

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
                    "
                ></textarea>

            </div>

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
                    "
                >

            </div>

            <button
                type="submit"
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
                "
            >
                ➕ Simpan Transaksi
            </button>

        </form>

    </div>

</div>

{{-- MODAL EDIT --}}

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
        z-index:99999;
        padding:20px;
    "
>

    <div class="modal-content"
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
    ">

        <button
            onclick="closeEditModal()"
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

        <h2 style="
            font-size:30px;
            font-weight:bold;
            margin-bottom:10px;
            color:#0f172a;
        ">
            Edit Transaksi
        </h2>

        <p style="
            color:#64748b;
            margin-bottom:30px;
        ">
            Perbarui data transaksi
        </p>

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
                    id="editCategory"
                    required
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                    "
                >

            </div>

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
                    id="editAmount"
                    required
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                    "
                >

            </div>

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
                    id="editDescription"
                    rows="4"
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                    "
                ></textarea>

            </div>

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
                    id="editDate"
                    required
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:14px;
                        border:1px solid #ddd;
                    "
                >

            </div>

            <button
                type="submit"
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
                "
            >
                💾 Update Transaksi
            </button>

        </form>

    </div>

</div>

<script>

function openTransactionModal(type){

    const modal =
        document.getElementById('transactionModal');

    const form =
        modal.querySelector('form');

    form.reset();

    document.getElementById('transactionType')
        .value = type;

    document.getElementById('modalTitle')
        .innerText =
            type === 'pemasukan'
            ? 'Tambah Pemasukan'
            : 'Tambah Pengeluaran';

    modal.style.display = 'flex';

}

function closeTransactionModal(){

    document.getElementById('transactionModal')
        .style.display = 'none';

}

function openEditModal(
    id,
    type,
    category,
    description,
    amount,
    date
){

    document.getElementById('editModal')
        .style.display = 'flex';

    document.getElementById('editForm')
        .action = '/transactions/' + id;

    document.getElementById('editType')
        .value = type;

    document.getElementById('editCategory')
        .value = category;

    document.getElementById('editDescription')
        .value = description;

    document.getElementById('editAmount')
        .value = amount;

    document.getElementById('editDate')
        .value = date;

}

function closeEditModal(){

    document.getElementById('editModal')
        .style.display = 'none';

}

window.onclick = function(event){

    const transactionModal =
        document.getElementById('transactionModal');

    const editModal =
        document.getElementById('editModal');

    if(event.target === transactionModal){

        closeTransactionModal();

    }

    if(event.target === editModal){

        closeEditModal();

    }

}

</script>

<!-- RESPONSIVE TABLE FINAL -->
<style>

.table-responsive{
    width:100%;
    overflow:hidden;
    border-radius:24px;
}

.transaction-table{
    width:100%;
    border-collapse:collapse;
}

.transaction-table th{
    padding:18px;
    text-align:left;
    background:#d1fae5;
    color:#065f46;
    font-size:14px;
    white-space:nowrap;
}

.transaction-table td{
    padding:18px;
    vertical-align:middle;
}

/* =========================
   MOBILE RESPONSIVE
========================= */

@media(max-width:768px){

    .page-wrapper{
        padding:14px !important;
    }

    .table-responsive{
        overflow:hidden;
    }

    .transaction-table{
        width:100%;
    }

    .transaction-table thead{
        display:none;
    }

    .transaction-table,
    .transaction-table tbody,
    .transaction-table tr,
    .transaction-table td{
        display:block;
        width:100%;
    }

    .transaction-table tr{
        background:white;
        margin-bottom:18px;
        padding:16px;
        border-radius:22px;
        border:1px solid #dcfce7;
        box-shadow:0 6px 18px rgba(0,0,0,.05);
        overflow:hidden;
    }

    .transaction-table td{
        border:none;
        padding:10px 0;
        text-align:left !important;
        white-space:normal !important;
        word-break:break-word;
        overflow-wrap:break-word;
    }

    .transaction-table td::before{
        display:block;
        margin-bottom:6px;
        font-size:13px;
        font-weight:bold;
        color:#065f46;
    }

    .transaction-table td:nth-child(1)::before{
        content:"Tanggal";
    }

    .transaction-table td:nth-child(2)::before{
        content:"Detail";
    }

    .transaction-table td:nth-child(3)::before{
        content:"Jenis";
    }

    .transaction-table td:nth-child(4)::before{
        content:"Nominal";
    }

    .transaction-table td:nth-child(5)::before{
        content:"Aksi";
    }

    /* DETAIL FLEX */
    .transaction-detail{
        display:flex;
        align-items:flex-start;
        gap:12px;
        flex-wrap:nowrap;
        width:100%;
    }

    /* ICON */
    .mobile-icon{
        width:40px !important;
        height:40px !important;
        min-width:40px !important;
        font-size:16px !important;
        border-radius:12px !important;
        flex-shrink:0;
    }

    /* BUTTON AREA */
    .action-wrapper{
        display:flex;
        flex-direction:column;
        gap:10px;
        width:100%;
    }

    .action-wrapper form{
        width:100%;
        margin:0;
    }

    .action-wrapper button{
        width:100%;
        display:flex;
        justify-content:center;
        align-items:center;
        text-align:center;
        padding:13px 14px !important;
        font-size:14px !important;
        border-radius:14px !important;
        white-space:normal !important;
    }

    /* BADGE */
    .transaction-table span{
        max-width:100%;
        display:inline-flex;
        flex-wrap:wrap;
    }

}

/* EXTRA SMALL DEVICE */

@media(max-width:480px){

    .transaction-table tr{
        padding:14px;
        border-radius:18px;
    }

    .transaction-table td{
        font-size:13px;
    }

    .action-wrapper button{
        font-size:13px !important;
        padding:12px !important;
    }

}

</style>





</x-app-layout>
