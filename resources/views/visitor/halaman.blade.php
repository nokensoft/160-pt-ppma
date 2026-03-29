@extends('layouts.visitor')
@section('title', $halaman->judul)
@section('seo-title', $halaman->judul)
@section('seo-description', $halaman->keterangan ?? '')
@php
    // Ekstrak gambar pertama dari konten HTML sebagai cover OG
    $_halamanImg = null;
    if (preg_match('/<img[^>]+src=["\']([^"\'>]+)["\']/', $halaman->konten ?? '', $_m)) {
        $_halamanImg = $_m[1];
        if (!str_starts_with($_halamanImg, 'http')) {
            $_halamanImg = asset($_halamanImg);
        }
    }
@endphp
@if ($_halamanImg)
    @section('seo-image', $_halamanImg)
@endif

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>$halaman->judul]]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    {{-- Breadcrumb Header --}}
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> › {{ $halaman->judul }}
            </span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">{{ $halaman->judul }}</h1>
            @if ($halaman->keterangan)
                <p class="text-white/70 mt-2 text-lg">{{ $halaman->keterangan }}</p>
            @endif
        </div>
    </div>

    {{-- Konten Halaman --}}
    {!! $halaman->konten !!}
@endsection
