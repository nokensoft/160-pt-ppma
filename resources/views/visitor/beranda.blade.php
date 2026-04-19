@extends('layouts.visitor')
@section('title', ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-title', ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-description', ($situs['seo_meta_description'] ?? 'Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua'))

@section('json-ld')
@php
$_bcHome = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],
]];
$_f = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_bcHome, $_f) !!}</script>
@endsection

@section('content')

    {{-- HERO SLIDER --}}
    @include('partials.hero-slider')

    

    {{-- BLOG / ARTIKEL --}}
    <section id="artikel" class="bg-white py-20 border-t border-gray-100 scroll-mt-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 fade-in">
                <div class="max-w-xl">
                    <h2 class="text-3xl font-bold mt-2 uppercase">Artikel & Kabar Berita</h2>
                    <div class="h-1 w-20 bg-primary mt-4"></div>
                </div>
                <a href="{{ route('berita') }}" class="text-primary font-bold uppercase tracking-widest text-lg border-b-2 border-primary hover:text-secondary hover:border-secondary transition pb-1">
                    Tampilkan Semua <i class="fa-solid fa-arrow-right ml-2 text-lg"></i>
                </a>
            </div>
            <div class="grid md:grid-cols-3 gap-10">
                @forelse ($beritaTerbaru as $b)
                    <a href="{{ route('berita.detail', $b->slug) }}" class="group cursor-pointer fade-in block">
                        <div class="relative overflow-hidden bg-gray-100 mb-6 shadow-md">
                            <img src="{{ $b->gambar }}" alt="{{ $b->judul }}" class="w-full h-full object-cover transition-all duration-500 scale-100 group-hover:scale-105">
                            {{-- @if ($b->kategori)
                                <div class="absolute top-0 left-0 bg-primary text-white px-3 py-1 text-lg font-bold uppercase tracking-tighter">{{ $b->kategori->nama }}</div>
                            @endif --}}
                        </div>
                        <div class="space-y-3">
                            {{-- <time class="text-gray-400 text-lg uppercase tracking-widest">{{ $b->tanggal_terbit?->translatedFormat('d F Y') }}</time> --}}
                            <h3 class="text-xl font-bold leading-snug group-hover:text-secondary transition line-clamp-2">{{ $b->judul }}</h3>
                            @if ($b->ringkasan)
                                <p class="text-gray-500 line-clamp-3">{{ $b->ringkasan }}</p>
                            @endif
                            {{-- <a href="{{ route('berita.detail', $b->slug) }}" class="inline-block pt-2 font-bold text-lg uppercase tracking-wider group-hover:translate-x-2 transition-transform">Selengkapnya <i class="fa-solid fa-chevron-right ml-1 text-lg"></i></a> --}}
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-400">
                        <p>Belum ada artikel.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- TENTANG PPMA --}}
    <section id="tentang" class="bg-primary text-white py-20 scroll-mt-20 relative overflow-hidden">
        {{-- Grid Background --}}
        <div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="fade-in">
                    <span class="text-secondary font-bold tracking-[0.2em] uppercase text-lg">Tentang Kami</span>
                    <h2 class="text-3xl font-bold mt-3 mb-6 uppercase tracking-tight">Siapa PPMA Papua?</h2>
                    <p class="text-gray-300 leading-relaxed mb-6">
                        Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat (PPMA) Papua adalah bagian dari Civil Society Organisation (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat, berkaitan dengan kepastian hak dan ruang hidupnya untuk kemandirian dan kesejahteraannya.
                    </p>
                    <p class="text-gray-300 leading-relaxed mb-8">
                        Didirikan pada tahun 1988 dengan nama Yayasan Pendidikan Hukum Masyarakat Adat (YKPHMA) Irian Jaya, oleh Ibu Maria Ruwiastuti, Zadrak Wamebu, Dr. Loupaty, dan beberapa pendiri lainnya — sebagai respons atas kondisi HAM masyarakat adat yang semakin tertindas di Papua.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="border border-white/10 p-4 rounded-lg">
                            <p class="text-lg uppercase font-bold tracking-widest text-gray-400 mb-1">Akta Pendirian</p>
                            <p class="font-bold">31 Oktober 1997</p>
                        </div>
                        <div class="border border-white/10 p-4 rounded-lg">
                            <p class="text-lg uppercase font-bold tracking-widest text-gray-400 mb-1">Periode Kerja</p>
                            <p class="font-bold">2020 – 2025</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-6 fade-in">
                    <div class="border-l-4 border-secondary pl-6 py-2">
                        <p class="text-lg uppercase font-bold tracking-widest text-secondary mb-3">Visi Organisasi</p>
                        <p class="text-gray-200 leading-relaxed font-medium">
                            "Terwujudnya Masyarakat Adat Papua Yang Mampu Mengorganisir Diri Dan Merekonsiliasi Hubungan Dengan Tuhan Dan Alam Semesta Papua Untuk Kehidupan Yang Berdaulat Dan Berkelanjutan Dalam Berbagai Aspek Kehidupan Di Tahun 2040"
                        </p>
                    </div>
                    <div>
                        <p class="text-lg uppercase font-bold tracking-widest text-secondary mb-4">Tata Nilai</p>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="bg-white/5 p-3 rounded-lg text-center hover:bg-secondary/20 transition">
                                <i class="fa-solid fa-eye text-secondary mb-2 block text-lg"></i>
                                <p class="text-lg uppercase font-bold tracking-wider">Transparansi</p>
                            </div>
                            <div class="bg-white/5 p-3 rounded-lg text-center hover:bg-secondary/20 transition">
                                <i class="fa-solid fa-person-booth text-secondary mb-2 block text-lg"></i>
                                <p class="text-lg uppercase font-bold tracking-wider">Demokrasi</p>
                            </div>
                            <div class="bg-white/5 p-3 rounded-lg text-center hover:bg-secondary/20 transition">
                                <i class="fa-solid fa-venus-mars text-secondary mb-2 block text-lg"></i>
                                <p class="text-lg uppercase font-bold tracking-wider">Kesetaraan Gender</p>
                            </div>
                            <div class="bg-white/5 p-3 rounded-lg text-center hover:bg-secondary/20 transition">
                                <i class="fa-solid fa-people-group text-secondary mb-2 block text-lg"></i>
                                <p class="text-lg uppercase font-bold tracking-wider">Partisipasi</p>
                            </div>
                            <div class="bg-white/5 p-3 rounded-lg text-center hover:bg-secondary/20 transition">
                                <i class="fa-solid fa-arrows-spin text-secondary mb-2 block text-lg"></i>
                                <p class="text-lg uppercase font-bold tracking-wider">Keberlanjutan</p>
                            </div>
                            <div class="bg-white/5 p-3 rounded-lg text-center hover:bg-secondary/20 transition">
                                <i class="fa-solid fa-leaf text-secondary mb-2 block text-lg"></i>
                                <p class="text-lg uppercase font-bold tracking-wider">Kelestarian</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DOKUMENTASI LAPANGAN --}}
    <section class="bg-white py-20 border-t border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 fade-in">
                <div class="max-w-xl">
                    <span class="text-secondary font-bold tracking-widest uppercase text-lg">Dokumentasi Lapangan</span>
                    <h2 class="text-3xl font-bold mt-2 uppercase tracking-tight">Aktivitas & Jejak Rekam</h2>
                    <div class="h-1 w-20 bg-primary mt-4"></div>
                </div>
                <a href="{{ route('galeri') }}" class="text-primary font-bold uppercase tracking-widest text-lg border-b-2 border-primary hover:text-secondary hover:border-secondary transition pb-1 whitespace-nowrap">
                    Lihat Semua Galeri <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($galeriTerbaru as $g)
                    @php
                        $cover = $g->media->first();
                        if ($cover && ($cover->tipe ?? '') === 'video') {
                            $coverUrl = 'https://img.youtube.com/vi/' . $cover->file_name . '/hqdefault.jpg';
                        } elseif ($cover) {
                            $coverUrl = asset('storage/' . $cover->file_path);
                        } else {
                            $coverUrl = 'https://placehold.co/600x400';
                        }
                    @endphp
                    <a href="{{ route('galeri.detail', $g->slug) }}"
                       class="group bg-white card-hover border border-gray-100 rounded-none overflow-hidden fade-in block" style="box-shadow:0 2px 12px rgba(0,0,0,0.08)">
                        <div class="relative overflow-hidden">
                            <img src="{{ $coverUrl }}" alt="{{ $g->judul }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400'">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition flex items-center justify-center">
                                <i class="fa-solid fa-images text-white text-2xl opacity-0 group-hover:opacity-100 transition"></i>
                            </div>
                            <span class="absolute top-3 right-3 bg-black/60 text-white text-xs font-bold px-2 py-1">
                                <i class="fa-solid fa-image mr-1"></i>{{ $g->media->count() }}
                            </span>
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-gray-900 group-hover:text-secondary transition line-clamp-2 text-lg">{{ $g->judul }}</h4>
                            @if (!empty($g->deskripsi))
                                <p class="text-gray-500 text-base mt-1 line-clamp-2">{{ $g->deskripsi }}</p>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16 text-gray-400">
                        <i class="fa-solid fa-images text-5xl mb-4 block"></i>
                        <p class="text-lg">Belum ada dokumentasi.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 5 PILAR PROGRAM --}}
    <section id="pilar-program" class="bg-accent py-20 scroll-mt-20">
        <div class="container mx-auto px-6">
            <div class="mb-16 text-center fade-in">
                <span class="text-secondary font-bold tracking-[0.2em] uppercase text-lg">Program Strategis</span>
                <h2 class="text-3xl font-bold mt-3 mb-4 uppercase">5 Pilar Utama PPMA</h2>
                <div class="h-1 w-20 bg-primary mx-auto"></div>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Setiap pilar dirancang untuk memperkuat posisi dan hak masyarakat adat di 7 wilayah adat Tanah Papua.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md border-b-4 border-transparent hover:border-secondary transition group fade-in">
                    <div class="w-14 h-14 bg-accent flex items-center justify-center mb-6 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-map-location-dot text-2xl text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <span class="text-lg font-bold tracking-widest uppercase text-secondary bg-secondary/10 px-2 py-1 mb-4 inline-block">PMA</span>
                    <h3 class="text-xl font-bold mb-4 uppercase">Penguatan Masyarakat Adat</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">Pengorganisasian MA, penguatan kelembagaan adat, pendidikan dan pelatihan, pemetaan wilayah adat, kajian sosial budaya, survey potensi ekonomi, dan perencanaan wilayah berbasis kearifan lokal.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md border-b-4 border-transparent hover:border-secondary transition group fade-in">
                    <div class="w-14 h-14 bg-accent flex items-center justify-center mb-6 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-scale-balanced text-2xl text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <span class="text-lg font-bold tracking-widest uppercase text-secondary bg-secondary/10 px-2 py-1 mb-4 inline-block">KPP</span>
                    <h3 class="text-xl font-bold mb-4 uppercase">Kajian Pendidikan Publik</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">Kajian perundang-undangan, pendataan investasi, survey & investigasi konflik, membangun sistem informasi data, pengembangan media dan jaringan, kampanye advokasi.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md border-b-4 border-transparent hover:border-secondary transition group fade-in">
                    <div class="w-14 h-14 bg-accent flex items-center justify-center mb-6 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-seedling text-2xl text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <span class="text-lg font-bold tracking-widest uppercase text-secondary bg-secondary/10 px-2 py-1 mb-4 inline-block">PEMA</span>
                    <h3 class="text-xl font-bold mb-4 uppercase">Pengembangan Ekonomi MA</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">Penataan kelembagaan ekonomi, pengembangan sumber potensi ekonomi, pelatihan keterampilan usaha dan desain produk, pengurusan perijinan usaha.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md border-b-4 border-transparent hover:border-secondary transition group fade-in">
                    <div class="w-14 h-14 bg-accent flex items-center justify-center mb-6 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-users-gear text-2xl text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <span class="text-lg font-bold tracking-widest uppercase text-secondary bg-secondary/10 px-2 py-1 mb-4 inline-block">PPA</span>
                    <h3 class="text-xl font-bold mb-4 uppercase">Penguatan Perempuan Adat</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">Pemberdayaan kelompok perempuan melalui organisasi perempuan, pendidikan dan pelatihan gender, peningkatan kapasitas, memperkuat partisipasi perempuan dalam ruang publik.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md border-b-4 border-transparent hover:border-secondary transition group md:col-span-2 fade-in">
                    <div class="w-14 h-14 bg-accent flex items-center justify-center mb-6 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-building-circle-check text-2xl text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <span class="text-lg font-bold tracking-widest uppercase text-secondary bg-secondary/10 px-2 py-1 mb-4 inline-block">PISD</span>
                    <h3 class="text-xl font-bold mb-4 uppercase">Penguatan Institusi & Sumber Daya</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">Penguatan kapasitas kelembagaan PPMA melalui peningkatan sumber daya staf, pendataan dan pengelolaan aset, pengefektifan manajemen sistem internal, Fund Raising, dan memastikan keberlanjutan organisasi.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
