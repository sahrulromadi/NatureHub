<main>
    <!-- Header Start -->
    <section>
        <div class="container-fluid bg-breadcrumb-2">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">About Us</h1>
                    <p class="fs-5 text-white mb-4">Get to know us better by reading about our goals, values, and the
                        passionate team working behind the scenes to drive meaningful change.
                    </p>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate.hover>Home</a></li>
                        <li class="breadcrumb-item active text-white">About Us</li>
                    </ol>
            </div>
        </div>
    </section>
    <!-- Header End -->

    <!-- About Start -->
    <section>
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-xl-5 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Image">
                    </div>
                    <div class="col-xl-7">
                        <h5 class="text-uppercase text-primary">About Us</h5>
                        <h1 class="mb-4">Introduction</h1>
                        <p class="fs-5 mb-4">Welcome to NatureHub, where a passion for environmental stewardship meets
                            meaningful action. We are dedicated to raising awareness and inspiring positive change
                            through valuable content and impactful campaigns.
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
                                                    <h5 class="text-uppercase mb-3">About Us</h5>
                                                    <p class="mb-4">At NatureHub, we provide insightful articles,
                                                        compelling campaigns, and resources designed to inform and
                                                        engage. Our platform serves as a hub for those committed to
                                                        making a difference support for
                                                        environmental advocacy.
                                                    </p>
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
                                                    <h5 class="text-uppercase mb-3">Our Mission</h5>
                                                    <p class="mb-4">Our mission is to promote environmental awareness
                                                        and foster a sense of responsibility through educational
                                                        resources and community engagement. We aim to inspire
                                                        individuals to take proactive steps towards a sustainable
                                                        future.
                                                    </p>
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
                                                    <h5 class="text-uppercase mb-3">Our Vision</h5>
                                                    <p class="mb-4">We envision a world where every person understands
                                                        their impact on the planet and takes deliberate actions to
                                                        protect it. By educating and empowering our community, we strive
                                                        to create a greener, more sustainable world.
                                                    </p>
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
    </section>
    <!-- About End -->
</main>
