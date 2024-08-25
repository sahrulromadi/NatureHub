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

    {{-- Livewire CSS --}}
    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    {{-- <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div> --}}
    <!-- Spinner End -->

    <!-- Navbar start -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <div class="topbar">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8">
                        <div class="topbar-info d-flex flex-wrap">
                            <a href="#" class="text-light me-4"><i
                                    class="fas fa-envelope text-white me-2"></i>Example@gmail.com</a>
                            <a href="#" class="text-light"><i
                                    class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="topbar-icon d-flex align-items-center justify-content-end">
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn-square text-white me-2"><i class="fab fa-pinterest"></i></a>
                            <a href="#" class="btn-square text-white me-0"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-light bg-light navbar-expand-xl">
                <a href="index.html" class="navbar-brand ms-3">
                    <h1 class="text-primary display-5">Environs</h1>
                </a>
                <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Services</a>
                        <a href="causes.html" class="nav-item nav-link">Causes</a>
                        <a href="events.html" class="nav-item nav-link">Events</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="blog.html" class="dropdown-item">Blog</a>
                                <a href="gallery.html" class="dropdown-item">Gallery</a>
                                <a href="volunteer.html" class="dropdown-item">Volunteers</a>
                                <a href="donation.html" class="dropdown-item">Donation</a>
                                <a href="404.html" class="dropdown-item">404 Error</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap pt-xl-0" style="margin-left: 15px;">
                        <a href="" class="btn-hover-bg btn btn-primary text-white py-2 px-4 me-3">Donate
                            Now</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid carousel-header vh-100 px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('fe/img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">WE'll Save
                                Our Planet</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                            <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('fe/img/carousel-2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">WE'll Save
                                Our Planet</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                            <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('fe/img/carousel-3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">WE'll Save
                                Our Planet</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                            <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            </p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->





    <!-- About Start -->
    <div class="container-fluid about  py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5">
                    <div class="h-100">
                        <img src="{{ asset('fe/img/about-1.jpg') }}" class="img-fluid w-100 h-100" alt="Image">
                    </div>
                </div>
                <div class="col-xl-7">
                    <h5 class="text-uppercase text-primary">About Us</h5>
                    <h1 class="mb-4">Our main goal is to protect environment</h1>
                    <p class="fs-5 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has
                    </p>
                    <div class="tab-class bg-secondary p-4">
                        <ul class="nav d-flex mb-2">
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 text-center bg-white active" data-bs-toggle="pill"
                                    href="#tab-1">
                                    <span class="text-dark" style="width: 150px;">About</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 mx-3 text-center bg-white" data-bs-toggle="pill"
                                    href="#tab-2">
                                    <span class="text-dark" style="width: 150px;">Mission</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 text-center bg-white" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 150px;">Vision</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Lorem Ipsum 1</h5>
                                                <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type and scrambled it to make a type specimen book. It has
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Lorem Ipsum 2</h5>
                                                <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type and scrambled it to make a type specimen book. It has
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade show p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="text-start my-auto">
                                                <h5 class="text-uppercase mb-3">Lorem Ipsum 3</h5>
                                                <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's standard
                                                    dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type and scrambled it to make a type specimen book. It has
                                                </p>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                        href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid service py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">What we do</h5>
                <h1 class="mb-0">What we do to protect environment</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item">
                        <img src="{{ asset('fe/img/service-1.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0">Raising money to help</a>
                        </div>
                    </div>
                    <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item">
                        <img src="{{ asset('fe/img/service-2.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0"> close work with services</a>
                        </div>
                    </div>
                    <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item">
                        <img src="{{ asset('fe/img/service-3.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0">Pro Guided tours only</a>
                        </div>
                    </div>
                    <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="service-item">
                        <img src="{{ asset('fe/img/service-4.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="service-link">
                            <a href="#" class="h4 mb-0">Protecting animal area</a>
                        </div>
                    </div>
                    <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center">
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Donation Start -->
    <div class="container-fluid donation py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Donation</h5>
                <h1 class="mb-0">Your money will save our life</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="donation-item">
                        <img src="{{ asset('fe/img/donation-1.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="donation-content d-flex flex-column">
                            <h5 class="text-uppercase text-primary mb-4">Organic</h5>
                            <a href="#" class="btn-hover-color display-6 text-white">Help Us More</a>
                            <h4 class="text-white mb-4">Protect Environments</h4>
                            <p class="text-white mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's</p>
                            <div class="donation-btn d-flex align-items-center justify-content-start">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Donate
                                    !</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="donation-item">
                        <img src="{{ asset('fe/img/service-2.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="donation-content d-flex flex-column">
                            <h5 class="text-uppercase text-primary mb-4">Ecosystem</h5>
                            <a href="#" class="btn-hover-color display-6 text-white">Help Us More</a>
                            <h4 class="text-white mb-4">Protect Environments</h4>
                            <p class="text-white mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's</p>
                            <div class="donation-btn d-flex align-items-center justify-content-start">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Donate
                                    !</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="donation-item">
                        <img src="{{ asset('fe/img/donation-3.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="donation-content d-flex flex-column">
                            <h5 class="text-uppercase text-primary mb-4">Recycling</h5>
                            <a href="#" class="btn-hover-color display-6 text-white">Help Us More</a>
                            <h4 class="text-white mb-4">Protect Environments</h4>
                            <p class="text-white mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's</p>
                            <div class="donation-btn d-flex align-items-center justify-content-start">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Donate
                                    !</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center">
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">All Donation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donation End -->


    <!-- Counter Start -->
    <div class="container-fluid counter py-5"
        style="background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, 0.4)), url(img/volunteers-bg.jpg')}}) center center; background-size: cover;">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Achievements</h5>
                <p class="text-white mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter-item text-center border p-5">
                        <i class="fas fa-thumbs-up fa-4x text-white"></i>
                        <h3 class="text-white my-4">Beavers Saved</h3>
                        <div class="counter-counting">
                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">3600</span>
                            <span class="h1 fw-bold text-primary">+</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter-item text-center border p-5">
                        <i class="fas fa-file-invoice-dollar fa-4x text-white"></i>
                        <h3 class="text-white my-4">Funds Collected</h3>
                        <div class="counter-counting text-center border-white w-100"
                            style="border-style: dotted; font-size: 30px;">
                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">513</span>
                            <span class="h1 fw-bold text-primary">$</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter-item text-center border p-5">
                        <i class="fas fa-user fa-4x text-white"></i>
                        <h3 class="text-white my-4">Volunteer</h3>
                        <div class="counter-counting text-center border-white w-100"
                            style="border-style: dotted; font-size: 30px;">
                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">713</span>
                            <span class="h1 fw-bold text-primary">+</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="counter-item text-center border p-5">
                        <i class="fas fa-heart fa-4x text-white"></i>
                        <h3 class="text-white my-4">Days of Help</h3>
                        <div class="counter-counting text-center border-white w-100"
                            style="border-style: dotted; font-size: 30px;">
                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">487</span>
                            <span class="h1 fw-bold text-primary">+</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center">
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Join With Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter End -->


    <!-- Causes Start -->
    <div class="container-fluid causes py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Recent Causes</h5>
                <h1 class="mb-4">The environment needs our protection</h1>
                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                    a galley
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-xl-3">
                    <div class="causes-item">
                        <div class="causes-img">
                            <img src="{{ asset('fe/img/causes-4.jpg') }}" class="img-fluid w-100" alt="Image">
                            <div class="causes-link pb-2 px-3">
                                <small class="text-white"><i class="fas fa-chart-bar text-primary me-2"></i>Goal:
                                    $3600</small>
                                <small class="text-white"><i class="fa fa-thumbs-up text-primary me-2"></i>Raised:
                                    $4000</small>
                            </div>
                            <div class="causes-dination p-2">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-3" href="#">Donate
                                    Now</a>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0"
                                aria-valuemax="100">
                                <span>65%</span>
                            </div>
                        </div>
                        <div class="causes-content p-4">
                            <h4 class="mb-3">First environments activity of</h4>
                            <p class="mb-4">Help today because tomorrow you may be the one who needs more helping!
                            </p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-3" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="causes-item">
                        <div class="causes-img">
                            <img src="{{ asset('fe/img/causes-2.jpg') }}" class="img-fluid w-100" alt="Image">
                            <div class="causes-link pb-2 px-3">
                                <small class="text-white"><i class="fas fa-chart-bar text-primary me-2"></i>Goal:
                                    $3600</small>
                                <small class="text-white"><i class="fa fa-thumbs-up text-primary me-2"></i>Raised:
                                    $4000</small>
                            </div>
                            <div class="causes-dination p-2">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-3" href="#">Donate
                                    Now</a>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">
                                <span>75%</span>
                            </div>
                        </div>
                        <div class="causes-content p-4">
                            <h4 class="mb-3">Build school for poor children.</h4>
                            <p class="mb-4">Help today because tomorrow you may be the one who needs more helping!
                            </p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="causes-item">
                        <div class="causes-img">
                            <img src="{{ asset('fe/img/causes-3.jpg') }}" class="img-fluid w-100" alt="Image">
                            <div class="causes-link pb-2 px-3">
                                <small class="text-white"><i class="fas fa-chart-bar text-primary me-2"></i>Goal:
                                    $3600</small>
                                <small class="text-white"><i class="fa fa-thumbs-up text-primary me-2"></i>Raised:
                                    $4000</small>
                            </div>
                            <div class="causes-dination p-2">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-3" href="#">Donate
                                    Now</a>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                aria-valuemax="100">
                                <span>85%</span>
                            </div>
                        </div>
                        <div class="causes-content p-4">
                            <h4 class="mb-3">Building clean-water system for rural poor.</h4>
                            <p class="mb-4">Help today because tomorrow you may be the one who needs more helping!
                            </p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="causes-item">
                        <div class="causes-img">
                            <img src="{{ asset('fe/img/causes-1.jpg') }}" class="img-fluid w-100" alt="Image">
                            <div class="causes-link pb-2 px-3">
                                <small class="text-white"><i class="fas fa-chart-bar text-primary me-2"></i>Goal:
                                    $3600</small>
                                <small class="text-white"><i class="fa fa-thumbs-up text-primary me-2"></i>Raised:
                                    $4000</small>
                            </div>
                            <div class="causes-dination p-2">
                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-3" href="#">Donate
                                    Now</a>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0"
                                aria-valuemax="100">
                                <span>95%</span>
                            </div>
                        </div>
                        <div class="causes-content p-4">
                            <h4 class="mb-3">First environments activity of this summer.</h4>
                            <p class="mb-4">Help today because tomorrow you may be the one who needs more helping!
                            </p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Causes End -->


    <!-- Events Start -->
    <div class="container-fluid event py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Upcoming Events</h5>
                <h1 class="mb-0">Help today because tomorrow you may be the one who needs more helping!</h1>
            </div>
            <div class="event-carousel owl-carousel">
                <div class="event-item">
                    <img src="{{ asset('fe/img/events-1.jpg') }}" class="img-fluid w-100" alt="Image">
                    <div class="event-content p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-body"><i class="fas fa-map-marker-alt me-2"></i>Grand Mahal, Dubai
                                2100.</span>
                            <span class="text-body"><i class="fas fa-calendar-alt me-2"></i>10 Feb, 2023</span>
                        </div>
                        <h4 class="mb-4">How To Build A Cleaning Plan</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div>
                <div class="event-item">
                    <img src="{{ asset('fe/img/events-2.jpg') }}" class="img-fluid w-100" alt="Image">
                    <div class="event-content p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-body"><i class="fas fa-map-marker-alt me-2"></i>Grand Mahal, Dubai
                                2100.</span>
                            <span class="text-body"><i class="fas fa-calendar-alt me-2"></i>10 Feb, 2023</span>
                        </div>
                        <h4 class="mb-4">How To Build A Cleaning Plan</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div>
                <div class="event-item">
                    <img src="{{ asset('fe/img/events-3.jpg') }}" class="img-fluid w-100" alt="Image">
                    <div class="event-content p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-body"><i class="fas fa-map-marker-alt me-2"></i>Grand Mahal, Dubai
                                2100.</span>
                            <span class="text-body"><i class="fas fa-calendar-alt me-2"></i>10 Feb, 2023</span>
                        </div>
                        <h4 class="mb-4">How To Build A Cleaning Plan</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div>
                <div class="event-item">
                    <img src="{{ asset('fe/img/events-4.jpg') }}" class="img-fluid w-100" alt="Image">
                    <div class="event-content p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-body"><i class="fas fa-map-marker-alt me-2"></i>Grand Mahal, Dubai
                                2100.</span>
                            <span class="text-body"><i class="fas fa-calendar-alt me-2"></i>10 Feb, 2023</span>
                        </div>
                        <h4 class="mb-4">How To Build A Cleaning Plan</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                            eiusmod tempor.</p>
                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events End -->

    <!-- Blog Start -->
    <div class="container-fluid blog py-5 mb-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Latest News</h5>
                <h1 class="mb-0">Help today because tomorrow you may be the one who needs more helping!
                </h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-xl-3">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('fe/img/blog-1.jpg') }}" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="search-icon">
                                <a href="{{ asset('fe/img/blog-1.jpg') }}" data-lightbox="Blog-1" class="my-auto"><i
                                        class="fas fa-search-plus btn-primary text-white p-3"></i></a>
                            </div>
                        </div>
                        <div class="text-dark border p-4 ">
                            <h4 class="mb-4">Save The Topic Forests</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip
                                sed eiusmod tempor.</p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('fe/img/blog-2.jpg') }}" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="search-icon">
                                <a href="{{ asset('fe/img/blog-2.jpg') }}" data-lightbox="Blog-2" class="my-auto"><i
                                        class="fas fa-search-plus btn-primary text-white p-3"></i></a>
                            </div>
                        </div>
                        <div class="text-dark border p-4 ">
                            <h4 class="mb-4">Save The Topic Forests</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip
                                sed eiusmod tempor.</p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('fe/img/blog-3.jpg') }}" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="search-icon">
                                <a href="{{ asset('fe/img/blog-3.jpg') }}" data-lightbox="Blog-3" class="my-auto"><i
                                        class="fas fa-search-plus btn-primary text-white p-3"></i></a>
                            </div>
                        </div>
                        <div class="text-dark border p-4 ">
                            <h4 class="mb-4">Save The Topic Forests</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip
                                sed eiusmod tempor.</p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset('fe/img/blog-4.jpg') }}" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="search-icon">
                                <a href="{{ asset('fe/img/blog-4.jpg') }}" data-lightbox="Blog-4" class="my-auto"><i
                                        class="fas fa-search-plus btn-primary text-white p-3"></i></a>
                            </div>
                        </div>
                        <div class="text-dark border p-4 ">
                            <h4 class="mb-4">Save The Topic Forests</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip
                                sed eiusmod tempor.</p>
                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Gallery Start -->
    <div class="container-fluid gallery py-5 px-0">
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h5 class="text-uppercase text-primary">Our work</h5>
            <h1 class="mb-4">We consider environment welfare</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed eiusmod
                tempor ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed eiusmod tempor.</p>
        </div>
        <div class="row g-0">
            <div class="col-lg-4">
                <div class="gallery-item">
                    <img src="{{ asset('fe/img/gallery-2.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('fe/img/gallery-2.jpg') }}" data-lightbox="gallery-2" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('fe/img/gallery-3.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('fe/img/gallery-3.jpg') }}" data-lightbox="gallery-3" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="gallery-item">
                    <img src="{{ asset('fe/img/gallery-1.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('fe/img/gallery-1.jpg') }}" data-lightbox="gallery-1" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="gallery-item">
                    <img src="{{ asset('fe/img/gallery-4.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('fe/img/gallery-4.jpg') }}" data-lightbox="gallery-4" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('fe/img/gallery-5.jpg') }}" class="img-fluid w-100" alt="">
                    <div class="search-icon">
                        <a href="{{ asset('fe/img/gallery-5.jpg') }}" data-lightbox="gallery-5" class="my-auto"><i
                                class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                    </div>
                    <div class="gallery-content">
                        <div class="gallery-inner pb-5">
                            <a href="#" class="h4 text-white">Beauty Of Life</a>
                            <a href="#" class="text-white">
                                <p class="mb-0">Gallery Name</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->


    <!-- Volunteers Start -->
    <div class="container-fluid volunteer py-5 mt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="volunteer-img">
                                <img src="{{ asset('fe/img/volunteers-1.jpg') }}" class="img-fluid w-100"
                                    alt="Image">
                                <div class="volunteer-title">
                                    <h5 class="mb-2 text-white">Michel Brown</h5>
                                    <p class="mb-0 text-white">Communicator</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="volunteer-img">
                                <img src="{{ asset('fe/img/volunteers-3.jpg') }}" class="img-fluid w-100"
                                    alt="Image">
                                <div class="volunteer-title">
                                    <h5 class="mb-2 text-white">Michel Brown</h5>
                                    <p class="mb-0 text-white">Communicator</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="volunteer-img">
                                <img src="{{ asset('fe/img/volunteers-2.jpg') }}" class="img-fluid w-100"
                                    alt="Image">
                                <div class="volunteer-title">
                                    <h5 class="mb-2 text-white">Michel Brown</h5>
                                    <p class="mb-0 text-white">Communicator</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="volunteer-img">
                                <img src="{{ asset('fe/img/volunteers-4.jpg') }}" class="img-fluid w-100"
                                    alt="Image">
                                <div class="volunteer-title">
                                    <h5 class="mb-2 text-white">Michel Brown</h5>
                                    <p class="mb-0 text-white">Communicator</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="text-uppercase text-primary">Become a Volunteer?</h5>
                    <h1 class="mb-4">Join your hand with us for a better life and beautiful future.</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip sed
                        eiusmod tempor amet consectur adip sed eiusmod amet consectur adip sed eiusmod tempor amet
                        consectur adip sed eiusmod amet consectur adip sed eiusmod tempor.
                    </p>
                    <p class="text-dark"><i class=" fa fa-check text-primary me-2"></i> We are friendly to each other.
                    </p>
                    <p class="text-dark"><i class=" fa fa-check text-primary me-2"></i> If you join with us,We will
                        give you free training.</p>
                    <p class="text-dark"><i class=" fa fa-check text-primary me-2"></i> Its an opportunity to help
                        poor Environments.</p>
                    <p class="text-dark"><i class=" fa fa-check text-primary me-2"></i> No goal requirements.</p>
                    <p class="text-dark mb-5"><i class=" fa fa-check text-primary me-2"></i> Joining is tottaly free.
                        We dont need any money from you.</p>
                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Join With Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Volunteers End -->


    <!-- Footer Start -->
    <div class="container-fluid footer bg-dark text-body py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item">
                        <h4 class="mb-4 text-white">Newsletter</h4>
                        <p class="mb-4">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit
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
