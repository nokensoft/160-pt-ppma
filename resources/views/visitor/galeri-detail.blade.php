@extends('layouts.visitor')
@section('title', $galeri->judul . ' - Galeri - ' . ($situs['nama_situs'] ?? 'PPMA Papua'))
@section('seo-title', $galeri->judul . ' - Galeri Foto')
@section('seo-description', $galeri->deskripsi ?: 'Album galeri foto ' . $galeri->judul)
@if ($galeri->media->first())
    @section('seo-image', $galeri->media->first()->tipe === 'video' ? 'https://img.youtube.com/vi/' . $galeri->media->first()->file_name . '/hqdefault.jpg' : asset('storage/' . $galeri->media->first()->file_path))
@endif

@section('json-ld')
@php
$_bc = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],
    ['@type'=>'ListItem','position'=>2,'name'=>'Galeri','item'=>route('galeri')],
    ['@type'=>'ListItem','position'=>3,'name'=>$galeri->judul],
]];
$_ig = ['@context'=>'https://schema.org','@type'=>'ImageGallery','name'=>$galeri->judul,'description'=>$galeri->deskripsi ?? 'Album galeri foto '.$galeri->judul,'url'=>route('galeri.detail',$galeri->slug),'numberOfItems'=>$galeri->media->count()];
$_f = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_bc, $_f) !!}</script>
<script type="application/ld+json">{!! json_encode($_ig, $_f) !!}</script>
@endsection

@section('content')
    @include('partials.page-banner', [
        'title' => $galeri->judul,
        'breadcrumb' => '<a href="' . route('galeri') . '" class="hover:text-white transition">Galeri</a> / ' . $galeri->judul,
        'rightAction' => '<a href="' . route('galeri') . '" class="inline-flex items-center gap-2 text-white hover:text-primary transition font-semibold"><i class="fas fa-arrow-left"></i>Kembali</a>'
    ])

    <section class="py-20 bg-white" x-data="galeriLightbox()">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="mb-10">
                @php
                    $fotoCount = $galeri->media->where('tipe', 'foto')->count();
                    $videoCount = $galeri->media->where('tipe', 'video')->count();
                @endphp
                <div class="rounded-none border border-gray-200 bg-gray-50 p-5 md:p-6">
                    <h3 class="text-3xl font-extrabold text-dark">{{ $galeri->judul }}</h3>
                    @if ($galeri->deskripsi)
                        <p class="text-gray-500 mt-3">{{ $galeri->deskripsi }}</p>
                    @endif
                    <div class="mt-4 flex flex-wrap items-center gap-3">
                        <span class="inline-flex items-center gap-2 bg-primary/10 text-primary text-sm md:text-base font-bold px-3 py-1.5 rounded-none">
                            <i class="fas fa-image"></i>{{ $fotoCount }} Foto
                        </span>
                        @if ($videoCount > 0)
                            <span class="inline-flex items-center gap-2 bg-red-50 text-red-600 text-sm md:text-base font-semibold px-3 py-1.5 rounded-none">
                                <i class="fab fa-youtube"></i>{{ $videoCount }} Video
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Media Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse ($galeri->media as $index => $m)
                    @if ($m->tipe === 'video')
                        <div @click="open({{ $index }})"
                             class="relative group overflow-hidden rounded-none cursor-pointer aspect-[4/3]">
                            <img src="https://img.youtube.com/vi/{{ $m->file_name }}/hqdefault.jpg"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                 alt="{{ $galeri->judul }} - Video {{ $index + 1 }}">
                            <div class="absolute inset-0 bg-dark/0 group-hover:bg-dark/50 transition flex items-center justify-center">
                                <span class="bg-red-600/90 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                                    <i class="fas fa-play text-lg ml-0.5"></i>
                                </span>
                            </div>
                            <span class="absolute bottom-2 left-2 bg-red-600 text-white text-sm font-bold px-2 py-0.5 rounded-none">
                                <i class="fab fa-youtube mr-1"></i>Video
                            </span>
                        </div>
                    @else
                        <div @click="open({{ $index }})"
                             class="relative group overflow-hidden rounded-none cursor-pointer aspect-[4/3] bg-gray-100">
                            <img src="{{ asset('storage/' . $m->file_path) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                 alt="{{ $galeri->judul }} - Foto {{ $index + 1 }}"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x400'">
                            <div class="absolute inset-0 bg-dark/0 group-hover:bg-dark/50 transition flex items-center justify-center">
                                <i class="fas fa-search-plus text-white text-xl opacity-0 group-hover:opacity-100 transition"></i>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-span-full text-center py-16 text-gray-400">
                        <i class="fas fa-image text-5xl mb-4 block"></i>
                        <p class="text-lg">Belum ada media di album ini.</p>
                    </div>
                @endforelse
            </div>
            

            <!-- Share Buttons -->
            <div class="mt-8 flex flex-wrap gap-3" x-data="{ copied: false }">
                <button @click="navigator.clipboard.writeText('{{ route('galeri.detail', $galeri->slug) }}'); copied = true; setTimeout(() => copied = false, 2000)"
                        class="flex items-center gap-2 px-3 py-2 border border-gray-300 text-gray-600 hover:border-primary hover:text-primary transition text-sm font-semibold rounded-none">
                    <i class="fas text-xs" :class="copied ? 'fa-check' : 'fa-link'"></i>
                    <span x-text="copied ? 'Tersalin!' : 'Salin URL'"></span>
                </button>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('galeri.detail', $galeri->slug)) }}&text={{ urlencode($galeri->judul) }}" target="_blank"
                   class="flex items-center gap-2 px-3 py-2 bg-black text-white hover:bg-gray-800 transition text-sm font-semibold rounded-none">
                    <i class="fab fa-x-twitter text-xs"></i> Post
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('galeri.detail', $galeri->slug)) }}" target="_blank"
                   class="flex items-center gap-2 px-3 py-2 bg-blue-600 text-white hover:bg-blue-700 transition text-sm font-semibold rounded-none">
                    <i class="fab fa-facebook-f text-xs"></i> Share
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('galeri.detail', $galeri->slug)) }}" target="_blank"
                   class="flex items-center gap-2 px-3 py-2 bg-sky-700 text-white hover:bg-sky-800 transition text-sm font-semibold rounded-none">
                    <i class="fab fa-linkedin-in text-xs"></i> LinkedIn
                </a>
            </div>

        </div>

        <!-- Lightbox with Navigation -->
        <div x-show="isOpen" x-transition.opacity x-cloak
             class="fixed inset-0 bg-black/95 z-50 flex items-center justify-center"
             @keydown.escape.window="close()" @keydown.left.window="prev()" @keydown.right.window="next()">

            <button @click="close()" class="absolute top-6 right-6 text-white/70 hover:text-white text-3xl transition z-10">
                <i class="fas fa-times"></i>
            </button>

            <!-- Counter -->
            <div class="absolute top-6 left-6 text-white/70 text-lg font-medium">
                <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
            </div>

            <!-- Prev -->
            <button @click="prev()" x-show="images.length > 1"
                    class="absolute left-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white text-3xl transition z-10">
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Content -->
            <div class="max-w-5xl w-full text-center px-16" @click.self="close()">
                <template x-if="items[currentIndex] && items[currentIndex].type === 'video'">
                    <div>
                        <div class="aspect-video max-w-4xl mx-auto">
                            <iframe :src="isOpen ? 'https://www.youtube.com/embed/' + items[currentIndex].ytId + '?autoplay=1' : ''" class="w-full h-full rounded shadow-2xl" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <p class="text-white/80 mt-4 text-lg font-medium" x-text="caption + ' — Video ' + (currentIndex + 1)"></p>
                    </div>
                </template>
                <template x-if="!items[currentIndex] || items[currentIndex].type === 'foto'">
                    <div>
                        <img :src="items[currentIndex] ? items[currentIndex].src : ''" class="max-w-full max-h-[80vh] mx-auto shadow-2xl rounded" :alt="caption">
                        <p class="text-white/80 mt-4 text-lg font-medium" x-text="caption + ' — Foto ' + (currentIndex + 1)"></p>
                    </div>
                </template>
            </div>

            <!-- Next -->
            <button @click="next()" x-show="images.length > 1"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white text-3xl transition z-10">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <script>
        function galeriLightbox() {
            return {
                isOpen: false,
                currentIndex: 0,
                caption: @js($galeri->judul),
                items: @js($galeri->media->map(fn ($m) => [
                    'type' => $m->tipe,
                    'src' => $m->tipe === 'video' ? 'https://img.youtube.com/vi/' . $m->file_name . '/hqdefault.jpg' : asset('storage/' . $m->file_path),
                    'ytId' => $m->tipe === 'video' ? $m->file_name : null,
                ])->values()),
                open(index) {
                    this.currentIndex = index;
                    this.isOpen = true;
                },
                close() {
                    this.isOpen = false;
                },
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.items.length;
                },
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
                }
            }
        }
    </script>
@endsection
