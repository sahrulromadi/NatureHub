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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active text-white">Articles</li>
                    </ol>
            </div>
        </div>
    </section>
    <!-- Header End -->

    <!-- Donation Start -->
    <section>
        <div class="container-fluid donation py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                    <h5 class="text-uppercase text-primary">List Articles</h5>
                    <h1 class="mb-0">Your money will save our life</h1>
                </div>
                <div class="row g-4">
                    @foreach ($articles as $article)
                        <div class="col-lg-4">
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
                                    <p class="text-white mb-4">{!! Str::limit($article->body, 100) !!}
                                    </p>
                                    <div class="donation-btn d-flex align-items-center justify-content-start">
                                        <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="px-5">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
    <!-- Donation End -->
</main>
