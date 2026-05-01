@extends('frontend.layouts.main')

@section('content')
    <!-- HERO -->
    <div class="relative h-[60vh] flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ Storage::url($article->image) }}');">

        <div class="absolute inset-0 bg-black/60"></div>

        <h1 class="relative z-10 text-white text-4xl font-bold text-center px-4">
            {{ $article->title_en }}
        </h1>

    </div>

    <!-- CONTENT -->
    <div class="max-w-4xl mx-auto py-20 text-white px-5">

        @foreach (explode("\n", $article->description_en) as $line)
            @if (trim($line))
                <div class="prose max-w-none text-gray-300">
    {!! $article->description_en !!}
</div>
            @endif
        @endforeach

    </div>
@endsection
