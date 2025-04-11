@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #0f172a, #0fd2c2);
    }

    .background-particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .particle {
        position: absolute;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float 25s infinite alternate ease-in-out;
    }

    .particle:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
    .particle:nth-child(2) { top: 70%; left: 80%; animation-delay: 4s; }
    .particle:nth-child(3) { top: 40%; left: 30%; animation-delay: 2s; }

    @keyframes float {
        0% { transform: translateY(0) translateX(0) scale(1); }
        100% { transform: translateY(-50px) translateX(50px) scale(1.2); }
    }
</style>

<div class="background-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="max-w-4xl mx-auto px-4 py-10 text-white relative z-10">
    @php
        $email = Auth::user()->email;
        $name = ucfirst(explode('@', $email)[0]);
    @endphp

    <!-- Tombol Logout -->
<div class="flex justify-end mb-6">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="backdrop-blur bg-white/10 border border-white/20 text-white text-sm font-semibold py-2 px-5 rounded-full shadow hover:bg-white/20 transition">
            Logout
        </button>
    </form>
</div>

    <!-- Ucapan Selamat Datang -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Selamat datang, {{ $name }}! 🎓</h1>
        <p class="text-sm text-gray-300">Semoga harimu menyenangkan di ITSB One!</p>
    </div>

    <!-- Fitur Navigasi -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- E-Campus -->
        <a href="https://itsb.ecampuz.com/eakademikportal/index.php?pModule=zdKbnKU=&pSub=zdKbnKU=&pAct=18yZqg==" target="_blank" class="bg-[#002366] p-5 rounded-xl hover:bg-blue-900 transition">
            <h2 class="text-xl font-semibold">🌐 E-Campus</h2>
            <p class="text-sm text-gray-200 mt-2">Akses informasi akademik, KRS, nilai, dll.</p>
        </a>

        <!-- Website ITSB -->
        <a href="https://itsb.ac.id" target="_blank" class="bg-[#002366] p-5 rounded-xl hover:bg-blue-900 transition">
            <h2 class="text-xl font-semibold">🏛️ Website ITSB</h2>
            <p class="text-sm text-gray-200 mt-2">Berita & info resmi kampus.</p>
        </a>

        <!-- Perpustakaan -->
        <a href="https://perpustakaan.itsb.ac.id" target="_blank" class="bg-[#002366] p-5 rounded-xl hover:bg-blue-900 transition">
            <h2 class="text-xl font-semibold">📚 Perpustakaan</h2>
            <p class="text-sm text-gray-200 mt-2">Cari buku, e-journal, repository & lainnya.</p>
        </a>

        <!-- Tambahan Opsional -->
        <a href="#" class="bg-[#002366] p-5 rounded-xl hover:bg-blue-900 transition">
            <h2 class="text-xl font-semibold">🗓️ Jadwal Kuliah</h2>
            <p class="text-sm text-gray-200 mt-2">Lihat jadwal kelas mingguanmu.</p>
        </a>

        <a href="#" class="bg-[#002366] p-5 rounded-xl hover:bg-blue-900 transition">
            <h2 class="text-xl font-semibold">💬 Forum Diskusi</h2>
            <p class="text-sm text-gray-200 mt-2">Diskusi bareng teman sejurusan.</p>
        </a>
    </div>
</div>
@endsection
