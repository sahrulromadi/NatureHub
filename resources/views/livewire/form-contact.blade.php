<main>
    <!-- Header Start -->
    <section>
        <div class="container-fluid bg-breadcrumb-1">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Contacts</h1>
                    <p class="fs-5 text-white mb-4">Get in touch with us to learn more, collaborate, or support our
                        mission for a sustainable future.
                    </p>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate.hover>Home</a></li>
                        <li class="breadcrumb-item active text-white">Contacts</li>
                    </ol>
            </div>
        </div>
    </section>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="contact p-5">
                <div class="row g-4">
                    <div class="col-xl-5">
                        <h1 class="mb-4">Get in touch</h1>
                        <p class="mb-4"> We’d love to hear from you! Whether you have questions, ideas, or want to
                            collaborate, feel free to reach out. Together, we can make a difference.</p>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form wire:submit="save">
                            <div class="row gx-4 gy-3">
                                <div class="col-xl-6">
                                    <input type="text"
                                        class="form-control bg-white border-0 py-3 px-4 @error('name') is-invalid @enderror"
                                        placeholder="Your Name" wire:model="name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-6">
                                    <input type="email"
                                        class="form-control bg-white border-0 py-3 px-4 @error('email') is-invalid @enderror"
                                        placeholder="Your Email" wire:model="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" class="form-control bg-white border-0 py-3 px-4"
                                        placeholder="Your Phone" wire:model="phone">
                                </div>
                                <div class="col-xl-6">
                                    <input type="text"
                                        class="form-control bg-white border-0 py-3 px-4 @error('subject') is-invalid @enderror"
                                        placeholder="Subject" wire:model="subject">
                                    @error('subject')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0 py-3 px-4 @error('message') is-invalid @enderror" rows="7"
                                        cols="10" placeholder="Your Message" wire:model="message"></textarea>
                                    @error('message')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn-hover-bg btn btn-primary w-100 py-3 px-5"
                                        type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-7">
                        <div>
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="bg-white p-4">
                                        <i class="fas fa-map-marker-alt fa-2x text-primary mb-2"></i>
                                        <h4>Address</h4>
                                        <p class="mb-0">Konohagakure</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-white p-4">
                                        <i class="fas fa-envelope fa-2x text-primary mb-2"></i>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">srg18@gmail.com</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-white p-4">
                                        <i class="fa fa-phone-alt fa-2x text-primary mb-2"></i>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">(+62)</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <iframe class="w-100" style="height: 412px; margin-bottom: -6px;"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.9772771382463!2d139.77197707483816!3d35.7021767788247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ea73ea6f4ff%3A0x5eb9f1e50fe061e3!2sAkihabara%2C%20Tait%C5%8D%2C%20Tokyo%20110-0006%2C%20Jepang!5e0!3m2!1sid!2sid!4v1726326890776!5m2!1sid!2sid"
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</main>
