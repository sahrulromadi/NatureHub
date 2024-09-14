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
                                <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : asset('img/defaultBanner.jpg') }}"
                                    class="img-fluid" alt="Campaign Image">
                                <div class="carousel-caption">
                                    <div class="p-3" style="max-width: 900px;">
                                        <h1 class="display-1 text-capitalize text-white mb-4">{{ $campaign->name }}</h1>
                                        <div class="mb-5 fs-5">
                                            {!! $campaign->summary !!}
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <!-- Tombol Buka Modal -->
                                            <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#campaignModal{{ $index }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img src="{{ asset('img/defaultBanner.jpg') }}" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h1 class="display-1 text-capitalize text-white mb-4">Default</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#"
                                            data-bs-toggle="modal" data-bs-target="#campaignModal0">Read More</a>
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

    <!-- Modal Campaign Start -->
    @foreach ($campaigns as $index => $campaign)
        <div class="modal fade" id="campaignModal{{ $index }}" tabindex="-1"
            aria-labelledby="campaignModalLabel{{ $index }}" aria-hidden="true" wire:ignore.self
            wire:key="campaign-{{ $index }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="campaignModalLabel{{ $index }}">Detail Campaign</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : asset('img/defaultPoster.png') }}"
                                    class="img-fluid rounded" alt="Campaign Image">
                            </div>
                            <div class="col-md-6">
                                <h4 class="fw-bold">{{ $campaign->name }}</h4>
                                <p class="text-muted">{{ $campaign->created_at->format('d M, Y') }}</p>
                                <p class="mb-4">{!! $campaign->content !!}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        @livewire('like-button', ['model' => $campaign])
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Campaign End -->

    <!-- Problem Start -->
    <section>
        <div class="container-fluid gallery py-5 px-0">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Problem</h5>
                <h1 class="mb-4">
                    <span>The</span>
                    <span
                        style="font-size: 3rem; color: #9eeb9e; font-weight: bold; text-decoration: underline; text-decoration-color: #9eeb9e; text-decoration-thickness: 3px; text-decoration-style: wavy; margin-bottom: 1rem;">
                        EARTH
                    </span>
                    <span>is in</span>
                    <span class="text-danger">Danger!</span>
                </h1>
                <p class="mb-0">The earth is in danger due to a number of serious environmental problems that affect
                    the balance of ecosystems and the quality of human life. Here are some of the main reasons:</p>
            </div>
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="gallery-item">
                        <img src="{{ asset('img/climate-change.jpg') }}" class="img-fluid"
                            style="width: 500px; height: 500px; object-fit: cover;" alt="Climate Change">
                        <div class="search-icon">
                            <a href="{{ asset('img/climate-change.jpg') }}" data-lightbox="gallery-2"
                                class="my-auto"><i
                                    class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-inner pb-5">
                                <span class="h4 text-white">Problem 1</span>
                                <span class="text-white">
                                    <p class="mb-0">Climate Change</p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('img/deforestation.jpg') }}" class="img-fluid"
                            style="width: 500px; height: 500px; object-fit: cover;" alt="Deforestation">
                        <div class="search-icon">
                            <a href="{{ asset('img/deforestation.jpg') }}" data-lightbox="gallery-3"
                                class="my-auto"><i
                                    class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-inner pb-5">
                                <span class="h4 text-white">Problem 2</span>
                                <span class="text-white">
                                    <p class="mb-0">Deforestation</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="gallery-item">
                        <img src="{{ asset('img/air-pollution.jpg') }}" class="img-fluid"
                            style="width: 500px; height: 1000px; object-fit: cover;" alt="Air Pollution">
                        <div class="search-icon">
                            <a href="{{ asset('img/air-pollution.jpg') }}" data-lightbox="gallery-1"
                                class="my-auto"><i
                                    class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-inner pb-5">
                                <span class="h4 text-white">Problem 3</span>
                                <span class="text-white">
                                    <p class="mb-0">Air and Water Pollution</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="gallery-item">
                        <img src="{{ asset('img/plastic-pollution.jpg') }}" class="img-fluid"
                            style="width: 500px; height: 500px; object-fit: cover;" alt="Plastic Pollution">
                        <div class="search-icon">
                            <a href="{{ asset('img/plastic-pollution.jpg') }}" data-lightbox="gallery-4"
                                class="my-auto"><i
                                    class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-inner pb-5">
                                <span class="h4 text-white">Problem 4</span>
                                <span class="text-white">
                                    <p class="mb-0">Plastic Pollution</p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('img/water-crisis.jpg') }}" class="img-fluid"
                            style="width: 500px; height: 500px; object-fit: cover;" alt="Plastic Pollution">
                        <div class="search-icon">
                            <a href="{{ asset('img/water-crisis.jpg') }}" data-lightbox="gallery-5"
                                class="my-auto"><i
                                    class="fas fa-search-plus btn-hover-color bg-white text-primary p-3"></i></a>
                        </div>
                        <div class="gallery-content">
                            <div class="gallery-inner pb-5">
                                <span class="h4 text-white">Problem 5</span>
                                <span class="text-white">
                                    <p class="mb-0">Water Crisis</p>
                                </span>
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
                        <h5 class="text-uppercase text-primary">Discover the Most Read Articles</h5>
                        <h1 class="mb-0">Dive into our most popular articles and explore the content that's
                            captivating readers everywhere.
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
                                                <span class="me-3"> {{ $article->likes->count() }} <i
                                                        class="fa fa-heart"></i></span>
                                                <a href="#" class="text-white">{{ $article->views }} <i
                                                        class="fa fa-eye"></i></a>
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
                                            wire:navigate.hover>Read More</a>
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
