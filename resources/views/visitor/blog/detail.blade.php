@extends('layouts.visitor')
@section('title', $berita->judul)
@section('seo-title', $berita->judul)
@section('seo-description', Str::limit(strip_tags($berita->ringkasan ?? $berita->konten), 160))
@section('seo-image', $berita->gambar)
@section('og-type', 'article')

@section('json-ld')
@php
$_article = [
    '@context' => 'https://schema.org',
    '@type' => 'NewsArticle',
    'headline' => $berita->judul,
    'description' => Str::limit(strip_tags($berita->ringkasan ?? $berita->konten), 160),
    'image' => $berita->gambar,
    'datePublished' => $berita->tanggal_terbit?->toW3cString(),
    'dateModified' => $berita->updated_at?->toW3cString(),
    'author' => ['@type' => 'Person', 'name' => $berita->user?->name ?? ($situs['nama_situs'] ?? 'PPMA Papua')],
    'publisher' => ['@type' => 'Organization', 'name' => $situs['nama_situs'] ?? 'PPMA Papua', 'logo' => ['@type' => 'ImageObject', 'url' => !empty($situs['logo']) ? asset('storage/'.$situs['logo']) : 'https://placehold.co/200x200']],
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => route('berita.detail', $berita->slug)],
    'articleSection' => $berita->kategori?->nama ?? 'Berita',
];
$_bc = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],
    ['@type'=>'ListItem','position'=>2,'name'=>'Blog','item'=>route('berita')],
    ['@type'=>'ListItem','position'=>3,'name'=>$berita->judul],
]];
$_f = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_article, $_f) !!}</script>
<script type="application/ld+json">{!! json_encode($_bc, $_f) !!}</script>
@endsection

@section('content')
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> ›
                <a href="{{ route('berita') }}" class="hover:text-white">Blog</a>
                @if ($berita->kategori) › {{ $berita->kategori->nama }} @endif
            </span>
            <h1 class="text-2xl md:text-3xl font-display font-bold text-white mt-3 leading-tight">{{ $berita->judul }}</h1>
            <p class="text-white/70 mt-2 text-lg">
                {{ $berita->tanggal_terbit?->translatedFormat('d M Y') }}
                @if ($berita->user) &middot; {{ $berita->user->name }} @endif
            </p>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                {{-- Sidebar (Kiri, Sticky) --}}
                <div class="order-2 lg:order-1 lg:sticky lg:top-24 lg:self-start">
                    <div class="bg-gray-50 p-6 mb-6 rounded-lg">
                        <h4 class="font-bold uppercase text-lg mb-4 pb-3 border-b-2 border-secondary">Cari Berita</h4>
                        <form method="GET" action="{{ route('berita') }}">
                            <div class="relative">
                                <input type="text" name="cari" placeholder="Cari berita..." class="w-full border border-gray-300 p-3 pr-12 text-lg focus:border-secondary focus:outline-none transition no-round">
                                <button type="submit" class="absolute right-0 top-0 h-full px-4 text-gray-400 hover:text-secondary transition">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="bg-gray-50 p-6 mb-6 rounded-lg">
                        <h4 class="font-bold uppercase text-lg mb-4 pb-3 border-b-2 border-secondary">Berita Lainnya</h4>
                        @forelse ($beritaLainnya as $bl)
                            <a href="{{ route('berita.detail', $bl->slug) }}" class="flex gap-3 py-3 border-b border-gray-200 hover:bg-white transition block">
                                <img src="{{ $bl->gambar }}" class="w-20 h-16 object-cover shrink-0" alt="{{ $bl->judul }}">
                                <div class="min-w-0">
                                    <h5 class="text-lg font-bold line-clamp-2">{{ $bl->judul }}</h5>
                                    <p class="text-lg text-gray-400 mt-1">{{ $bl->tanggal_terbit?->translatedFormat('d M Y') }}</p>
                                </div>
                            </a>
                        @empty
                            <p class="text-lg text-gray-400">Belum ada berita lainnya.</p>
                        @endforelse
                    </div>
                    <a href="{{ route('berita') }}"
                       class="bg-secondary text-white p-4 block hover:bg-secondary/90 transition text-center">
                        <span class="font-semibold text-lg uppercase">Semua Berita</span>
                    </a>
                </div>

                {{-- Main Content (Kanan) --}}
                <div class="lg:col-span-3 order-1 lg:order-2">
                    <div class="mb-6">
                        @if ($berita->kategori)
                            <span class="text-lg bg-secondary text-white px-3 py-1 font-bold uppercase">{{ $berita->kategori->nama }}</span>
                        @endif
                    </div>
                    <div class="mb-8 flex justify-center">
                        <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="w-[720px] shadow-lg object-cover">
                    </div>
                    <div class="prose max-w-none text-lg leading-relaxed text-justify">
                        {!! $berita->konten !!}
                    </div>
                    @if ($berita->sumber_nama)
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <p class="text-lg text-gray-500">
                                <i class="fas fa-link mr-1"></i> Sumber:
                                @if ($berita->sumber_link)
                                    <a href="{{ $berita->sumber_link }}" target="_blank" class="text-secondary hover:underline">{{ $berita->sumber_nama }}</a>
                                @else
                                    {{ $berita->sumber_nama }}
                                @endif
                            </p>
                        </div>
                    @endif

                    {{-- Share Buttons --}}
                    <div class="mt-8 pt-6 border-t border-gray-200" x-data="{ copied: false }">
                        <p class="text-lg font-bold uppercase text-gray-500 mb-3">Bagikan</p>
                        <div class="flex flex-wrap gap-3">
                            <button @click="navigator.clipboard.writeText('{{ route('berita.detail', $berita->slug) }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="flex items-center gap-2 px-4 py-2.5 border border-gray-300 text-gray-600 hover:border-secondary hover:text-secondary transition text-lg font-semibold">
                                <i class="fas" :class="copied ? 'fa-check' : 'fa-link'"></i>
                                <span x-text="copied ? 'Tersalin!' : 'Salin URL'"></span>
                            </button>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('berita.detail', $berita->slug)) }}&text={{ urlencode($berita->judul) }}" target="_blank"
                               class="flex items-center gap-2 px-4 py-2.5 bg-black text-white hover:bg-gray-800 transition text-lg font-semibold">
                                <i class="fab fa-x-twitter"></i> Post
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.detail', $berita->slug)) }}" target="_blank"
                               class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white hover:bg-blue-700 transition text-lg font-semibold">
                                <i class="fab fa-facebook-f"></i> Share
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('berita.detail', $berita->slug)) }}" target="_blank"
                               class="flex items-center gap-2 px-4 py-2.5 bg-sky-700 text-white hover:bg-sky-800 transition text-lg font-semibold">
                                <i class="fab fa-linkedin-in"></i> LinkedIn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
