<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'NatureHub' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('fe/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('fe/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('fe/css/style.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

    {{-- Livewire CSS --}}
    @livewireStyles
</head>

<body>
    <!-- Navbar start -->
    <nav>
        <div class="container-fluid fixed-top px-0">
            <div class="container px-0">
                <div class="topbar">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-8">
                            <div class="topbar-info d-flex flex-wrap">
                                <a href="#" class="text-light me-4"><i
                                        class="fas fa-envelope text-white me-2"></i>Example@gmail.com</a>
                                <a href="#" class="text-light"><i
                                        class="fas fa-phone-alt text-white me-2"></i>+62</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="topbar-icon d-flex align-items-center justify-content-end">
                                <a href="#" class="btn-square text-white me-2"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" class="btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn-square text-white me-2"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="#" class="btn-square text-white me-2"><i
                                        class="fab fa-pinterest"></i></a>
                                <a href="#" class="btn-square text-white me-0"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-light bg-light navbar-expand-xl">
                    <a href="{{ route('home') }}" class="navbar-brand ms-3" wire:navigate.hover>
                        <h1 class="text-primary display-5">NatureHub</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                        <div class="navbar-nav ms-auto">
                            <a href="{{ route('home') }}"
                                class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}"
                                wire:navigate.hover>Home</a>
                            <a href="{{ route('about') }}"
                                class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}"
                                wire:navigate.hover>About</a>
                            <div class="nav-item dropdown">
                                <a href="#"
                                    class="nav-link dropdown-toggle {{ Route::is('articles*') ? 'active' : '' }}"
                                    data-bs-toggle="dropdown">Content</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{ route('articles') }}"
                                        class="dropdown-item {{ Route::is('articles*') ? 'active' : '' }}"
                                        wire:navigate.hover>Articles</a>
                                </div>
                            </div>
                            <a href="{{ route('contacts') }}"
                                class="nav-item nav-link {{ Route::is('contacts') ? 'active' : '' }}"
                                wire:navigate.hover>Contacts</a>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0" style="margin-left: 15px;">
                            <a href="{{ route('filament.dashboard.auth.login') }}"
                                class="btn-hover-bg btn btn-primary text-white py-2 px-4 me-3">Login</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    {{-- Content Start --}}
    {{ $slot }}
    {{-- Content End --}}

    <!-- Footer Start -->
    <footer>
        <div class="container-fluid footer bg-dark text-body py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="mb-4 text-white">Newsletter</h4>
                            <p class="mb-4">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor
                                sit
                                amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 bg-secondary w-100 py-3 ps-4 pe-5" type="text"
                                    placeholder="Enter your email">
                                <button type="button"
                                    class="btn-hover-bg btn btn-primary position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Our Services</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Ocean Turtle</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> White Tiger</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Social Ecology</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Loneliness</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Beauty of Life</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Present for You</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Volunteer</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Karen Dawson</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Jack Simmons</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Michael Linden</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Simon Green</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Natalie Channing</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Caroline Gerwig</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="mb-4 text-white">Our Gallery</h4>
                            <div class="row g-2">
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{ asset('fe/img/gallery-footer-1.jpg') }}" class="img-fluid w-100"
                                            alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{ asset('fe/img/gallery-footer-1.jpg') }}"
                                                data-lightbox="footerGallery-1" class="my-auto"><i
                                                    class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{ asset('fe/img/gallery-footer-2.jpg') }}" class="img-fluid w-100"
                                            alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{ asset('fe/img/gallery-footer-2.jpg') }}"
                                                data-lightbox="footerGallery-2" class="my-auto"><i
                                                    class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{ asset('fe/img/gallery-footer-3.jpg') }}" class="img-fluid w-100"
                                            alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{ asset('fe/img/gallery-footer-3.jpg') }}"
                                                data-lightbox="footerGallery-3" class="my-auto"><i
                                                    class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{ asset('fe/img/gallery-footer-4.jpg') }}" class="img-fluid w-100"
                                            alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{ asset('fe/img/gallery-footer-4.jpg') }}"
                                                data-lightbox="footerGallery-4" class="my-auto"><i
                                                    class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{ asset('fe/img/gallery-footer-5.jpg') }}" class="img-fluid w-100"
                                            alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{ asset('fe/img/gallery-footer-5.jpg') }}"
                                                data-lightbox="footerGallery-5" class="my-auto"><i
                                                    class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{ asset('fe/img/gallery-footer-6.jpg') }}" class="img-fluid w-100"
                                            alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{ asset('fe/img/gallery-footer-6.jpg') }}"
                                                data-lightbox="footerGallery-6" class="my-auto"><i
                                                    class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-4 text-center text-md-start mb-md-0">
                    <span class="text-body"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your
                            Site Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-4 text-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="btn-hover-color btn-square text-white me-2"><i
                                class="fab fa-pinterest"></i></a>
                        <a href="#" class="btn-hover-color btn-square text-white me-0"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-center text-md-end text-body">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a
                        class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('fe/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('fe/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('fe/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('fe/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('fe/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    {{-- Livewire JS --}}
    @livewireScripts
</body>

</html>
