{{-- Hero Slider (Alpine.js) --}}
<section class="relative overflow-hidden" x-data="heroSlider()" x-init="startAutoplay()">

    {{-- Slides --}}
    <div class="relative h-screen">
        @php
            $slides = [
                [
                    'label'    => 'Tentang Kami',
                    'judul'    => 'Mengenal PPMA Papua',
                    'desc'     => 'Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua — mendampingi masyarakat adat sejak 1988 menuju kedaulatan dan keberlanjutan di Tahun 2040.',
                    'bg'       => asset('img/illustration/1.png'),
                    'img'      => asset('img/illustration/1.png'),
                    'primary'  => ['url' => route('profil'), 'text' => 'Profil Lembaga', 'icon' => 'fa-solid fa-building'],
                    'outline'  => ['url' => '#tentang', 'text' => 'Tentang Kami', 'icon' => 'fa-solid fa-arrow-down'],
                ],
                [
                    'label'    => 'Program Strategis',
                    'judul'    => '5 Pilar Program Kerja',
                    'desc'     => 'Lima pilar strategis PPMA Papua — PMA, KPP, PEMA, PPA, dan PISD — dirancang untuk memperkuat posisi dan hak masyarakat adat di 7 wilayah adat Tanah Papua.',
                    'bg'       => asset('img/illustration/2.png'),
                    'img'      => asset('img/illustration/2.png'),
                    'primary'  => ['url' => route('bidang-kerja'), 'text' => 'Lihat Program', 'icon' => 'fa-solid fa-list-check'],
                    'outline'  => ['url' => '#pilar-program', 'text' => 'Pilar Program', 'icon' => 'fa-solid fa-arrow-down'],
                ],
                [
                    'label'    => 'Pusat Informasi',
                    'judul'    => 'Blog & Artikel Terbaru',
                    'desc'     => 'Ikuti kabar terbaru seputar kegiatan PPMA Papua, kajian advokasi, isu masyarakat adat, lingkungan, dan pemberdayaan ekonomi di Tanah Papua.',
                    'bg'       => asset('img/illustration/3.png'),
                    'img'      => asset('img/illustration/3.png'),
                    'primary'  => ['url' => route('berita'), 'text' => 'Baca Blog', 'icon' => 'fa-solid fa-newspaper'],
                    'outline'  => ['url' => '#artikel', 'text' => 'Artikel Terbaru', 'icon' => 'fa-solid fa-arrow-down'],
                ],
                [
                    'label'    => 'Dukung Kami',
                    'judul'    => 'Bersama Membangun Papua',
                    'desc'     => 'Setiap kontribusi Anda membantu mewujudkan kemandirian ekonomi, keadilan sosial, dan keberlanjutan hidup bagi masyarakat adat di Tanah Papua.',
                    'bg'       => asset('img/slider-bg/anak-anak-mendayung.png'),
                    'img'      => asset('img/logo-ppma-papua-2026.png'),
                    'primary'  => ['url' => route('donasi'), 'text' => 'Donasi Sekarang', 'icon' => 'fa-solid fa-heart'],
                    'outline'  => ['url' => '#kolaborasi', 'text' => 'Mari Berkolaborasi', 'icon' => 'fa-solid fa-arrow-down'],
                ],
            ];
        @endphp

        @foreach ($slides as $i => $slide)
            <div x-show="active === {{ $i }}"
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="opacity-0 translate-x-8"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0">
                {{-- Background Image with Ken Burns zoom --}}
                <img src="{{ $slide['bg'] }}" alt="" class="absolute inset-0 w-full h-full object-cover slider-zoom" onerror="this.onerror=null;this.src='https://placehold.co/1920x600'">
                {{-- Dark Overlay --}}
                <div class="absolute inset-0 bg-black/65"></div>
                {{-- Content (2 Kolom) --}}
                <div class="relative z-10 h-full flex items-center">
                    <div class="container mx-auto px-6">
                        <div class="grid md:grid-cols-2 gap-12 items-center">
                            {{-- Kiri: Teks --}}
                            <div>
                                <span class="inline-block py-1 px-3 bg-white/10 text-secondary text-sm font-bold tracking-widest uppercase mb-4">
                                    {{ $slide['label'] }}
                                </span>
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight mb-6 text-white drop-shadow-lg">
                                    {{ $slide['judul'] }}
                                </h1>
                                <p class="text-white/80 text-lg leading-relaxed mb-8 max-w-xl">
                                    {{ $slide['desc'] }}
                                </p>
                                <div class="flex gap-4 flex-wrap">
                                    <a href="{{ $slide['primary']['url'] }}"
                                       class="bg-secondary text-white px-8 py-4 font-bold hover:bg-secondary/90 transition-all shadow-lg inline-flex items-center gap-2">
                                        <i class="{{ $slide['primary']['icon'] }}"></i>
                                        {{ $slide['primary']['text'] }}
                                    </a>
                                    <a href="{{ $slide['outline']['url'] }}"
                                       class="border border-white/40 text-white px-8 py-4 font-bold hover:bg-white/10 transition inline-flex items-center gap-2">
                                        <i class="{{ $slide['outline']['icon'] }}"></i>
                                        {{ $slide['outline']['text'] }}
                                    </a>
                                </div>
                            </div>
                            {{-- Kanan: Gambar Konten --}}
                            <div class="hidden md:flex justify-center items-center">
                                <img src="{{ $slide['img'] }}" alt="{{ $slide['judul'] }}"
                                     class="max-h-[400px] w-auto object-contain drop-shadow-2xl"
                                     onerror="this.onerror=null;this.src='https://placehold.co/400x400'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Indicators --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex items-center gap-3 z-10">
        @foreach ($slides as $i => $slide)
            <button @click="goTo({{ $i }})"
                    class="h-2 rounded-full transition-all duration-300"
                    :class="active === {{ $i }} ? 'w-10 bg-secondary' : 'w-2 bg-white/40 hover:bg-white/60'">
            </button>
        @endforeach
    </div>

    {{-- Nav Arrows --}}
    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition z-10">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition z-10">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

</section>

<style>
@keyframes kenBurnsIn {
    0% { transform: scale(1); }
    100% { transform: scale(1.15); }
}
@keyframes kenBurnsOut {
    0% { transform: scale(1.15); }
    100% { transform: scale(1); }
}
.slider-zoom {
    animation: kenBurnsIn 7s ease-in-out forwards;
}
[x-transition\:leave] .slider-zoom,
.slide-leaving .slider-zoom {
    animation: kenBurnsOut 0.5s ease-in-out forwards;
}
</style>

<script>
function heroSlider() {
    return {
        active: 0,
        total: {{ count($slides) }},
        interval: null,
        startAutoplay() {
            this.interval = setInterval(() => this.next(), 6000);
        },
        stopAutoplay() {
            clearInterval(this.interval);
        },
        goTo(index) {
            this.stopAutoplay();
            this.active = index;
            this.startAutoplay();
        },
        next() {
            this.active = (this.active + 1) % this.total;
        },
        prev() {
            this.stopAutoplay();
            this.active = (this.active - 1 + this.total) % this.total;
            this.startAutoplay();
        }
    };
}
</script>
