{{-- Floating: Back-to-top + WhatsApp --}}
<div class="fixed bottom-6 right-5 z-50 flex flex-col items-center gap-3">
    <button id="btnTop"
            onclick="window.scrollTo({top:0,behavior:'smooth'})"
            class="w-11 h-11 bg-primary hover:bg-gray-800 text-white flex items-center justify-center shadow-lg transition-all duration-300 opacity-0 translate-y-4 pointer-events-none">
        <i class="fa-solid fa-chevron-up text-lg"></i>
    </button>
    @if (!empty($situs['sosmed_whatsapp']))
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $situs['sosmed_whatsapp']) }}"
       target="_blank"
       class="w-11 h-11 bg-[#25D366] hover:bg-[#1ebe5d] text-white flex items-center justify-center shadow-lg transition-colors">
        <i class="fa-brands fa-whatsapp text-xl"></i>
    </a>
    @endif
</div>

<footer>
    {{-- Top Footer (Hijau Tua) --}}
    <div class="bg-secondary py-12">
        <div class="container mx-auto px-6">
            {{-- Nama & Keterangan (Center) --}}
            <div class="text-center mb-8">
                {{-- Logo --}}
                <div class="flex justify-center mb-4">
                    @if (!empty($situs['logo']))
                        <img src="{{ asset('storage/' . $situs['logo']) }}" alt="{{ $situs['nama_situs'] ?? 'PPMA Papua' }}" class="w-20 h-20 object-cover rounded-full ring-4 ring-white/20">
                    @else
                        <img src="{{ asset('img/logo-ppma-papua-2026.png') }}" alt="PPMA Papua" class="w-20 h-20 object-cover rounded-full ring-4 ring-white/20">
                    @endif
                </div>
                <p class="font-bold text-xl mb-2 uppercase tracking-tighter text-white">{{ $situs['nama_situs'] ?? 'PPMA PAPUA' }}</p>
                <p class="text-white/70 text-lg leading-relaxed max-w-2xl mx-auto">
                    {{ $situs['deskripsi_situs'] ?? 'Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua' }}<br>
                    <em>The Association for Papuan Indigenous Peoples Study &amp; Empowerment</em>
                </p>
            </div>

            {{-- Navigasi (Horizontal) --}}
            <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-lg text-white/70 mb-8 border-t border-white/10 pt-6">
                <a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a>
                <a href="{{ route('profil') }}" class="hover:text-white transition">Profil Lembaga</a>
                <a href="{{ route('sejarah') }}" class="hover:text-white transition">Sejarah Singkat</a>
                <a href="{{ route('program') }}" class="hover:text-white transition">Program</a>
                <a href="{{ route('berita') }}" class="hover:text-white transition">Blog</a>
                <a href="{{ route('galeri') }}" class="hover:text-white transition">Galeri</a>
                <a href="{{ route('donasi') }}" class="hover:text-white transition">Donasi</a>
                @foreach ($halamanFooter->whereNotIn('slug', ['sejarah','profil','bidang-kerja','mitra']) as $hPage)
                    <a href="{{ route('halaman.show', $hPage->slug) }}" class="hover:text-white transition">{{ $hPage->judul }}</a>
                @endforeach
            </div>

            {{-- Kontak (Horizontal dalam Box) --}}
            <div class="flex flex-wrap justify-center gap-4">
                <div class="bg-white/10 px-5 py-3 flex items-center gap-2 text-white/80 text-lg rounded-lg">
                    <i class="fa-solid fa-location-dot text-white"></i>
                    <span>{{ $situs['alamat'] ?? 'Jl. Pramuka No. 18, Buper Waena, Jayapura' }}</span>
                </div>
                <div class="bg-white/10 px-5 py-3 flex items-center gap-2 text-white/80 text-lg rounded-lg">
                    <i class="fa-solid fa-phone text-white"></i>
                    <span>{{ $situs['telepon'] ?? '0967-5170510' }}</span>
                </div>
                @if (!empty($situs['email']))
                <div class="bg-white/10 px-5 py-3 flex items-center gap-2 text-white/80 text-lg rounded-lg">
                    <i class="fa-solid fa-envelope text-white"></i>
                    <a href="mailto:{{ $situs['email'] }}" class="hover:text-white transition">{{ $situs['email'] }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Bottom Footer (Dark) --}}
    <div class="bg-primary py-6">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-white/50 text-lg">&copy; {{ date('Y') }} {{ $situs['nama_situs'] ?? 'PPMA Papua' }}. Semua hak dilindungi.</p>
                <div class="flex items-center gap-4">
                    {{-- Sosmed --}}
                    <div class="flex items-center gap-2">
                        @if (!empty($situs['sosmed_facebook']))
                            <a href="{{ $situs['sosmed_facebook'] }}" target="_blank" class="w-10 h-10 bg-white/10 text-white flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if (!empty($situs['sosmed_instagram']))
                            <a href="{{ $situs['sosmed_instagram'] }}" target="_blank" class="w-10 h-10 bg-white/10 text-white flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if (!empty($situs['sosmed_youtube']))
                            <a href="{{ $situs['sosmed_youtube'] }}" target="_blank" class="w-10 h-10 bg-white/10 text-white flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm"><i class="fa-brands fa-youtube"></i></a>
                        @endif
                        @if (!empty($situs['sosmed_twitter']))
                            <a href="{{ $situs['sosmed_twitter'] }}" target="_blank" class="w-10 h-10 bg-white/10 text-white flex items-center justify-center hover:bg-secondary hover:text-white transition-all shadow-sm"><i class="fa-brands fa-x-twitter"></i></a>
                        @endif
                    </div>
                    @php
                        $faqPage = $halamanFooter->firstWhere('slug', 'faq');
                        $disclaimerPage = $halamanFooter->firstWhere('slug', 'disclaimer');
                    @endphp
                    <div class="flex items-center gap-3 text-lg text-white/50">
                        @if ($faqPage)
                            <a href="{{ route('halaman.show', $faqPage->slug) }}" class="hover:text-white transition">{{ $faqPage->judul }}</a>
                            <span>&middot;</span>
                        @endif
                        @if ($disclaimerPage)
                            <a href="{{ route('halaman.show', $disclaimerPage->slug) }}" class="hover:text-white transition">{{ $disclaimerPage->judul }}</a>
                            <span>&middot;</span>
                        @endif
                        <a href="{{ route('peta-situs') }}" class="hover:text-white transition">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
