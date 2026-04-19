<section class="page-banner relative py-24 bg-neutral-900 overflow-hidden">
    <img src="https://placehold.co/1920x600" class="absolute inset-0 w-full h-full object-cover opacity-20" alt="">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <h2 class="text-3xl lg:text-5xl font-extrabold text-white uppercase">{{ $title }}</h2>
        <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center text-lg text-gray-400 space-x-2">
                <a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a>
                <span>/</span>
                <span class="text-primary">{!! $breadcrumb ?? e($title) !!}</span>
            </div>
            @if (!empty($rightAction))
                <div class="text-sm md:text-base">
                    {!! $rightAction !!}
                </div>
            @endif
        </div>
    </div>
</section>
