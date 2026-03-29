@extends('layouts.visitor')
@section('title', 'Mitra Kerja - ' . ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-title', 'Mitra Kerja & Sponsor PPMA Papua')
@section('seo-description', 'Daftar jaringan mitra kerja PPMA Papua dalam skala lokal, nasional, dan internasional untuk pemberdayaan masyarakat adat Papua.')

@section('content')
    <div class="bg-secondary py-16">
        <div class="max-w-7xl mx-auto px-6">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> ›
                <a href="{{ route('profil') }}" class="hover:text-white">Tentang</a> › Mitra Kerja
            </span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Jaringan Mitra</h1>
            <p class="text-white/70 mt-2 text-lg">Organisasi mitra dan jaringan kerja PPMA Papua dalam skala lokal, nasional, dan internasional</p>
        </div>
    </div>


    


    





    @php
        // ── helper: normalize URL ─────────────────────────────────────────────
        function mitraUrl(string $web): string {
            if (str_starts_with($web, '@')) {
                return 'https://www.instagram.com/' . ltrim($web, '@');
            }
            return str_starts_with($web, 'http') ? $web : 'https://' . $web;
        }
        function mitraLabel(string $web): string {
            if (str_starts_with($web, '@')) return $web;
            return rtrim(preg_replace('#^https?://(www\.)?#', '', $web), '/');
        }
    @endphp

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            {{-- Intro --}}
            <div class="grid md:grid-cols-2 gap-12 items-center mb-16 fade-in">
                <div class="max-w-xl">
                    <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2">
                        <i class="fa-solid fa-handshake mr-2"></i>Kemitraan
                    </p>
                    <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-4">Bersama Membangun Papua</h2>
                    <p class="text-neutral-600 leading-relaxed">
                        Selama lebih dari 40 tahun, PPMA Papua telah menjalin kemitraan strategis dengan berbagai lembaga pemerintah, komunitas adat, dan organisasi non-pemerintah lokal maupun nasional. Kemitraan ini menjadi fondasi keberlanjutan program-program pemberdayaan masyarakat adat di Papua.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="rounded-lg bg-secondary/5 border border-secondary/20 p-5 text-center fade-in">
                        <p class="text-3xl font-black text-secondary">49</p>
                        <p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">Total Mitra</p>
                    </div>
                    <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-5 text-center fade-in">
                        <p class="text-3xl font-black text-secondary">4</p>
                        <p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">Pemerintah</p>
                    </div>
                    <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-5 text-center fade-in">
                        <p class="text-3xl font-black text-secondary">12</p>
                        <p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">NGO Lokal</p>
                    </div>
                    <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-5 text-center fade-in">
                        <p class="text-3xl font-black text-secondary">27</p>
                        <p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">NGO Nasional</p>
                    </div>
                </div>
            </div>

            {{-- helper macro: render satu kartu mitra --}}
            @php
                function mitraCard(int $no, string $nama, string $fullname, string $web, string $borderHover, string $badge, string $badgeColor): string {
                    $noStr   = sprintf('%02d', $no);
                    $webHtml = '';
                    if ($web) {
                        $url   = str_starts_with($web, '@') ? 'https://www.instagram.com/'.ltrim($web,'@') : (str_starts_with($web,'http') ? $web : 'https://'.$web);
                        $label = str_starts_with($web, '@') ? $web : rtrim(preg_replace('#^https?://(www\.)?#','',$web),'/');
                        $webHtml = '<a href="'.$url.'" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2 break-all"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> '.$label.'</a>';
                    }
                    $fnHtml = $fullname ? '<p class="text-neutral-500 text-base leading-snug mb-1">'.$fullname.'</p>' : '';
                    return '<div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in flex flex-col gap-1">'
                          .'<div class="flex items-center justify-between mb-1">'
                          .'<span class="text-base font-mono text-neutral-300">#'.$noStr.'</span>'
                          .'<span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full '.$badgeColor.'">'.$badge.'</span>'
                          .'</div>'
                          .'<h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">'.$nama.'</h4>'
                          .$fnHtml
                          .$webHtml
                          .'</div>';
                }
            @endphp

            {{-- Pemerintah (1–4) --}}
            <div class="mb-14">
                <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3">
                    <span class="flex-1 h-px bg-neutral-200"></span>
                    <span><i class="fa-solid fa-landmark mr-2 text-secondary/70"></i>Pemerintah</span>
                    <span class="flex-1 h-px bg-neutral-200"></span>
                </h3>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ([
                        [1,  'Menteri Kehutanan',     '',  'https://www.kehutanan.go.id/'],
                        [2,  'Kabupaten Jayapura',    '',  'jayapurakab.go.id'],
                        [3,  'Kabupaten Mappi',       '',  'https://mappikab.go.id/'],
                        [4,  'Kabupaten Sarmi',       '',  'https://www.sarmikab.go.id'],
                    ] as [$no, $nama, $fn, $web])
                    <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-base font-mono text-neutral-300">#{{ sprintf('%02d', $no) }}</span>
                            <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-blue-50 text-blue-600">Pemerintah</span>
                        </div>
                        <h4 class="font-display font-bold text-neutral-900 text-lg leading-tight mb-1">{{ $nama }}</h4>
                        @if($web)
                        @php $url = str_starts_with($web,'http') ? $web : 'https://'.$web; $lbl = rtrim(preg_replace('#^https?://(www\.)?#','',$web),'/'); @endphp
                        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-1">
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> {{ $lbl }}
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Adat & Komunitas (5–10) --}}
            <div class="mb-14">
                <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3">
                    <span class="flex-1 h-px bg-neutral-200"></span>
                    <span><i class="fa-solid fa-users mr-2 text-amber-500/70"></i>Adat & Komunitas</span>
                    <span class="flex-1 h-px bg-neutral-200"></span>
                </h3>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ([
                        [5,  'Dewan Adat Suku di Kabupaten Jayapura', 'Ada 9 dewan adat suku di Kab. Jayapura',            'Adat',      ''],
                        [6,  'Dewan Adat Suku di Kabupaten Sarmi',    'Ada 5 suku besar di Kabupaten Sarmi',               'Adat',      ''],
                        [7,  'Ikatan Perempuan Mappi',                 '',                                                  'Komunitas', ''],
                        [8,  'Organisasi Perempuan Adat Namblong',     'ORPA Namblong',                                     'Komunitas', ''],
                        [9,  'LMA Kabupaten Mappi',                    'Lembaga Masyarakat Adat Kab. Mappi',                'Adat',      ''],
                        [10, 'LMA Kabupaten Sarmi',                    'Lembaga Masyarakat Adat Kab. Sarmi',                'Adat',      ''],
                    ] as [$no, $nama, $fn, $badge, $web])
                    <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-base font-mono text-neutral-300">#{{ sprintf('%02d', $no) }}</span>
                            <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">{{ $badge }}</span>
                        </div>
                        <h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">{{ $nama }}</h4>
                        @if($fn)<p class="text-neutral-500 text-base mt-1">{{ $fn }}</p>@endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- NGO Lokal Papua (11–22) --}}
            <div class="mb-14">
                <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3">
                    <span class="flex-1 h-px bg-neutral-200"></span>
                    <span><i class="fa-solid fa-hand-holding-heart mr-2 text-secondary/70"></i>NGO Lokal Papua</span>
                    <span class="flex-1 h-px bg-neutral-200"></span>
                </h3>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ([
                        [11, 'KIPRa Papua',       'Yayasan Konsultasi Independen Pemberdayaan Masyarakat Papua', 'https://www.instagram.com/kipra_papua/'],
                        [12, 'JERAT Papua',       'Jaringan Kerja Rakyat Papua',                                'https://www.jeratpapua.org/'],
                        [13, 'WALHI Papua',       'Wahana Lingkungan Hidup Papua',                              'https://www.instagram.com/walhi_papua/'],
                        [14, 'FOKER Papua',       'Forum Kerjasama LSM Papua',                                  'https://www.tanahpapua.org/'],
                        [15, 'YALI Papua',        'Yayasan Lingkungan Hidup Papua',                             'https://yalipapua.org/'],
                        [16, 'INTSIA Papua',      '',                                                            'intsiapapua.org'],
                        [17, 'LEKAT',             'Lembaga Pengkajian dan Pemberdayaan Masyarakat Adat',        'https://lekatpapua.org/'],
                        [18, 'RUMSRAM',           '',                                                            'rumsram.org'],
                        [19, 'YPMD Papua',        'Yayasan Pengembangan Masyarakat Desa Papua',                 'ypmdpapua.or.id'],
                        [20, 'WWF Regional Papua','World Wide Fund for Nature Regional Papua',                   'wwf.id'],
                        [21, 'KIPAS',             'Komunitas Masyarakat Peduli Alam dan Lingkungan',            ''],
                        [22, 'YWSS',              'Yayasan Wahana Sejahtera Sorong',                            ''],
                    ] as [$no, $nama, $fn, $web])
                    <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-base font-mono text-neutral-300">#{{ sprintf('%02d', $no) }}</span>
                            <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span>
                        </div>
                        <h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">{{ $nama }}</h4>
                        @if($fn)<p class="text-neutral-500 text-base mt-0.5">{{ $fn }}</p>@endif
                        @if($web)
                        @php
                            $isIg  = str_contains($web, 'instagram');
                            $url   = str_starts_with($web,'http') ? $web : 'https://'.$web;
                            $lbl   = rtrim(preg_replace('#^https?://(www\.)?#','',$web),'/');
                        @endphp
                        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2">
                            <i class="fa-solid {{ $isIg ? 'fa-brands fa-instagram' : 'fa-arrow-up-right-from-square' }} text-xs"></i> {{ $lbl }}
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- NGO Nasional (23–49) --}}
            <div class="mb-6">
                <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3">
                    <span class="flex-1 h-px bg-neutral-200"></span>
                    <span><i class="fa-solid fa-globe mr-2 text-secondary/70"></i>NGO Nasional</span>
                    <span class="flex-1 h-px bg-neutral-200"></span>
                </h3>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ([
                        [23, 'JKPP',                      'Jaringan Kerja Pemetaan Partisipatif',                            'https://jkpp.org/'],
                        [24, 'BRWA',                      'Badan Registrasi Wilayah Adat',                                   'brwa.or.id'],
                        [25, 'KEMITRAAN Indonesia',        '',                                                                'kemitraan.or.id'],
                        [26, 'HUMA',                      'Perkumpulan untuk Pembaharuan Hukum Berbasis Masyarakat',          'huma.or.id'],
                        [27, 'The Samdhana Institute',     '',                                                                'samdhana.org'],
                        [28, 'LP3AP',                     'Lembaga Pengkajian Pemberdayaan Perempuan & Anak Papua',           ''],
                        [29, 'YAPPIKA',                   '',                                                                'yappika-actionaid.or.id'],
                        [30, 'LINGKAR MADANI',             'Lingkar Madani Indonesia',                                        'lingkarmadani.org'],
                        [31, 'PATTIRO',                   'Pusat Telaah dan Informasi Regional',                             'pattiro.org'],
                        [32, 'PERNIK',                    'Perkumpulan untuk Pemberdayaan dan Pendidikan',                   ''],
                        [33, 'PUSAKA',                    'Yayasan Pusaka Bentala Rakyat',                                   'pusaka.or.id'],
                        [34, 'WALHI Nasional',             'Wahana Lingkungan Hidup Indonesia',                               'walhi.or.id'],
                        [35, 'TLE',                       'The Local Enablers',                                              'thelocalenablers.id'],
                        [36, 'Greenpeace Indonesia',       '',                                                                'greenpeace.org/indonesia'],
                        [37, 'EcoNusa',                   'Yayasan Ekosistem Nusantara Berkelanjutan',                       'econusa.id'],
                        [38, 'YADUPA',                    'Yayasan Pendidikan Kebudayaan Papua',                             'yadupa.org'],
                        [39, 'Dewan Adat TABI',            '',                                                                ''],
                        [40, 'Dewan Adat Papua',           '',                                                                'dewanadatpapua.org'],
                        [41, 'Solidaritas Perempuan Adat Papua', 'SPP',                                                       '@solidaritasperempuan'],
                        [42, 'JUBI',                      '',                                                                'jubi.id'],
                        [43, 'Yayasan SATUNAMA',           'Yogyakarta',                                                      'satunama.org'],
                        [44, 'SKALA',                     'Sinergi Kapasitas Lintas Organisasi',                             'skala.or.id'],
                        [45, 'WGGI',                      'Working Group on Forest Tenures',                                 'wggt.or.id'],
                        [46, 'AMAN',                      'Aliansi Masyarakat Adat Nusantara',                               'aman.or.id'],
                        [47, 'PUTER',                     'Yayasan Puter Indonesia',                                         'puter.or.id'],
                        [48, 'KPA',                       'Konsorsium Pembaruan Agraria',                                    'kpa.or.id'],
                        [49, 'PENABULU',                  'Yayasan Penabulu',                                                'penabulu.id'],
                    ] as [$no, $nama, $fn, $web])
                    <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-base font-mono text-neutral-300">#{{ sprintf('%02d', $no) }}</span>
                            <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span>
                        </div>
                        <h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">{{ $nama }}</h4>
                        @if($fn)<p class="text-neutral-500 text-base mt-0.5">{{ $fn }}</p>@endif
                        @if($web)
                        @php
                            $isIg = str_starts_with($web, '@');
                            $url  = $isIg ? 'https://www.instagram.com/'.ltrim($web,'@') : (str_starts_with($web,'http') ? $web : 'https://'.$web);
                            $lbl  = $isIg ? $web : rtrim(preg_replace('#^https?://(www\.)?#','',$web),'/');
                        @endphp
                        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2">
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> {{ $lbl }}
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>








    
    {{-- CTA --}}
    <section class="bg-secondary py-14">
        <div class="max-w-7xl mx-auto px-6 text-center fade-in">
            <h2 class="text-2xl md:text-3xl font-display font-bold text-white mb-3">Tertarik Bermitra dengan PPMA Papua?</h2>
            <p class="text-white/70 text-lg mb-8">Kami terbuka untuk kolaborasi dengan lembaga, pemerintah, dan sektor swasta yang memiliki komitmen terhadap pemberdayaan masyarakat adat Papua.</p>
            <a href="{{ route('kontak') }}"
               class="inline-flex items-center gap-2 bg-white text-secondary px-8 py-3 text-lg font-semibold hover:bg-neutral-100 transition-colors shadow-card">
                <i class="fa-solid fa-envelope"></i> Hubungi Kami
            </a>
        </div>
    </section>
@endsection
