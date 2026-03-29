@extends('layouts.visitor')
@section('title', ($kategoriAktif ? $kategoriAktif->nama . ' - Berita' : 'Blog'))
@section('seo-title', ($kategoriAktif ? 'Berita ' . $kategoriAktif->nama : 'Blog — Berita & Artikel'))
@section('seo-description', ($kategoriAktif ? 'Berita kategori ' . $kategoriAktif->nama : 'Kumpulan berita dan artikel terbaru') . ' dari ' . ($situs['nama_situs'] ?? 'PPMA Papua'))

@section('json-ld')
@php
$breadcrumb = [['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')]];
if ($kategoriAktif) {
    $breadcrumb[] = ['@type'=>'ListItem','position'=>2,'name'=>'Blog','item'=>route('berita')];
    $breadcrumb[] = ['@type'=>'ListItem','position'=>3,'name'=>$kategoriAktif->nama];
} else {
    $breadcrumb[] = ['@type'=>'ListItem','position'=>2,'name'=>'Blog'];
}
@endphp
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>$breadcrumb], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a>
                &rsaquo;
                @if ($kategoriAktif)
                    <a href="{{ route('berita') }}" class="hover:text-white">Blog</a> &rsaquo; {{ $kategoriAktif->nama }}
                @else
                    Blog
                @endif
            </span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">
                {{ $kategoriAktif ? 'Berita: ' . $kategoriAktif->nama : 'Blog' }}
            </h1>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                {{-- Sidebar (Kiri, Sticky) --}}
                <div class="space-y-6 order-2 lg:order-1 lg:sticky lg:top-24 lg:self-start">
                    <div class="bg-neutral-50 p-6 rounded-lg">
                        <h4 class="font-display font-bold text-lg uppercase mb-4 pb-3 border-b-2 border-secondary">Cari Berita</h4>
                        <form method="GET" action="{{ $kategoriAktif ? route('berita.kategori', $kategoriAktif->slug) : route('berita') }}">
                            <div class="relative">
                                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari berita..."
                                       class="w-full border border-neutral-300 p-3 pr-10 text-lg focus:border-secondary focus:outline-none transition">
                                <button type="submit" class="absolute right-0 top-0 h-full px-3 text-neutral-400 hover:text-secondary transition">
                                    <i class="fa-solid fa-search text-lg"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="bg-neutral-50 p-6 rounded-lg">
                        <h4 class="font-display font-bold text-lg uppercase mb-4 pb-3 border-b-2 border-secondary">Kategori</h4>
                        <ul class="space-y-1">
                            @foreach ($kategoriList as $kat)
                                @if ($kat->slug)
                                    <li>
                                        <a href="{{ route('berita.kategori', $kat->slug) }}"
                                           class="flex justify-between items-center py-2 text-lg hover:text-secondary transition {{ $kategoriAktif && $kategoriAktif->id === $kat->id ? 'text-secondary font-semibold' : 'text-neutral-600' }}">
                                            <span>{{ $kat->nama }}</span>
                                            <span class="bg-neutral-200 text-neutral-600 text-lg px-2 py-0.5 font-bold">{{ $kat->berita_count }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ route('berita') }}"
                       class="{{ !$kategoriAktif ? 'bg-secondary' : 'bg-neutral-800' }} text-white p-4 block hover:bg-secondary transition text-center">
                        <span class="font-semibold text-lg uppercase">Semua Berita</span>
                    </a>
                </div>

                {{-- Main Content (Kanan) --}}
                <div class="lg:col-span-3 order-1 lg:order-2">
                    @if (request('cari'))
                        <div class="mb-6 flex items-center gap-3 text-lg text-neutral-500">
                            <span>Hasil pencarian: <strong class="text-neutral-900">"{{ request('cari') }}"</strong></span>
                            <a href="{{ $kategoriAktif ? route('berita.kategori', $kategoriAktif->slug) : route('berita') }}" class="text-secondary hover:underline text-lg">
                                <i class="fa-solid fa-times mr-1"></i>Hapus
                            </a>
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse ($beritaList as $b)
                            <a href="{{ route('berita.detail', $b->slug) }}" class="bg-white shadow-card card-hover border border-neutral-100 fade-in cursor-pointer block">
                                <img src="{{ $b->gambar }}" class="w-full aspect-[5/4] object-cover" alt="{{ $b->judul }}">
                                <div class="p-5">
                                    <div class="flex items-center gap-2 text-lg text-neutral-400 mb-2">
                                        <span class="text-secondary font-semibold">{{ $b->kategori?->nama ?? 'Berita' }}</span>
                                        <span>&bull;</span>
                                        <span>{{ $b->tanggal_terbit?->translatedFormat('d M Y') }}</span>
                                    </div>
                                    <h4 class="font-display font-bold text-neutral-900 line-clamp-2">{{ $b->judul }}</h4>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full text-center py-12 text-neutral-400">
                                <i class="fa-solid fa-newspaper text-4xl mb-3 block"></i>
                                <p>Belum ada berita.</p>
                            </div>
                        @endforelse
                    </div>
                    @if ($beritaList->hasPages())
                        <div class="mt-8">{{ $beritaList->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
