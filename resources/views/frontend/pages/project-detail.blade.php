@extends('frontend.layouts.main')

@section('content')

<!-- HERO -->
<div class="relative h-screen w-full flex items-center justify-center bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ Storage::url($project->image) }}');">

    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Title -->
    <div class="relative z-10 text-center px-6">
        <h1 class="text-white text-4xl md:text-6xl font-bold capitalize">
            {{ $project->title_en }}
        </h1>
    </div>

</div>

<!-- CONTENT -->
<div class="max-w-4xl mx-auto py-20 px-5">

    @foreach (explode("\n", $project->description_en) as $line)
        @if (trim($line))
            <p class="text-gray-300 text-lg leading-relaxed mb-4">
                {{ $line }}
            </p>
        @endif
    @endforeach

</div>

@endsection
