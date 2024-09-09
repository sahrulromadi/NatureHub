<main>
    <!-- Header Start -->
    <section>
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Contacts</h1>
                    <p class="fs-5 text-white mb-4">Help today because tomorrow you may be the one who needs more
                        helping!
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
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact
                            form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and
                            you're done. <a class="text-dark fw-bold" href="https://htmlcodex.com/contact-form">Download
                                Now</a>.</p>

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
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
                                    <input type="text"
                                        class="form-control bg-white border-0 py-3 px-4 @error('phone') is-invalid @enderror"
                                        placeholder="Your Phone" wire:model="phone">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
                                        <p class="mb-0">123 street New York</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-white p-4">
                                        <i class="fas fa-envelope fa-2x text-primary mb-2"></i>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">info@example.com</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="bg-white p-4">
                                        <i class="fa fa-phone-alt fa-2x text-primary mb-2"></i>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">(+012) 3456 7890 123</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <iframe class="w-100" style="height: 412px; margin-bottom: -6px;"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
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
