<x-app-layout>

<div style="
    min-height:100vh;
    background:#f5f3ff;
    padding:30px;
">

    <!-- HEADER -->

    <div style="
        margin-bottom:30px;
    ">

        <h1 style="
            font-size:35px;
            font-weight:bold;
            color:#312e81;
            margin-bottom:8px;
        ">
            Tambah Transaksi
        </h1>

        <p style="
            color:#6366f1;
        ">
            Tambahkan pemasukan atau pengeluaran baru
        </p>

    </div>

    <!-- CARD FORM -->

    <div style="
        background:white;
        border-radius:30px;
        padding:35px;
        max-width:700px;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
    ">

        <form action="/transactions" method="POST">

            @csrf

            <!-- TYPE -->

            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                    color:#1e293b;
                ">
                    Jenis Transaksi
                </label>

                <select
                    name="type"
                    required
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:15px;
                        border:1px solid #ddd;
                        font-size:15px;
                    "
                >

                    <option value="">
                        Pilih Jenis
                    </option>

                    <option value="pemasukan">
                        Pemasukan
                    </option>

                    <option value="pengeluaran">
                        Pengeluaran
                    </option>

                </select>

            </div>

            <!-- CATEGORY -->

            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                    color:#1e293b;
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
                        border-radius:15px;
                        border:1px solid #ddd;
                        font-size:15px;
                    "
                >

            </div>

            <!-- AMOUNT -->

            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                    color:#1e293b;
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
                        border-radius:15px;
                        border:1px solid #ddd;
                        font-size:15px;
                    "
                >

            </div>

            <!-- DESCRIPTION -->

            <div style="margin-bottom:25px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                    color:#1e293b;
                ">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="5"
                    placeholder="Masukkan deskripsi transaksi"
                    style="
                        width:100%;
                        padding:15px;
                        border-radius:15px;
                        border:1px solid #ddd;
                        font-size:15px;
                    "
                ></textarea>

            </div>

            <!-- DATE -->

            <div style="margin-bottom:35px;">

                <label style="
                    display:block;
                    margin-bottom:10px;
                    font-weight:bold;
                    color:#1e293b;
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
                        border-radius:15px;
                        border:1px solid #ddd;
                        font-size:15px;
                    "
                >

            </div>

            <!-- BUTTON -->

            <div style="
                display:flex;
                gap:15px;
            ">

                <button
                    type="submit"
                    style="
                        background:#2563eb;
                        color:white;
                        border:none;
                        padding:15px 25px;
                        border-radius:15px;
                        font-size:15px;
                        font-weight:bold;
                        cursor:pointer;
                    "
                >
                    ➕ Simpan Transaksi
                </button>

                <a href="/dashboard"
                   style="
                        background:#e2e8f0;
                        color:#1e293b;
                        padding:15px 25px;
                        border-radius:15px;
                        text-decoration:none;
                        font-weight:bold;
                   ">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>