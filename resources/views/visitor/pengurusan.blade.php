@extends('layouts.visitor')
@section('title', 'Struktur Kepengurusan - ' . ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-title', 'Struktur Kepengurusan - ' . ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-description', 'Struktur kepengurusan PPMA Papua: Badan Pengawas, Badan Pengurus, dan Tim Pelaksana.')

@section('content')
    @include('partials.page-banner', ['title' => 'Struktur Kepengurusan', 'breadcrumb' => 'Kepengurusan'])

    {{-- Info Periode --}}
    <section class="py-10 bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center">
                <div>
                    <p class="text-white/70 text-lg uppercase tracking-widest mb-1">Organisasi</p>
                    <p class="font-extrabold text-xl">PPMA Papua</p>
                    <p class="text-white/70 text-lg mt-1">Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua</p>
                </div>
                <div>
                    <p class="text-white/70 text-lg uppercase tracking-widest mb-1">Periode Kerja</p>
                    <p class="font-bold text-xl">2020 &ndash; 2025</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Badan Pengawas (Supervisor) --}}
    <section id="pengawas" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <p class="text-primary font-bold uppercase tracking-widest text-lg mb-2">Supervisor</p>
                <h3 class="text-3xl font-extrabold">Badan Pengawas</h3>
                <div class="w-16 h-1 bg-primary mx-auto mt-3"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
                @foreach ([
                    'Yoko Yahan Yaku',
                    'Nicodemus Yance Wamafma',
                    'Amos Soumilena',
                ] as $nama)
                    <div class="bg-white border border-gray-200 shadow-md p-6 text-center hover:border-primary hover:shadow-lg transition">
                        <div class="w-14 h-14 bg-primary/10 flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-shield text-primary text-xl"></i>
                        </div>
                        <p class="text-lg font-bold text-primary uppercase tracking-widest mb-2">Anggota Pengawas</p>
                        <h4 class="font-extrabold text-lg">{{ $nama }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Badan Pengurus (Board of Directors) --}}
    <section id="pengurus" class="py-16 bg-accent">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <p class="text-primary font-bold uppercase tracking-widest text-lg mb-2">Board of Directors</p>
                <h3 class="text-3xl font-extrabold">Badan Pengurus</h3>
                <div class="w-16 h-1 bg-primary mx-auto mt-3"></div>
            </div>

            {{-- Ketua --}}
            <div class="max-w-sm mx-auto mb-10">
                <div class="bg-white shadow-xl border-t-4 border-primary p-8 text-center">
                    <div class="w-20 h-20 bg-primary/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-primary text-3xl"></i>
                    </div>
                    <p class="text-lg font-bold text-primary uppercase tracking-widest mb-1">Ketua (Chairman)</p>
                    <h4 class="font-extrabold text-xl">Zadrak Wamebu</h4>
                </div>
            </div>

            {{-- Wakil Ketua --}}
            <div class="max-w-sm mx-auto mb-10">
                <div class="bg-white shadow-md border border-gray-200 p-6 text-center hover:border-primary transition">
                    <div class="w-16 h-16 bg-primary/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-primary text-2xl"></i>
                    </div>
                    <p class="text-lg font-bold text-primary uppercase tracking-widest mb-1">Wakil Ketua (Vice Chairman)</p>
                    <h4 class="font-extrabold text-lg">Robert Mandosir</h4>
                </div>
            </div>

            {{-- Sekretaris & Bendahara --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto mb-10">
                <div class="bg-white shadow-md border border-gray-200 p-6 text-center hover:border-primary transition">
                    <div class="w-14 h-14 bg-primary/10 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-pen-nib text-primary text-xl"></i>
                    </div>
                    <p class="text-lg font-bold text-primary uppercase tracking-widest mb-1">Sekretaris / Direktur Eksekutif</p>
                    <h4 class="font-extrabold text-lg">Naomi Marasian, SE</h4>
                </div>
                <div class="bg-white shadow-md border border-gray-200 p-6 text-center hover:border-primary transition">
                    <div class="w-14 h-14 bg-primary/10 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-wallet text-primary text-xl"></i>
                    </div>
                    <p class="text-lg font-bold text-primary uppercase tracking-widest mb-1">Bendahara</p>
                    <h4 class="font-extrabold text-lg">Dominggas Nari</h4>
                </div>
            </div>

            {{-- Anggota --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
                @foreach ([
                    ['nama' => 'Ketrina Yabansabra', 'gender' => 'Perempuan'],
                    ['nama' => 'Johanes Wob', 'gender' => 'Laki-laki'],
                    ['nama' => 'Frengky Saa', 'gender' => 'Laki-laki'],
                ] as $anggota)
                    <div class="bg-white shadow-md border border-gray-200 p-5 text-center hover:border-primary transition">
                        <div class="w-12 h-12 bg-primary/10 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-user text-primary text-lg"></i>
                        </div>
                        <p class="text-lg font-bold text-primary uppercase tracking-widest mb-1">Anggota</p>
                        <h4 class="font-bold text-lg">{{ $anggota['nama'] }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tim Pelaksana (Staff) --}}
    <section id="staff" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <p class="text-primary font-bold uppercase tracking-widest text-lg mb-2">Staff</p>
                <h3 class="text-3xl font-extrabold">Tim Pelaksana</h3>
                <div class="w-16 h-1 bg-primary mx-auto mt-3"></div>
            </div>

            {{-- Direktur Eksekutif --}}
            <div class="max-w-sm mx-auto mb-10">
                <div class="bg-white shadow-xl border-t-4 border-secondary p-8 text-center">
                    <div class="w-20 h-20 bg-secondary/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-secondary text-3xl"></i>
                    </div>
                    <p class="text-lg font-bold text-secondary uppercase tracking-widest mb-1">Direktur Eksekutif</p>
                    <h4 class="font-extrabold text-xl">Naomi Marasian</h4>
                </div>
            </div>

            {{-- Program Officers --}}
            <div class="text-center mb-6">
                <p class="text-primary font-bold uppercase tracking-widest text-lg mb-2">Program Officers</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto mb-12">
                @foreach ([
                    ['nama' => 'Jacson Umbora', 'posisi' => 'Bidang PMA', 'icon' => 'fa-map-location-dot'],
                    ['nama' => 'Niko Wamafma', 'posisi' => 'Bidang KPP', 'icon' => 'fa-scale-balanced'],
                    ['nama' => 'Marselina Wamebu', 'posisi' => 'Bidang PPA', 'icon' => 'fa-users-gear'],
                    ['nama' => 'Daniel Bairam', 'posisi' => 'Bidang PEMA', 'icon' => 'fa-seedling'],
                ] as $po)
                    <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md hover:border-primary transition">
                        <div class="bg-primary px-5 py-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 flex items-center justify-center flex-shrink-0">
                                <i class="fas {{ $po['icon'] }} text-white"></i>
                            </div>
                            <h4 class="font-extrabold text-white text-lg uppercase leading-tight">{{ $po['posisi'] }}</h4>
                        </div>
                        <div class="px-5 py-4 text-center">
                            <p class="font-semibold text-gray-800 text-lg">{{ $po['nama'] }}</p>
                            <p class="text-lg text-gray-500 mt-1">Program Officer</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Supporting Staff --}}
            <div class="text-center mb-6">
                <p class="text-primary font-bold uppercase tracking-widest text-lg mb-2">Staf Pendukung & Lapangan</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">
                @foreach ([
                    ['nama' => 'Jahya Lorenz', 'posisi' => 'Kabid Data, Media & Informasi'],
                    ['nama' => 'Habel Samon', 'posisi' => 'Office Manager / HRD'],
                    ['nama' => 'Lince Ebe', 'posisi' => 'Finance Manager'],
                    ['nama' => 'Tantri Ninofur', 'posisi' => 'Finance - Kasir'],
                    ['nama' => 'Muscorry Kenakaimu', 'posisi' => 'Field Staff di Mappi'],
                    ['nama' => 'Obeth Farwas', 'posisi' => 'Field Staff Pengembangan Ekonomi'],
                    ['nama' => 'Offni Sibetay', 'posisi' => 'Staff Bidang Pemetaan / GIS'],
                    ['nama' => 'Benny Marani', 'posisi' => 'Staff Kajian Sosbud & Ekonomi'],
                    ['nama' => 'Helena Sarakan', 'posisi' => 'Staff Perencanaan & Pengembangan MA'],
                    ['nama' => 'Noach Yanggu', 'posisi' => 'Logistik & Driver'],
                ] as $staff)
                    <div class="bg-gray-50 border border-gray-200 p-4 text-center hover:border-primary hover:bg-white transition">
                        <div class="w-10 h-10 bg-primary/10 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <p class="font-semibold text-lg leading-snug">{{ $staff['nama'] }}</p>
                        <p class="text-lg text-gray-500 mt-1">{{ $staff['posisi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
