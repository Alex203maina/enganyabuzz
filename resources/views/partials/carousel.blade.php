@extends('layout.home')

@section('carousel')
<style>#demo {
    position: relative;
}

.path {
    position: absolute;
    top: 50%; /* Center vertically */
    left: 50%;
    transform: translate(-50%, -50%); /* Center horizontally and vertically */
    z-index: 1000; /* Ensure it is above other elements */
    color: white; /* Text color */
    text-align: center;
    width: 50%;
    padding: 20px; /* Add padding for better spacing */
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent background for better readability */
    border-radius: 10px; /* Rounded corners */
}
@media screen and (max-width: 650px) {
    path {
      width: 100%;
    }
  }

.path h1 {
    font-size: 3rem; /* Adjust font size as needed */
    margin: 0;
    color:gold;
    font-weight: bold; /* Make the heading bold */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Add shadow for better readability */
}

.path p {
    font-size: 1.25rem; /* Increase font size for better readability */
    margin-top: 10px;
    line-height: 1.6; /* Increase line height for better readability */
}
</style>

<div id="demo" class="carousel slide" data-ride="carousel">
      <div class="path">
        <h1>Welcome to EnganyaBuzz!</h1>
        <p>Discover the best trips and experiences in Kenya. Explore our exclusive offers and start your adventure today!</p>
      </div>
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/img/fortune_1.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="overlay"></div>
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/image_1.jpg" alt="Chicago" width="1100" height="500">
      <div class="overlay"></div>
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/image_3.jpg" alt="New York" width="1100" height="500">
      <div class="overlay"></div>
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</section>



    <div class="space"> </div>

    @endsection
