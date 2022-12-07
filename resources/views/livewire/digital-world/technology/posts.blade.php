<section class="container-xxl">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-6 text-center">تک زیلا دنیای دیجیتالی من</h1>
            <p class="lead text-center text-danger">اخبار تکنولوژی رو اینجا دنبال کن</p>
        </div>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('lion-ezpc-images/main-banner.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="container-xxl my-4">
    <section class="row">
        @foreach($posts as $post)
            @livewire('digital-world.technology.post-card', ['post' => $post])
        @endforeach
    </section>
</section>
<div class="row" data-masonry='{"percentPosition": true }'>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg"
                 role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#868e96"/>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>

            <div class="card-body">
                <h5 class="card-title">Card title that wraps to a new line</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card p-3">
            <figure class="p-3 mb-0">
                <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-muted">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg"
                 role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#868e96"/>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card bg-primary text-white text-center p-3">
            <figure class="mb-0">
                <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-white">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has a regular title and short paragraph of text below it.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <svg class="bd-placeholder-img card-img" width="100%" height="260" xmlns="http://www.w3.org/2000/svg"
                 role="img" aria-label="Placeholder: Card image" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#868e96"/>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Card image</text>
            </svg>

        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card p-3 text-end">
            <figure class="mb-0">
                <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                </blockquote>
                <figcaption class="blockquote-footer mb-0 text-muted">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is another card with title and supporting text below. This card has some
                    additional content to make it slightly taller overall.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>
