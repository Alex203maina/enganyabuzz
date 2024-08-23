@extends('layout.home')

@section('content')

    <!-- carousel section -->
    <section id="carousel-section">
        @include('partials.carousel')
    </section>
    <!-- Trip Section -->
    <section id="trip-section">
        @include('main.trips-show')
    </section>

    <!-- About Us Section -->
    <section id="about-section">
        @include('main.about-us')
    </section>

   
    <!-- Gallery Section -->
    <section id="gallery-section">
        @include('main.gallery')
    </section>

    <!-- Contact Us Section -->
    <section id="contact-section">
        @include('main.contact')
    </section>
@endsection
