@extends('welcome')

@section('contents')
    <h1 class="text-center m-5">My Travels Diary</h1>

    <div class="container d-flex gap-5">
        @foreach ($travels as $travel)
            <div class="card">
                <img src="{{ $travel->image }}" alt="">

                <div class="card__content">
                    <p class="card__title">{{ $travel->title }}</p>
                    <p class="card__description">{{ $travel->date }}
                    </p>
                    <p class="card__description">{{ $travel->country }}
                    </p>
                    <p class="card__description">{{ $travel->address }}
                    </p>
                    <a class="btn
                        btn-primary"
                        href="{{ route('travels.show', ['travel' => $travel->id]) }}">SHOW
                    </a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
