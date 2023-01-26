@extends('layouts.app')

@section('title')
    | Create A Project
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Aggiungi un nuovo progetto al DB</h1>

        {{-- COMMENTO L'ALERT DEGLI ERRORI PERCHÈ NON MI PIACE, IN COMPENSO CI SONO GLI ERRORI SOTTO I CAMPI DI INPUT --}}

        {{-- @if ($errors->any())
                <div class="alert alert-danger p-2 mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('title') }}"
                    name="name" id="name" placeholder="Inserire il nome del progetto">
                @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <p for="technology" class="form-label">Tecnologie Usata:</p>
                @foreach ($technologies as $technology)
                    <input type="checkbox" id="{{ $technology->slug }}">
                    <label for="{{ $technology->slug }}" class="me-2">{{ $technology->name }}</label>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="client_name" class="form-label"">Nome del
                    cliente</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                    value="{{ old('client_name') }}" name="client_name" id="client_name"
                    placeholder="Inserire il nome del cliente">
                @error('client_name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Immagine</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror""
                    value="{{ old('cover_image') }}" name="cover_image" id="cover_image" placeholder="Inserire l'immagine">
                @error('cover_image')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Decrizione</label>
                <textarea rows="3" class="form-control" value="{{ old('summary') }}" name="summary" id="summary"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </form>
    </div>
@endsection
