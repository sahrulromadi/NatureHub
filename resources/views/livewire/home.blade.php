<main>
    <!-- Campaign Start -->
    <article>
        <div class="container-fluid carousel-header vh-100 px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($campaigns as $index => $campaign)
                        <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @if ($campaigns->isNotEmpty())
                        @foreach ($campaigns as $index => $campaign)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : asset('img/defaultCampaign.jpg') }}"
                                    class="img-fluid" alt="Image">
                                <div class="carousel-caption">
                                    <div class="p-3" style="max-width: 900px;">
                                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                            WE'll
                                            Save
                                            Our Planet</h4>
                                        <h1 class="display-1 text-capitalize text-white mb-4">{{ $campaign->name }}</h1>
                                        <div class="mb-5 fs-5">
                                            {!! $campaign->summary !!}
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href=""
                                                wire:navigate.hover>Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img src="{{ asset('fe/img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                        WE'll
                                        Save
                                        Our Planet</h4>
                                    <h1 class="display-1 text-capitalize text-white mb-4">Default</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
    </article>
    <!-- Campaign End -->

    <!-- Problem Start -->
    <section>
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
                            <a href="{{ asset('fe/img/gallery-4.jpg') }}" data-lightbox="gallery-4"
                                class="my-auto"><i
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
                            <a href="{{ asset('fe/img/gallery-5.jpg') }}" data-lightbox="gallery-5"
                                class="my-auto"><i
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
    </section>
    <!-- Problem End -->

    <!-- Articles List Start -->
    @if ($articles->isNotEmpty())
        <article>
            <div class="container-fluid blog py-5 mb-5">
                <div class="container py-5">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <h5 class="text-uppercase text-primary">Latest News</h5>
                        <h1 class="mb-0">Help today because tomorrow you may be the one who needs more helping!
                        </h1>
                    </div>
                    <div class="row g-4">
                        @foreach ($articles as $article)
                            <div class="col-lg-6 col-xl-3">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('img/defaultImg.jpg') }}"
                                            class="img-fluid w-100" alt="Article Image">
                                        <div class="blog-info">
                                            <span><i class="fa fa-clock"></i>
                                                {{ $article->created_at->format('M j, Y') }}</span>
                                            <div class="d-flex">
                                                <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                                <a href="#" class="text-white">0 <i
                                                        class="fa fa-comment"></i></a>
                                            </div>
                                        </div>
                                        <div class="search-icon">
                                            <a href="{{ $article->image ? asset('storage/' . $article->image) : asset('img/defaultImg.jpg') }}"
                                                data-lightbox="Blog-1" class="my-auto"><i
                                                    class="fas fa-search-plus btn-primary text-white p-3"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-dark border p-4 ">
                                        <h4 class="mb-4">{{ Str::limit($article->title, 25) }}</h4>
                                        <p class="mb-4">{!! Str::limit($article->body, 100) !!}</p>
                                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                            href="{{ route('articles.show', $article->slug) }}"
                                            wire:navigate.hover>Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </article>
    @endif
    <!-- Articles List End -->
</main>
