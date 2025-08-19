<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Home')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/iice.png') }}" rel="IICE Logo">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
            <img src="{{ asset('img/iice.png') }}" alt="IICE Logo" style="height:50px;">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                
                <!-- Homepage -->
                <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                
                <!-- Members -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Members</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('fellow') }}" class="dropdown-item">Fellow</a>
                        <a href="{{ url('associate') }}" class="dropdown-item">Associate</a>
                        <a href="{{ url('postdoctoral') }}" class="dropdown-item">Postdoctoral</a>
                        <a href="{{ url('postgraduate') }}" class="dropdown-item">Postgraduate</a>
                    </div>
                </div>
                
                <!-- Research -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Research</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('researcharea') }}" class="dropdown-item">Research Area</a>
                        <a href="{{ url('researchproject') }}" class="dropdown-item">Research Project</a>
                        <a href="{{ url('consultancy') }}" class="dropdown-item">Consultancy</a>
                        <a href="{{ url('researchprofile') }}" class="dropdown-item">IICE Research Profile</a>
                    </div>
                </div>
                
                <!-- Training -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Training</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('trainingcategory') }}" class="dropdown-item">Category</a>
                        <a href="{{ url('trainerprofile') }}" class="dropdown-item">Trainer Profile</a>
                    </div>
                </div>
                
                <!-- Activity -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Activity</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('chairactivity') }}" class="dropdown-item">Chair in EI</a>
                        <a href="{{ url('staffactivity') }}" class="dropdown-item">Staff</a>
                        <a href="{{ url('studentactivity') }}" class="dropdown-item">Student</a>
                    </div>
                </div>

                <!-- Chair in EI (keep only if you want as main menu) -->
                <a href="{{ url('chairinei') }}" class="nav-item nav-link {{ Request::is('chairinei') ? 'active' : '' }}">Chair in EI</a>
                
                <!-- About -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('aboutiice') }}" class="dropdown-item">About</a>
                        <a href="{{ url('linkages') }}" class="dropdown-item">Linkages</a>
                        <a href="{{ url('fundproviders') }}" class="dropdown-item">Fund Providers</a>
                        <a href="{{ url('publication') }}" class="dropdown-item">Publication</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Profile Picture (Admin Login) -->
        <div class="d-flex align-items-center ms-lg-3">
            <a href="{{ url('adminlogin') }}">
                <img src="{{ asset('img/profilepic.jpg') }}" alt="Admin Login" 
                    style="width:40px; height:40px; border-radius:50%; object-fit:cover; cursor:pointer;">
            </a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Main Content -->
    @yield('content')

    <!-- Footer Start (Full-Width) -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row g-5 px-5"> <!-- Added px-5 for inner padding -->
            
            <!-- Office Address -->
            <div class="col-lg-5 col-md-6">
                <h4 class="text-light mb-4">Office Address</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Institute of Informatics and Computing in Energy,<br>
                    Universiti Tenaga Nasional,<br>
                    Jalan IKRAM-UNITEN,<br>
                    43000 Kajang,<br>
                    Selangor, Malaysia</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6 (0) 3 8921 7370 (Director)</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>iice@uniten.edu.my</p>

                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6 ms-auto">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="{{ url('aboutiice') }}">About Us</a>
                <a class="btn btn-link" href="{{ url('researcharea') }}">Research</a>
                <a class="btn btn-link" href="{{ url('publication') }}">Publications</a>
                <a class="btn btn-link" href="{{ url('linkages') }}">Linkages</a>
                <a class="btn btn-link" href="{{ url('chairinei') }}">Chair in EI</a>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start (Full-Width) -->
    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="row px-5"> <!-- Added px-5 for inner padding -->
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a href="{{ url('/') }}">IICE</a>, All Right Reserved.
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <!-- <a href="#" 
    class="btn btn-lg btn-primary rounded-circle back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up"></i>
    </a> -->

    <!-- Scripts Section -->
    @yield('scripts')
</body>

</html>