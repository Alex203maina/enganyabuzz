@extends('layout.home')

@section('trip-show')

<section class="trip-section" id="trip-section">
    @foreach($trips as $trip)
        <div class="trip-info">
            <div class="trip-image">
                <img src="{{ asset('storage/' . $trip->background_photo) }}" alt="Trip Image">
            </div>
            <div class="trip-details">
                <h3>{{ $trip->route }}</h3>
                <p class="subheading">Ride the Nganya Adventure!</p>
                <p class="slot-num">{{ $trip->slots_left }} Slots left</p>
                <p class="description">{{ Str::limit($trip->description, 150) }}</p>
                <div class="trip-footer">
                    <span class="amount">KSH {{ number_format($trip->pricing) }}</span>
                    <a href="{{ route('booking-form', ['id' => $trip->id]) }}" class="book-btn">BOOK NOW</a>
                    </div>
            </div>
        </div>
    @endforeach
</section>

@endsection
