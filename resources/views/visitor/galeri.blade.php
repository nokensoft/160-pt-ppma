@extends('layouts.visitor')
@section('title', 'Galeri - ' . ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-title', 'Galeri Foto - ' . ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-description', 'Dokumentasi kegiatan dan galeri foto ' . ($situs['nama_situs'] ?? 'PPMA Papua'))

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Galeri']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a>
                &rsaquo;
                Galeri
            </span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">
                Galeri Kegiatan
            </h1>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Search (Melebar, Center) --}}
            <div class="max-w-xl mx-auto mb-10">
                <form method="GET" action="{{ route('galeri') }}">
                    <div class="relative">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari album galeri..."
                               class="w-full border border-neutral-300 p-3 pl-12 pr-4 text-lg focus:border-secondary focus:outline-none transition">
                        <button type="submit" class="absolute left-0 top-0 h-full px-4 text-neutral-400 hover:text-secondary transition">
                            <i class="fa-solid fa-search text-lg"></i>
                        </button>
                    </div>
                </form>
                @if (request('cari'))
                    <div class="mt-3 flex items-center justify-center gap-3 text-lg text-neutral-500">
                        <span>Hasil pencarian: <strong class="text-neutral-900">"{{ request('cari') }}"</strong></span>
                        <a href="{{ route('galeri') }}" class="text-secondary hover:underline text-lg">
                            <i class="fa-solid fa-times mr-1"></i>Hapus
                        </a>
                    </div>
                @endif
            </div>

            {{-- Album Grid (3 Kolom) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($galeriList as $album)
                    @php
                        $cover = $album->media->first();
                        if ($cover && $cover->tipe === 'video') {
                            $coverUrl = 'https://img.youtube.com/vi/' . $cover->file_name . '/hqdefault.jpg';
                        } elseif ($cover) {
                            $coverUrl = asset('storage/' . $cover->file_path);
                        } else {
                            $coverUrl = 'https://placehold.co/600x400';
                        }
                    @endphp
                    <a href="{{ route('galeri.detail', $album->slug) }}"
                       class="group bg-white shadow-card card-hover border border-neutral-100 rounded-none overflow-hidden fade-in">
                        <div class="relative overflow-hidden">
                            <img src="{{ $coverUrl }}" alt="{{ $album->judul }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400'">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition flex items-center justify-center">
                                <i class="fa-solid fa-images text-white text-2xl opacity-0 group-hover:opacity-100 transition"></i>
                            </div>
                            <span class="absolute top-3 right-3 bg-black/60 text-white text-lg font-bold px-2 py-0.5">
                                <i class="fa-solid fa-image mr-1"></i>{{ $album->media_count }}
                            </span>
                        </div>
                        <div class="p-4">
                            <h4 class="font-display font-bold text-neutral-900 group-hover:text-secondary transition line-clamp-2">{{ $album->judul }}</h4>
                            @if ($album->deskripsi)
                                <p class="text-neutral-500 text-lg mt-1 line-clamp-2">{{ $album->deskripsi }}</p>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16 text-neutral-400">
                        <i class="fa-solid fa-images text-5xl mb-4 block"></i>
                        <p class="text-lg">Belum ada album di galeri.</p>
                    </div>
                @endforelse
            </div>

            @if ($galeriList->hasPages())
                <div class="mt-8">{{ $galeriList->links() }}</div>
            @endif
        </div>
    </section>
@endsection
