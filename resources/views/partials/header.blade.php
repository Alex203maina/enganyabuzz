<body>
    <section id="home">
        <div class="header">
            <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
                <div class="row">
                    <div class="logo">
                        <img src="../assets/img/logo12.jpeg" alt="E-nganya Buzz" />
                    </div>
                    <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+254798 630 435</a>
                            <span class="text-body">|</span>
                            <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>alex203maina@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-body px-3" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-body px-3" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-body px-3" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-body px-3" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-body pl-3" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navbar for Small Screens -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none">
                <div class="container">
                    <p class="navbar-brand" href="#">ENGANYA BUZZ</p>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">ABOUT US</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('destination') }}">DESTINATION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gallery') }}">GALLERY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">CONTACT US</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Navbar for Large Screens -->
            <ul class="menu d-none d-lg-flex">
                <li><h1>ENGANYA BUZZ</h1></li>
                <li><a href="{{ route('home') }}">HOME</a></li>
                <li><a href="{{ route('about') }}">ABOUT US</a></li>
                <li><a href="{{ route('destination') }}">DESTINATION</a></li>
                <li><a href="{{ route('gallery') }}">GALLERY</a></li>
                <li><a href="{{ route('contact') }}">CONTACT US</a></li>
            </ul>
        </div>
    </section>

    <!-- Add Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
