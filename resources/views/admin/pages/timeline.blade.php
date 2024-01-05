@extends('layouts.admin')

@section('title', 'Timeline')

@section('subtitle', 'Extra Pages')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="timeline" dir="ltr">
                        <article class="timeline-item alt">
                            <div class="text-end">
                                <div class="time-show first">
                                    <a href="#" class="btn btn-primary w-lg">Today</a>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon"><i class="fa-solid fa-record-vinyl"></i></span>
                                        <h4 class="fs-16 fw-semibold ">1 hour ago</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad
                                            debitis unde? </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item ">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon bg-success"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-success">2 hours ago</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>consectetur adipisicing elit. Iusto, optio, dolorum <a href="#">John deon</a>
                                            provident rerum aut hic quasi placeat iure tempora laudantium </p>

                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon bg-primary"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-primary">10 hours ago</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>3 new photo Uploaded on facebook fan page</p>
                                        <div class="album">
                                            <a href="#">
                                                <img alt=""
                                                     src="{{ asset('storage/assets/images/small/small-1.jpg') }}">
                                            </a>
                                            <a href="#">
                                                <img alt=""
                                                     src="{{ asset('storage/assets/images/small/small-2.jpg') }}">
                                            </a>
                                            <a href="#">
                                                <img alt=""
                                                     src="{{ asset('storage/assets/images/small/small-3.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon bg-pink"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-purple">14 hours ago</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Outdoor visit at California State Route 85 with John Boltana & Harry Piterson
                                            regarding to setup a new show room.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon bg-info"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-muted">19 hours ago</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span> Lorem
                                            ipsum dolor sit amet consiquest dio</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="timeline-item alt">
                            <div class="text-end">
                                <div class="time-show">
                                    <a href="#" class="btn btn-primary w-lg">Yesterday</a>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon bg-warning"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-warning">07 January 2016</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Montly Regular Medical check up at Greenland Hospital by the doctor <span><a
                                                    href="#"> Johm meon </a></span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon bg-primary"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-primary">07 January 2016</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Download the new updates of TechUI admin dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon bg-success"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-success">07 January 2016</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Jonatha Smith added new milestone <span><a class="blue"
                                                                                      href="#">crishtian</a></span>
                                            Lorem ipsum dolor sit amet consiquest dio</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="timeline-item alt">
                            <div class="text-end">
                                <div class="time-show">
                                    <a href="#" class="btn btn-primary w-lg">Last Month</a>
                                </div>
                            </div>
                        </article>

                        <article class="timeline-item alt">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow-alt"></span>
                                        <span class="timeline-icon"><i class="fa-solid fa-record-vinyl"></i></span>
                                        <h4 class="fs-16 fw-semibold text-muted">31 December 2015</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Download the new updates of TechUI admin dashboard</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="timeline-item">
                            <div class="timeline-desk">
                                <div class="panel">
                                    <div class="timeline-box">
                                        <span class="arrow"></span>
                                        <span class="timeline-icon bg-danger"><i
                                                class="mdi mdi-record-circle-outline"></i></span>
                                        <h4 class="fs-16 fw-semibold text-danger">16 Decembar 2015</h4>
                                        <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                        <p>Jonatha Smith added new milestone <span><a href="#">prank</a></span> Lorem
                                            ipsum dolor sit amet consiquest dio</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                    <!-- end timeline -->
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
@endsection
