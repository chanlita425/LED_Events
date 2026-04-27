@extends('frontend.layouts.main')

@section('content')
    <!-- HERO -->
    <div class="relative h-[60vh] flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ Storage::url($project->image) }}');">

        <div class="absolute inset-0 bg-black/60"></div>

        <h1 class="relative z-10 text-white text-4xl font-bold text-center px-4 capitalize">
            {{ $project->title_en }}
        </h1>

    </div>

    <!-- CONTENT -->
    <div class="max-w-4xl mx-auto py-20 text-white px-5">

        @foreach (explode("\n", $project->description_en) as $line)
            @if (trim($line))
                <p class="text-gray-300 text-lg leading-relaxed mb-4">
                    {{ $line }}
                </p>
            @endif
        @endforeach

    </div>
@endsection
