@extends('welcome')

@section('contents')
    <h1>Modifica Travel</h1>
    <form method="POST" action="{{ route('travels.update', ['travel' => $travel->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $travel->title) }}">
            <div class="invalid-feedback">
                @error('title') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data Viaggio</label>
            <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $travel->date) }}">
            <div class="invalid-feedback">
                @error('date') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $travel->address) }}">
            <div class="invalid-feedback">
                @error('address') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine Posto</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $travel->image) }}">
            <div class="invalid-feedback">
                @error('image') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Nazione</label>
            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $travel->country) }}">
            <div class="invalid-feedback">
                @error('country') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('text') is-invalid @enderror" id="text" name="text" value="{{ old('text', $travel->text) }}">
            <div class="invalid-feedback">
                @error('text') {{ $message }} @enderror
            </div>
        </div>
        <button class="btn btn-primary">Salva</button>
    </form>
@endsection