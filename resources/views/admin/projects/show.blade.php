@extends('layouts.app')

@section('title')
    | {{ $project->name }}
@endsection

@section('content')
    <div class="container show-wrapper">
        <div class="row d-flex h-100 mt-5">
            <div class="col-5 img-area">
                @if ($project->cover_image)
                    <div>
                        <img src="{{ asset('storage/' . $project->cover_image) }}"
                            alt="{{ $project->cover_image_original_name }}">
                    </div>
                @endif

            </div>
            <div class="col-7">
                <div class="text-area">
                    <h2>{{ $project->name }}</h2>

                    {{-- STAMPO IL TIPO DI PROGETTO SOLO SE C'È --}}
                    @if ($project->type)
                        <p class="badge text-bg-info">{{ $project->type->name }}</p>
                    @endif

                    {{-- STAMPO LA TECNOLOGIA USATA SOLO SE C'È --}}
                    @if ($project->technologies)
                        <div>
                            @foreach ($project->technologies as $technology)
                                <p class="badge text-bg-warning">{{ $technology->name }}</p>
                            @endforeach
                        </div>
                    @endif

                    <p><strong>Client Name:</strong> {{ $project->client_name }}</p>
                    <p><strong>Summary:</strong> {{ $project->summary }}</p>
                </div>
                <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Torna all'elenco</a>
            </div>
        </div>
    </div>
@endsection
