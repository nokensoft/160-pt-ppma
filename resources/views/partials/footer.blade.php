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

{{-- CTA Bermitra --}}
<section class="bg-primary text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
    <div class="container mx-auto px-6 text-center relative z-10 fade-in">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Tertarik Bermitra dengan PPMA Papua?</h2>
        <p class="text-white/70 max-w-xl mx-auto mb-8">Kami terbuka untuk kolaborasi dengan lembaga, pemerintah, dan sektor swasta yang memiliki komitmen terhadap pemberdayaan masyarakat adat Papua.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('kontak') }}" class="bg-secondary text-white px-8 py-4 font-bold hover:bg-secondary/90 transition-all shadow-lg inline-flex items-center gap-2">
                <i class="fa-solid fa-envelope"></i> Hubungi Kami
            </a>
            <a href="{{ route('donasi') }}" class="border border-white/30 text-white px-8 py-4 font-bold hover:bg-white/10 transition inline-flex items-center gap-2">
                <i class="fa-solid fa-heart"></i> Donasi Sekarang
            </a>
        </div>
    </div>
</section>

<footer>
    {{-- Top Footer (Liquid Glass) --}}
    <div class="relative py-12 overflow-hidden" style="background: rgba(21, 128, 61, 0.92); backdrop-filter: blur(16px) saturate(1.6); -webkit-backdrop-filter: blur(16px) saturate(1.6);">
        {{-- Grid Background --}}
        <div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="container mx-auto px-6 relative z-10">
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
                    @php
                        try { $hpUrl = route($hPage->slug); } catch (\Exception $e) { $hpUrl = route('halaman.show', $hPage->slug); }
                    @endphp
                    <a href="{{ $hpUrl }}" class="hover:text-white transition">{{ $hPage->judul }}</a>
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
                    <span>{{ $situs['telepon'] ?? '+62 821-9750-1692' }}</span>
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

    {{-- Bottom Footer (Liquid Glass Dark) --}}
    <div class="py-6" style="background: rgba(15, 90, 43, 0.95); backdrop-filter: blur(16px) saturate(1.5); -webkit-backdrop-filter: blur(16px) saturate(1.5); box-shadow: inset 0 1px 0 rgba(255,255,255,0.05);">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-white/50 text-lg">&copy; {{ date('Y') }} {{ $situs['nama_situs'] ?? 'PPMA Papua' }}. Semua hak dilindungi.</p>
                <div class="flex items-center gap-4">
                    {{-- Media Sosial: Instagram, Facebook, YouTube --}}
                    <div class="flex items-center gap-2">
                        @if (!empty($situs['sosmed_instagram']))
                            <a href="{{ $situs['sosmed_instagram'] }}" target="_blank" rel="noopener noreferrer"
                               class="w-9 h-9 rounded-full bg-white/10 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 text-white flex items-center justify-center transition-all">
                                <i class="fa-brands fa-instagram text-base"></i>
                            </a>
                        @else
                            <span class="w-9 h-9 rounded-full bg-white/10 text-white/30 flex items-center justify-center cursor-default">
                                <i class="fa-brands fa-instagram text-base"></i>
                            </span>
                        @endif
                        @if (!empty($situs['sosmed_facebook']))
                            <a href="{{ $situs['sosmed_facebook'] }}" target="_blank" rel="noopener noreferrer"
                               class="w-9 h-9 rounded-full bg-white/10 hover:bg-blue-600 text-white flex items-center justify-center transition-all">
                                <i class="fa-brands fa-facebook-f text-base"></i>
                            </a>
                        @else
                            <span class="w-9 h-9 rounded-full bg-white/10 text-white/30 flex items-center justify-center cursor-default">
                                <i class="fa-brands fa-facebook-f text-base"></i>
                            </span>
                        @endif
                        @if (!empty($situs['sosmed_youtube']))
                            <a href="{{ $situs['sosmed_youtube'] }}" target="_blank" rel="noopener noreferrer"
                               class="w-9 h-9 rounded-full bg-white/10 hover:bg-red-600 text-white flex items-center justify-center transition-all">
                                <i class="fa-brands fa-youtube text-base"></i>
                            </a>
                        @else
                            <span class="w-9 h-9 rounded-full bg-white/10 text-white/30 flex items-center justify-center cursor-default">
                                <i class="fa-brands fa-youtube text-base"></i>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
