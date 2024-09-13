<main>
    <!-- Header Start -->
    <section>
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h1 class="text-white display-4 mb-4">{{ $article->title }}</h1>
                <p class="fs-4 text-white mb-4">
                    Discover insights and stories that inspire. Your next great read is just a click away!
                </p>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" wire:navigate.hover>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('articles') }}" wire:navigate.hover>Articles</a></li>
                    <li class="breadcrumb-item active text-white">{{ $article->title }}</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- Header End -->

    <!-- Article Content Start -->
    <section>
        <div class="container py-5">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="article-content mb-4">
                        <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('img/defaultImg.jpg') }}"
                            class="img-fluid rounded mb-4" alt="Article Image"
                            style="width: 100%; height: auto; object-fit: cover;">
                        <div class="article-body fs-5">
                            {!! $article->body !!}
                        </div>
                    </div>
                </div>

                <!-- Author, Like & Recommendation Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Author Section -->
                    <div class="card mb-4 shadow-sm border-light">
                        <div class="card-body text-center">
                            <img src="{{ $article->author->image ? asset('storage/' . $article->author->image) : asset('img/defaultAva.jpeg') }}"
                                class="rounded-circle mb-3" alt="Author Image" style="width: 120px; height: 120px;">
                            <h5 class="card-title mb-2">{{ $article->author->name }}</h5>
                            <p class="card-text text-muted">{{ $article->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <!-- Like Section -->
                    <div class="card mb-4 shadow-sm border-light">
                        <div class="card-body text-center">
                            @livewire('like-button', ['model' => $article])
                        </div>
                    </div>

                    <!-- Recommended Articles Section -->
                    <div class="card shadow-sm border-light">
                        <div class="card-header text-center bg-primary text-white">
                            <h5 class="mb-0">Recommended Articles</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($recommendedArticles as $recommended)
                                <div class="mb-3">
                                    <a href="{{ route('articles.show', $recommended->slug) }}"
                                        class="d-block text-decoration-none" wire:navigate.hover>
                                        <h6 class="text-primary mb-1">{{ Str::limit($recommended->title, 50) }}
                                        </h6>
                                    </a>
                                    <small class="text-muted">
                                        By {{ $recommended->author->name }} -
                                        {{ $recommended->created_at->format('M d, Y') }}
                                    </small>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Author, Like & Recommendation Sidebar End --}}

                {{-- Comments Section Start --}}
                <div class="comments-section mt-5">
                    <h4 class="mb-4">Comments</h4>
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://naturehub.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by Disqus.</a></noscript>
                </div>
                {{-- Comments Section End --}}

            </div>
        </div>
    </section>
    <!-- Article Content End -->
</main>
