<main>
    <!-- Header Start -->
    <section>
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">All Articles</h1>
                    <p class="fs-5 text-white mb-4">Help today because tomorrow you may be the one who needs more
                        helping!
                    </p>
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate.hover>Home</a></li>
                        <li class="breadcrumb-item active text-white">Articles</li>
                    </ol>
            </div>
        </div>
    </section>
    <!-- Header End -->

    <!-- Articles List Start -->
    <section>
        <div class="container-fluid donation py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                    <h5 class="text-uppercase text-primary">List Articles</h5>
                    <h1 class="mb-0">Your money will save our life</h1>
                </div>

                <!-- Search Bar Start -->
                <div class="container pb-5">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search articles..." wire:model.live="search">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Bar End -->

                @if ($articles->isNotEmpty())
                    <div class="row g-4">
                        @foreach ($articles as $index => $article)
                            <div class="col-lg-4" wire:key="article-{{ $index }}">
                                <div class="donation-item">
                                    <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('img/defaultImg.jpg') }}"
                                        class="img-fluid" style="width: 500px; height: 600px; object-fit: cover;"
                                        alt="Image">
                                    <div class="donation-content d-flex flex-column">
                                        <h5 class="text-uppercase text-primary mb-4">
                                            {{ $article->created_at->format('M j, Y') }}</h5>
                                        <a href="#"
                                            class="btn-hover-color display-6 text-white">{{ Str::limit($article->title, 25) }}</a>
                                        <h4 class="text-white mb-4">{{ $article->author->name }}</h4>
                                        <div class="mb-4 text-white">
                                            {!! Str::limit($article->body, 100) !!}
                                        </div>
                                        <div class="donation-btn d-flex align-items-center justify-content-start">
                                            <a class="btn-hover-bg btn btn-primary text-white py-2 px-4"
                                                href="{{ route('articles.show', $article->slug) }}"
                                                wire:navigate.hover>Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="px-5 pt-5">
                        {{ $articles->links() }}
                    </div>
                @else
                    <div class="text-center">
                        <div class="alert alert-warning mb-4" role="alert">
                            <h4 class="alert-heading">No Articles Found</h4>
                            <p class="mb-0">We couldn't find any articles.</p>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-primary" wire:navigate.hover>Back To Home</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Articles List End -->
</main>
