@extends('layouts.visitor')
@section('title', 'Program')
@section('seo-title', 'Program PPMA Papua')
@section('seo-description', 'Program-program pemberdayaan masyarakat adat Papua yang dijalankan PPMA Papua.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Program']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    {{-- Hero Banner --}}
    <div class="bg-secondary py-16">
        <div class="max-w-7xl mx-auto px-6">
            <span class="text-white/70 text-lg uppercase tracking-widest"><a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> › Program</span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Program Kami</h1>
            <p class="text-white/70 mt-3 max-w-2xl">Lima pilar program strategis PPMA Papua dalam memberdayakan masyarakat adat di 7 wilayah adat Tanah Papua.</p>
        </div>
    </div>

    



    {{-- Program Unggulan Overview Cards --}}
    <section class="py-16 bg-white border-b border-neutral-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10 fade-in">
                <p class="text-lg font-semibold tracking-widest uppercase text-emerald-600 mb-2">
                    <i class="fa-solid fa-list-ul mr-2"></i>KEGIATAN
                </p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Program Unggulan</h2>
                <p class="text-neutral-500 text-lg mt-3 max-w-3xl">Lima pilar program strategis PPMA Papua untuk memperkuat posisi dan hak masyarakat adat di Tanah Papua.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-green-600"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-green-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-map-location-dot text-xl text-green-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-green-600 bg-green-50 px-2 py-1 mb-3 inline-block">PMA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-green-600 transition-colors">Penguatan Masyarakat Adat</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Pengorganisasian MA, penguatan kelembagaan adat, pendidikan dan pelatihan, pemetaan wilayah adat, kajian sosial budaya, dan perencanaan wilayah berbasis kearifan lokal.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-blue-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-blue-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-scale-balanced text-xl text-blue-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-2 py-1 mb-3 inline-block">KPP</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-blue-600 transition-colors">Kajian Pendidikan Publik</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Kajian perundang-undangan, pendataan investasi, survei dan investigasi konflik, membangun sistem informasi data, kampanye advokasi.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-yellow-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-yellow-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-seedling text-xl text-yellow-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-yellow-600 bg-yellow-50 px-2 py-1 mb-3 inline-block">PEMA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-yellow-600 transition-colors">Pengembangan Ekonomi MA</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Penataan kelembagaan ekonomi, pengembangan potensi ekonomi, pelatihan keterampilan usaha dan desain produk, pengurusan perizinan usaha.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-pink-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-pink-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-users-gear text-xl text-pink-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-pink-600 bg-pink-50 px-2 py-1 mb-3 inline-block">PPA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-pink-600 transition-colors">Penguatan Perempuan Adat</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Pemberdayaan kelompok perempuan, pendidikan dan pelatihan gender, peningkatan kapasitas, memperkuat partisipasi perempuan dalam ruang publik.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group sm:col-span-2 lg:col-span-2">
                    <div class="h-1.5 bg-orange-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-orange-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-building-circle-check text-xl text-orange-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-orange-600 bg-orange-50 px-2 py-1 mb-3 inline-block">PISD</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-orange-600 transition-colors">Penguatan Institusi & Sumber Daya</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Penguatan kapasitas kelembagaan PPMA, peningkatan sumber daya staf, pengelolaan aset, Fund Raising, dan memastikan keberlanjutan organisasi.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>



    
{{-- Detail Program --}}
<section class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-6 space-y-24">

        {{-- 01. Pengembangan Rumpon & Kelautan (Update: Poin 1) --}}
        <div id="rumpon" class="scroll-mt-24">
            <div class="grid md:grid-cols-2 gap-10 items-center fade-in">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-green-50 flex items-center justify-center"><i class="fa-solid fa-fish-fins text-secondary"></i></div>
                        <span class="text-5xl font-display font-bold text-neutral-200">01</span>
                    </div>
                    <h3 class="text-xl font-display font-bold text-neutral-900 mb-3">Pengembangan Rumpon Tradisional</h3>
                    <p class="text-neutral-600 leading-relaxed mb-4">Berawal dari 3 unit model pada 1989 di Kampung Tablanusu, program ini berkembang secara mandiri oleh nelayan hingga mencapai 50 unit pada 2025. Inisiatif ini meningkatkan kemandirian ekonomi nelayan lokal melalui teknologi tepat guna yang berkelanjutan.</p>
                    <ul class="space-y-1.5 mb-6">
                        @foreach ([
                            'Transformasi dari 3 unit menjadi 50 unit rumpon mandiri',
                            'Nelayan lokal menjadi tutor ahli di Papua, Maluku, dan Sulawesi',
                            'Peningkatan hasil tangkap melalui model percontohan yang replikabel',
                            'Monitoring berkelanjutan untuk memastikan dampak jangka panjang'
                        ] as $p)
                        <li class="flex items-start gap-2 text-lg text-neutral-600"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span>{{ $p }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="h-72 bg-green-50 rounded-lg shadow-card flex flex-col items-center justify-center gap-4">
                    <img src="{{ asset('img/bidang-kerja/PPMA Papua, Blog PPMA.png') }}" alt="Rumpon Nelayan" onerror="this.onerror=null;this.src='https://placehold.co/600x400'" />
                </div>
            </div>
            <div class="mt-10 grid sm:grid-cols-3 gap-6 fade-in">
                <div class="rounded-lg bg-white border border-neutral-100 p-6 shadow-card">
                    <div class="w-10 h-10 bg-green-50 flex items-center justify-center mb-3"><i class="fa-solid fa-anchor text-secondary"></i></div>
                    <h4 class="font-display font-bold text-neutral-900 mb-1">50 Unit Rumpon</h4>
                    <p class="text-neutral-500 text-lg leading-relaxed">Keberhasilan replikasi model rumpon oleh nelayan Tablanusu secara swadaya hingga Desember 2025.</p>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-6 shadow-card">
                    <div class="w-10 h-10 bg-green-50 flex items-center justify-center mb-3"><i class="fa-solid fa-chalkboard-user text-secondary"></i></div>
                    <h4 class="font-display font-bold text-neutral-900 mb-1">Tutor Lintas Provinsi</h4>
                    <p class="text-neutral-500 text-lg leading-relaxed">Nelayan binaan kini menjadi instruktur pembuatan rumpon di wilayah Maluku hingga Sulawesi.</p>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-6 shadow-card">
                    <div class="w-10 h-10 bg-green-50 flex items-center justify-center mb-3"><i class="fa-solid fa-chart-line text-secondary"></i></div>
                    <h4 class="font-display font-bold text-neutral-900 mb-1">Kemandirian Lokal</h4>
                    <p class="text-neutral-500 text-lg leading-relaxed">Masyarakat tidak lagi bergantung pada bantuan luar, melainkan melanjutkan model pembangunan secara mandiri.</p>
                </div>
            </div>
        </div>

        <hr class="border-neutral-200">

        {{-- 02. Advokasi & Kebijakan Publik (Update: Poin 2) --}}
        <div id="advokasi" class="scroll-mt-24">
            <div class="grid md:grid-cols-2 gap-10 items-center fade-in">
                <div class="md:order-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-accent-50 flex items-center justify-center"><i class="fa-solid fa-scale-balanced text-accent-500"></i></div>
                        <span class="text-5xl font-display font-bold text-neutral-200">02</span>
                    </div>
                    <h3 class="text-xl font-display font-bold text-neutral-900 mb-3">Advokasi & Kebijakan Publik</h3>
                    <p class="text-neutral-600 leading-relaxed mb-4">Melalui keterbukaan informasi, PPMA Papua berhasil mendorong perubahan kebijakan strategis yang melindungi hak ulayat dan kelestarian alam Papua dari eksploitasi skala besar.</p>
                    <ul class="space-y-1.5">
                        @foreach ([
                            'Pembatalan Scat Paper (Kertas Tisu) dari kayu Mus di Papua Selatan',
                            'Penghentian Mega Proyek Bendungan Mamberamo demi perlindungan lingkungan',
                            'Perubahan tata kelola tanah pembangunan & program transmigrasi',
                            'Regulasi pemanfaatan sumber daya sungai (produk kulit buaya Mamberamo)'
                        ] as $p)
                        <li class="flex items-start gap-2 text-lg text-neutral-600"><i class="fa-solid fa-check text-accent-500 mt-0.5 text-lg"></i><span>{{ $p }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="h-72 bg-accent-50 rounded-lg shadow-card flex flex-col items-center justify-center gap-4 md:order-1">
                    <img src="{{ asset('img/bidang-kerja/PPMA Papua, Akses Pasar.png') }}" onerror="this.onerror=null;this.src='https://placehold.co/600x400'" />
                </div>
            </div>
            <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4 fade-in">
                <div class="rounded-lg bg-white border border-neutral-100 p-5 text-center shadow-card">
                    <div class="text-lg font-display font-bold text-accent-500">Mamberamo</div>
                    <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Proyek Bendungan Dibatalkan</div>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 text-center shadow-card">
                    <div class="text-lg font-display font-bold text-accent-500">Kayu Mus</div>
                    <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Penyelamatan Hutan Selatan</div>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 text-center shadow-card">
                    <div class="text-lg font-display font-bold text-secondary">Tanah Ulayat</div>
                    <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Perubahan Tata Kelola</div>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 text-center shadow-card">
                    <div class="text-lg font-display font-bold text-secondary">Advokasi</div>
                    <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Keterbukaan Informasi</div>
                </div>
            </div>
        </div>

        <hr class="border-neutral-200">

        {{-- 03. Promosi Ekonomi Rakyat - Kakao (Update: Poin 3) --}}
        <div id="ekonomi-kakao" class="scroll-mt-24">
            <div class="grid md:grid-cols-2 gap-10 items-center fade-in">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-amber-50 flex items-center justify-center"><i class="fa-solid fa-seedling text-amber-500"></i></div>
                        <span class="text-5xl font-display font-bold text-neutral-200">03</span>
                    </div>
                    <h3 class="text-xl font-display font-bold text-neutral-900 mb-3">Promosi Ekonomi Rakyat (Kakao)</h3>
                    <p class="text-neutral-600 leading-relaxed mb-4">Kolaborasi dengan ATJ Japan membuka pintu ekspor biji kakao Criollo. Program ini tidak hanya tentang perdagangan, tapi juga tentang hilirisasi produk dan edukasi lintas negara.</p>
                    <ul class="space-y-1.5 mb-6">
                        @foreach ([
                            'Ekspor rutin kakao organik ke Jepang (15 ton per tahun)',
                            'Kunjungan rutin konsumen dan mahasiswa Jepang ke kebun petani',
                            'Hilirisasi biji kakao menjadi pasta, cokelat batang, dan es krim',
                            'Kemandirian tata kelola melalui PT Kakao Kita Papua'
                        ] as $p)
                        <li class="flex items-start gap-2 text-lg text-neutral-600"><i class="fa-solid fa-check text-amber-500 mt-0.5 text-lg"></i><span>{{ $p }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="h-72 bg-amber-50 rounded-lg shadow-card flex flex-col items-center justify-center gap-4">
                    <img src="{{ asset('img/bidang-kerja/PPMA Papua, Penguatan Usaha & Pelatihan.png') }}" onerror="this.onerror=null;this.src='https://placehold.co/600x400'" />
                </div>
            </div>
            <div class="mt-12 grid md:grid-cols-2 gap-8 fade-in">
                <div class="rounded-lg bg-white border border-neutral-100 p-8 shadow-card">
                    <h4 class="font-display font-bold text-neutral-900 mb-2">Hilirisasi & Industri</h4>
                    <p class="text-neutral-600 text-lg leading-relaxed">Transformasi produk dari biji mentah menjadi pasta dan cokelat batang siap konsumsi, kini dikelola secara profesional oleh PT Kakao Kita Papua.</p>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-8 shadow-card">
                    <h4 class="font-display font-bold text-neutral-900 mb-2">Pasar Internasional</h4>
                    <p class="text-neutral-600 text-lg leading-relaxed">Permintaan pasar Jepang mencapai 30 ton per tahun, memotivasi petani untuk meningkatkan produktivitas kakao organik secara konsisten.</p>
                </div>
            </div>
        </div>

        <hr class="border-neutral-200">

        {{-- 04. Clean Water & Kesehatan Lingkungan (Update: Poin 4) --}}
        <div id="air-bersih" class="scroll-mt-24">
            <div class="grid md:grid-cols-2 gap-10 items-center fade-in">
                <div class="md:order-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-sky-50 flex items-center justify-center"><i class="fa-solid fa-droplet text-sky-500"></i></div>
                        <span class="text-5xl font-display font-bold text-neutral-200">04</span>
                    </div>
                    <h3 class="text-xl font-display font-bold text-neutral-900 mb-3">Clean Water & Kesehatan Lingkungan</h3>
                    <p class="text-neutral-600 leading-relaxed mb-4">Program berbagi tanggung jawab antara PPMA Papua (tenaga ahli & material industri) dan masyarakat (material lokal & tenaga kerja) untuk menjamin keberlanjutan akses air bersih.</p>
                    <ul class="space-y-1.5 mb-6">
                        @foreach ([
                            '98 Jaringan air bersih terbangun di 98 titik (1984 - 2021)',
                            'Cakupan luas: Papua, Maluku, Sulawesi, hingga Timor-Timur',
                            'Model pengelolaan pasca-proyek oleh masyarakat secara mandiri',
                            'Pendampingan teknis penyambungan pipa dan tenaga ahli'
                        ] as $p)
                        <li class="flex items-start gap-2 text-lg text-neutral-600"><i class="fa-solid fa-check text-sky-500 mt-0.5 text-lg"></i><span>{{ $p }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="h-72 bg-sky-50 rounded-lg shadow-card flex flex-col items-center justify-center gap-4 md:order-1">
                    <img src="{{ asset('img/bidang-kerja/PPMA Papua, Kesehatan Lingkungan, Clean Water Supply.png') }}" onerror="this.onerror=null;this.src='https://placehold.co/600x400'" />
                </div>
            </div>
            <div class="mt-10 grid sm:grid-cols-3 gap-6 fade-in">
                <div class="rounded-lg bg-white border border-neutral-100 p-6 shadow-card">
                    <div class="text-2xl font-display font-bold text-sky-500">98</div>
                    <h4 class="font-display font-bold text-neutral-900 mb-1">Jaringan Air</h4>
                    <p class="text-neutral-500 text-lg">Titik suplai air bersih yang telah dibangun dan berfungsi.</p>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-6 shadow-card">
                    <div class="text-2xl font-display font-bold text-sky-500">4</div>
                    <h4 class="font-display font-bold text-neutral-900 mb-1">Wilayah Besar</h4>
                    <p class="text-neutral-500 text-lg">Papua, Maluku Tenggara, Sulawesi Tenggara, & Timor-Timur.</p>
                </div>
                <div class="rounded-lg bg-white border border-neutral-100 p-6 shadow-card">
                    <div class="text-2xl font-display font-bold text-sky-500">1984</div>
                    <h4 class="font-display font-bold text-neutral-900 mb-1">Sejak Dini</h4>
                    <p class="text-neutral-500 text-lg">Komitmen jangka panjang terhadap kesehatan lingkungan desa.</p>
                </div>
            </div>
        </div>

    </div>
</section>



    {{-- CTA --}}
    <section class="bg-secondary py-16">
        <div class="max-w-7xl mx-auto px-6 text-center fade-in">
            <h2 class="text-2xl md:text-3xl font-display font-bold text-white mb-4">Dukung Program Kami</h2>
            <p class="text-white/70 text-lg max-w-lg mx-auto mb-8">Setiap kontribusi membantu mewujudkan kemandirian ekonomi dan keadilan sosial bagi masyarakat adat Papua.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('donasi') }}" class="bg-white text-secondary px-8 py-3 text-lg font-semibold hover:bg-neutral-100 transition-colors shadow-card">
                    <i class="fa-solid fa-heart mr-2"></i>Donasi Sekarang
                </a>
                <a href="{{ route('kontak') }}" class="border border-white/40 text-white px-8 py-3 text-lg font-semibold hover:bg-white/10 transition-colors">
                    <i class="fa-solid fa-envelope mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection
