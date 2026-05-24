<nav x-data="{ open: false }"
style="
    background:rgba(255,255,255,.9);
    backdrop-filter:blur(14px);
    border-bottom:1px solid #dcfce7;
    position:sticky;
    top:0;
    z-index:999;
">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div style="
            height:78px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        ">

            <!-- LEFT -->

            <div style="
                display:flex;
                align-items:center;
                gap:35px;
            ">

                <!-- LOGO -->

                <a href="{{ route('dashboard') }}"
                style="
                    display:flex;
                    align-items:center;
                    gap:14px;
                    text-decoration:none;
                ">

                    <div style="
                        width:152px;
                        height:52px;
                        border-radius:18px;
                        background:linear-gradient(135deg,#10b981,#059669);
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        box-shadow:0 10px 25px rgba(16,185,129,.25);
                    ">

                        <img
                            src="{{ asset('logo-bukusaha.png') }}"
                            alt="BukUsaha"
                            style="
                                width:100%;
                                object-fit:contain;
                            "
                        >

                    </div>

                    

                </a>

                <!-- MENU -->

                <div class="desktop-menu"
                style="
                    display:flex;
                    align-items:center;
                    gap:10px;
                ">

                    <a href="{{ route('dashboard') }}"
                    style="
                        padding:12px 18px;
                        border-radius:14px;
                        background:#dcfce7;
                        color:#065f46;
                        text-decoration:none;
                        font-weight:700;
                        font-size:14px;
                    ">
                        Dashboard
                    </a>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="desktop-user"
            style="
                display:flex;
                align-items:center;
                gap:16px;
            ">

                <!-- USER -->

                <div style="
                    display:flex;
                    align-items:center;
                    gap:14px;
                    background:white;
                    border:1px solid #dcfce7;
                    padding:10px 16px;
                    border-radius:18px;
                    box-shadow:0 5px 15px rgba(16,185,129,.08);
                ">

                    <!-- AVATAR -->

                    <div style="
                        width:48px;
                        height:48px;
                        border-radius:16px;
                        background:linear-gradient(135deg,#10b981,#059669);
                        color:white;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:18px;
                        font-weight:800;
                        flex-shrink:0;
                    ">

                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                    </div>

                    <!-- TEXT -->

                    <div style="
                        display:flex;
                        flex-direction:column;
                        line-height:1.2;
                    ">

                        <span style="
                            font-size:12px;
                            color:#94a3b8;
                            font-weight:600;
                        ">
                            Welcome CEO 👋
                        </span>

                        <span style="
                            font-size:15px;
                            font-weight:800;
                            color:#064e3b;
                        ">
                            {{ Auth::user()->name }}
                        </span>

                    </div>

                </div>

                <!-- DROPDOWN -->

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button style="
                            width:48px;
                            height:48px;
                            border:none;
                            border-radius:16px;
                            background:#ecfdf5;
                            cursor:pointer;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-size:20px;
                        ">
                            ⚙️
                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();"
                            >
                                Logout
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- MOBILE BUTTON -->

            <div class="mobile-button">

                <button
                    @click="open = ! open"
                    style="
                        width:48px;
                        height:48px;
                        border:none;
                        border-radius:16px;
                        background:#ecfdf5;
                        color:#065f46;
                        font-size:24px;
                        cursor:pointer;
                    "
                >
                    ☰
                </button>

            </div>

        </div>

    </div>

    <!-- MOBILE MENU -->

    <div
        x-show="open"
        x-transition
        style="
            background:white;
            border-top:1px solid #dcfce7;
            padding:20px;
        "
    >

        <div style="
            display:flex;
            flex-direction:column;
            gap:14px;
        ">

            <div style="
                background:#ecfdf5;
                border-radius:20px;
                padding:18px;
            ">

                <div style="
                    font-size:13px;
                    color:#10b981;
                    font-weight:700;
                    margin-bottom:5px;
                ">
                    Welcome CEO 👋
                </div>

                <div style="
                    font-size:18px;
                    font-weight:800;
                    color:#064e3b;
                ">
                    {{ Auth::user()->name }}
                </div>

                <div style="
                    font-size:13px;
                    color:#64748b;
                    margin-top:4px;
                ">
                    {{ Auth::user()->email }}
                </div>

            </div>

            <a href="{{ route('dashboard') }}"
            style="
                padding:15px;
                border-radius:16px;
                background:#dcfce7;
                color:#065f46;
                text-decoration:none;
                font-weight:700;
            ">
                Dashboard
            </a>

            <a href="{{ route('profile.edit') }}"
            style="
                padding:15px;
                border-radius:16px;
                background:#f8fafc;
                color:#0f172a;
                text-decoration:none;
                font-weight:700;
            ">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    style="
                        width:100%;
                        border:none;
                        padding:15px;
                        border-radius:16px;
                        background:linear-gradient(135deg,#ef4444,#dc2626);
                        color:white;
                        font-weight:700;
                        cursor:pointer;
                    "
                >
                    Logout
                </button>

            </form>

        </div>

    </div>

</nav>

<style>

/* MOBILE */

.mobile-button{
    display:none;
}

@media(max-width:768px){

    .desktop-menu{
        display:none !important;
    }

    .desktop-user{
        display:none !important;
    }

    .mobile-button{
        display:block;
    }

}

</style>