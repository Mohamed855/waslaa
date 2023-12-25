@extends('layouts.admin')

@section('title', 'Carousel')

@section('subtitle', 'Base UI')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Slides Only</h4>
                    <p class="text-muted mb-0">Here’s a carousel with slides only.
                        Note the presence of the <code>.d-block</code>
                        and <code>.img-fluid</code> on carousel images
                        to prevent browser default image alignment.
                    </p>
                </div>
                <div class="card-body">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-1.png') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-2.png') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-3.png') }}" alt="Third slide">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">With Controls</h4>
                    <p class="text-muted mb-0">Adding in the previous and next controls:</p>
                </div>
                <div class="card-body">
                    <!-- START carousel-->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-4.png') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-1.png') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-2.png') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                </div>
            </div>
            <!-- END carousel-->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">With Indicators</h4>
                    <p class="text-muted mb-0">You can also add the indicators to the
                        carousel, alongside the controls, too.
                    </p>
                </div>
                <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-3.png') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-2.png') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-1.png') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">With Captions</h4>
                    <p class="text-muted mb-0">Add captions to your slides easily with the
                        <code>.carousel-caption</code> element within any <code>.carousel-item</code>.
                    </p>
                </div>
                <div class="card-body">
                    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/assets/images/small/small-1.png') }}" alt="..."
                                     class="d-block w-100 h-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/small/small-3.png') }}" alt="..."
                                     class="d-block w-100 h-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Second slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/small/small-2.png') }}" alt="..."
                                     class="d-block w-100 h-100">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Third slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button"
                           data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaption" role="button"
                           data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Crossfade</h4>
                    <p class="text-muted mb-0">Add <code>.carousel-fade</code> to your carousel to
                        animate slides with a fade transition instead of a slide.
                    </p>
                </div>
                <div class="card-body">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-1.png') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-2.png') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 h-100"
                                     src="{{ asset('storage/assets/images/small/small-3.png') }}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Individual Interval</h4>
                    <p class="text-muted mb-0">Add <code>data-bs-interval=""</code> to a
                        <code>.carousel-item</code> to change the amount of time to delay between
                        automatically cycling to the next item.
                    </p>
                </div>
                <div class="card-body">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1000">
                                <img src="{{ asset('storage/assets/images/small/small-4.png') }}"
                                     class="img-fluid d-block w-100" alt="First slide">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="{{ asset('storage/assets/images/small/small-2.png') }}"
                                     class="img-fluid d-block w-100" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/small/small-1.png') }}"
                                     class="img-fluid d-block w-100" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button"
                           data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button"
                           data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dark variant</h4>
                    <p class="text-muted mb-0">Add <code>.carousel-dark</code> to the
                        <code>.carousel</code> for darker controls, indicators, and captions. Controls
                        are inverted compared to their default white fill with the <code>filter</code>
                        CSS property. Captions and controls have additional Sass variables that
                        customize the <code>color</code> and <code>background-color</code>.
                    </p>
                </div>
                <div class="card-body">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{ asset('storage/assets/images/small/small-2.png') }}" class="w-100 h-100"
                                     alt="Images">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="{{ asset('storage/assets/images/small/small-3.png') }}" class="w-100 h-100"
                                     alt="Images">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/assets/images/small/small-4.png') }}" class="w-100 h-100"
                                     alt="Images">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row-->
@endsection
