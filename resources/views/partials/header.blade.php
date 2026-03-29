<header class="sticky top-0 z-40 text-white border-b border-white/10" x-data="{ menuOpen: false, tentangOpen: false }" style="background: rgba(21, 128, 61, 0.88); backdrop-filter: blur(20px) saturate(1.8); -webkit-backdrop-filter: blur(20px) saturate(1.8); box-shadow: 0 4px 30px rgba(0,0,0,0.2), inset 0 1px 0 rgba(255,255,255,0.1);">
    <nav class="container mx-auto px-6 py-4 flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="flex items-center justify-between w-full md:w-auto">
            <a href="{{ route('beranda') }}" class="flex items-center gap-4 flex-1 md:flex-none">
                @if (!empty($situs['logo']))
                    <img src="{{ asset('storage/' . $situs['logo']) }}" alt="{{ $situs['nama_situs'] ?? 'PPMA Papua' }}" class="h-14 md:h-20 w-14 md:w-20 object-cover rounded-full ring-2 ring-white/30 transition-all duration-300">
                @else
                    <img src="{{ asset('img/logo-ppma-papua-2026.png') }}" alt="PPMA Papua" class="h-14 md:h-20 w-14 md:w-20 object-cover rounded-full ring-2 ring-white/30 transition-all duration-300">
                @endif
                <div class="flex flex-col justify-center">
                    <span class="font-black tracking-tighter text-xl md:text-2xl leading-none border-l-2 border-white pl-4">
                        {{ $situs['nama_situs'] ?? 'PPMA Papua' }}
                    </span>
                    <p class="pl-4 mt-1 text-[11px] md:text-xs text-white/70 font-normal tracking-normal leading-snug">
                        Perkumpulan Terbatas untuk Pengkajian<br>
                        dan Pemberdayaan Masyarakat Adat
                    </p>
                </div>
            </a>
            <button @click="menuOpen = !menuOpen"
                class="md:hidden text-2xl p-2 focus:outline-none transition-transform duration-300 hover:text-white/75"
                    :class="menuOpen ? 'rotate-90' : ''">
                <i class="fa-solid" :class="menuOpen ? 'fa-xmark' : 'fa-bars-staggered'"></i>
            </button>
        </div>

        <ul :class="menuOpen ? 'flex' : 'hidden'"
            class="flex-col md:flex md:flex-row md:items-stretch gap-y-0.5 md:gap-x-0 mt-6 md:mt-0 font-medium tracking-wide text-base border-t md:border-t-0 border-white/20 pt-4 md:pt-0">

            <li>
                <a href="{{ route('beranda') }}"
                   class="block px-3 py-2 transition hover:bg-white/15 {{ request()->routeIs('beranda') ? 'bg-white/25 font-semibold' : '' }}"
                   @click="menuOpen = false">Beranda</a>
            </li>

            {{-- Tentang Dropdown --}}
            <li class="relative" x-data="{ open: false }" @mouseenter="open=true" @mouseleave="open=false">
                <button @click="open=!open"
                    class="w-full md:w-auto flex items-center gap-1.5 px-3 py-2 transition hover:bg-white/15 {{ request()->routeIs('sejarah') || request()->routeIs('profil') || request()->routeIs('kepengurusan') || request()->routeIs('mitra') || request()->routeIs('pilar-kerja') ? 'bg-white/25 font-semibold' : '' }}">
                    Tentang <i class="fa-solid fa-chevron-down text-xs mt-0.5"></i>
                </button>
                <div x-show="open" x-transition style="display:none;"
                     class="md:absolute top-full left-0 mt-0 w-52 bg-white shadow-xl border border-gray-100 py-1 z-50">
                    <a href="{{ route('sejarah') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-secondary hover:text-white transition {{ request()->routeIs('sejarah') ? 'bg-secondary text-white' : '' }}">Sejarah Singkat</a>
                    <a href="{{ route('profil') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-secondary hover:text-white transition {{ request()->routeIs('profil') ? 'bg-secondary text-white' : '' }}">Profil Lembaga</a>
                    <a href="{{ route('kepengurusan') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-secondary hover:text-white transition {{ request()->routeIs('kepengurusan') ? 'bg-secondary text-white' : '' }}">Kepengurusan</a>
                    <a href="{{ route('pilar-kerja') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-secondary hover:text-white transition {{ request()->routeIs('pilar-kerja') ? 'bg-secondary text-white' : '' }}">Pilar Kerja</a>
                    <div class="border-t border-gray-100 my-1"></div>
                    <a href="{{ route('mitra') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-secondary hover:text-white transition {{ request()->routeIs('mitra') ? 'bg-secondary text-white' : '' }}">Jaringan Mitra</a>
                </div>
            </li>

            <li>
                <a href="{{ route('program') }}"
                   class="block px-3 py-2 transition hover:bg-white/15 {{ request()->routeIs('program') ? 'bg-white/25 font-semibold' : '' }}"
                   @click="menuOpen = false">Program</a>
            </li>
            <li>
                <a href="{{ route('berita') }}"
                   class="block px-3 py-2 transition hover:bg-white/15 {{ request()->routeIs('berita*') ? 'bg-white/25 font-semibold' : '' }}"
                   @click="menuOpen = false">Blog</a>
            </li>
            <li>
                <a href="{{ route('galeri') }}"
                   class="block px-3 py-2 transition hover:bg-white/15 {{ request()->routeIs('galeri*') ? 'bg-white/25 font-semibold' : '' }}"
                   @click="menuOpen = false">Galeri</a>
            </li>
            <li>
                <a href="{{ route('donasi') }}"
                   class="block px-3 py-2 transition hover:bg-white/15 {{ request()->routeIs('donasi') ? 'bg-white/25 font-semibold' : '' }}"
                   @click="menuOpen = false">Donasi</a>
            </li>
            <li class="md:ml-3">
                <a href="{{ route('kontak') }}"
                   class="block px-4 py-2 bg-white text-secondary font-semibold hover:bg-white/90 transition text-center {{ request()->routeIs('kontak') ? 'bg-white/90' : '' }}"
                   @click="menuOpen = false">Hubungi</a>
            </li>
        </ul>
    </nav>
</header>
