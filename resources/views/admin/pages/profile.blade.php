@extends('layouts.admin')

@section('title', 'Profile')

@section('subtitle', 'Extra Pages')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div>
                        <img src="{{ asset('storage/assets/images/small/small-6.png') }}" alt="" width="100%"
                             height="400"
                             class="object-fit-cover rounded">
                    </div>

                    <div class="w-100">
                        <div class="d-flex justify-content-between mb-4 ms-2">
                            <div>
                                <img src="{{ asset('storage/assets/images/users/avatar-1.jpg') }}" alt="" width="150"
                                     class="img-thumbnail rounded-circle" style="margin-top: -60px;">
                            </div>
                            <div class="d-flex align-items-start gap-2 mt-2">
                                <button class="btn btn-primary text-center mb-1"><span
                                        class="mdi mdi-account-edit me-1"></span>Edit Profile
                                </button>
                                <button class="btn btn-dark mb-1">Visit Website</button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <h3 class="mb-2 mt-0">Daniel R. Moulton</h3>
                                <p class="mb-0 font-16">Authorised Brand Seller</p>
                                <p class="font-16 mb-4">New York, United States</p>

                                <h4 class="mb-2">Follow On:</h4>
                                <ul class="social-list list-inline mb-3">
                                    <li class="list-inline-item">
                                        <a class="social-list-item border border-2 border-primary btn btn-soft-primary font-16 rounded-2 "
                                           title="" data-bs-toggle="tooltip" data-bs-placement="top" href=""
                                           data-bs-title="Facebook"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-list-item border border-2 border-info btn btn-soft-info font-16 rounded-2"
                                           title="" data-bs-toggle="tooltip" data-bs-placement="top" href=""
                                           data-bs-title="Twitter"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-list-item border border-2 border-primary btn btn-soft-primary font-16 rounded-2"
                                           title="" data-bs-toggle="tooltip" data-bs-placement="top" href=""
                                           data-bs-title="LinkedIn"><i class="mdi mdi-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-list-item border border-2 border-danger btn btn-soft-danger font-16 rounded-2"
                                           title="" data-bs-toggle="tooltip" data-bs-placement="top" href=""
                                           data-bs-title="Message"><i class="mdi mdi-email-open-outline"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">SELLER INFORMATION</h5>
                    <P class="mb-3 d-none d-md-block">Hi! I am a good Authorised Brand Seller , always
                        willing to learn new skills. I am friendly, helpful and polite, have a good
                        sense of humour. I am able to work independently in busy environments and also
                        within a team setting. I am outgoing and tactful, and able to listen effectively
                        when solving problems.
                        I am a punctual and motivated individual who is able to work in a busy
                        environment and produce high standards of work. I am an excellent team worker
                        and am able to take instructions from all levels and build up good working
                        relationships with all colleagues. I am flexible, reliable and possess excellent
                        time keeping skills.
                    </P>

                    <ul class="list-unstyled">
                        <li class="mb-2"><b>Full Name : </b><span class="ms-1 text-muted">Daniel R.
                                Moulton </span></li>
                        <li class="mb-2"><b>Mobile :</b> <span class="ms-1 text-muted">(+45) 23 323
                                343544 </span></li>
                        <li class="mb-2"><b>Email :</b> <a href=""
                                                           class="ms-1 text-muted">DanielRMoulton@armyspy.com </a></li>
                        <li class="mb-2"><b>Location : </b><span class="ms-1 text-muted">United
                                Stat</span></li>
                        <li class="mb-2"><b>Languages :</b> <span class="ms-1 text-muted"> English ,
                                Spanish , French</span></li>
                    </ul>

                </div>
            </div> <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <div class="profile-content">
                        <ul class="nav nav-pills bg-light nav-justified gap-0 mb-4 overflow-hidden rounded"
                            role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link rounded-0 active"
                                                                        data-bs-toggle="tab" data-bs-target="#aboutme"
                                                                        type="button" role="tab" aria-controls="home"
                                                                        aria-selected="true" href="#aboutme">About</a>
                            </li>
                            <li class="nav-item" role="presentation"><a class="nav-link rounded-0" data-bs-toggle="tab"
                                                                        data-bs-target="#user-activities" type="button"
                                                                        role="tab" aria-controls="home"
                                                                        aria-selected="false" href="#user-activities"
                                                                        tabindex="-1">Activities</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link rounded-0" data-bs-toggle="tab"
                                                                        data-bs-target="#edit-profile" type="button"
                                                                        role="tab" aria-controls="home"
                                                                        aria-selected="false" href="#edit-profile"
                                                                        tabindex="-1">Settings</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link rounded-0" data-bs-toggle="tab"
                                                                        data-bs-target="#projects" type="button"
                                                                        role="tab" aria-controls="home"
                                                                        aria-selected="false" href="#projects"
                                                                        tabindex="-1">Projects</a></li>
                        </ul>

                        <div class="tab-content m-0">
                            <div class="tab-pane active" id="aboutme" role="tabpanel" aria-labelledby="home-tab"
                                 tabindex="0">
                                <div class="profile-desk">
                                    <h5 class="text-uppercase fs-17 text-dark">Daniel R. Moulton</h5>
                                    <div class="designation mb-4">PRODUCT DESIGNER (UX / UI / Visual
                                        Interaction)
                                    </div>
                                    <p class="text-muted fs-16"> I have 10 years of experience designing for the web,
                                        and specialize in the areas of user interface design, interaction design, visual
                                        design and prototyping. I’ve worked with notable startups including Pearl Street
                                        Software.
                                    </p>

                                    <h5 class="mt-4 fs-17 text-dark">Contact Information</h5>
                                    <table class="table table-sm mb-0 border-top">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Url</th>
                                            <td>
                                                <a href="#" class="ng-binding">
                                                    www.example.com
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>
                                                <a href="" class="ng-binding">
                                                    jonathandeo@example.com
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td class="ng-binding">(123)-456-7890</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Skype</th>
                                            <td>
                                                <a href="#" class="ng-binding">
                                                    jonathandeo123
                                                </a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end profile-desk -->
                            </div> <!-- about-me -->

                            <!-- Activities -->
                            <div id="user-activities" class="tab-pane" role="tabpanel">
                                <div class="timeline-2">
                                    <div class="time-item">
                                        <div class="item-info ms-3 mb-3">
                                            <div class="text-muted">5 minutes ago</div>
                                            <p><strong><a href="#" class="text-info">John
                                                        Doe</a></strong>Uploaded a photo</p>
                                            <img src="{{ asset('storage/assets/images/small/small-3.png') }}" alt=""
                                                 height="40" width="60" class="rounded-1">
                                            <img src="{{ asset('storage/assets/images/small/small-4.png') }}" alt=""
                                                 height="40" width="60" class="rounded-1">
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info ms-3 mb-3">
                                            <div class="text-muted">30 minutes ago</div>
                                            <p><a href="" class="text-info">Lorem</a> commented your
                                                post.
                                            </p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.
                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info ms-3 mb-3">
                                            <div class="text-muted">59 minutes ago</div>
                                            <p><a href="" class="text-info">Jessi</a> attended a meeting
                                                with<a href="#" class="text-success">John Doe</a>.</p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.
                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info ms-3 mb-3">
                                            <div class="text-muted">5 minutes ago</div>
                                            <p><strong><a href="#" class="text-info">John
                                                        Doe</a></strong> Uploaded 2 new photos</p>
                                            <img src="{{ asset('storage/assets/images/small/small-2.png') }}" alt=""
                                                 height="40" width="60" class="rounded-1">
                                            <img src="{{ asset('storage/assets/images/small/small-1.png') }}" alt=""
                                                 height="40" width="60" class="rounded-1">
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info ms-3 mb-3">
                                            <div class="text-muted">30 minutes ago</div>
                                            <p><a href="" class="text-info">Lorem</a> commented your
                                                post.
                                            </p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.
                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info ms-3 mb-3">
                                            <div class="text-muted">59 minutes ago</div>
                                            <p><a href="" class="text-info">Jessi</a> attended a meeting
                                                with<a href="#" class="text-success">John Doe</a>.</p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.
                                                    Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane" role="tabpanel">
                                <div class="user-profile-content">
                                    <form>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="mb-2">
                                                <label class="form-label" for="FullName">Full
                                                    Name</label>
                                                <input type="text" value="John Doe" id="FullName" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Email">Email</label>
                                                <input type="email" value="first.last@example.com" id="Email"
                                                       class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="web-url">Website</label>
                                                <input type="text" value="Enter website url" id="web-url"
                                                       class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Username">Username</label>
                                                <input type="text" value="john" id="Username" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Password">Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="Password"
                                                       class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="RePassword">Re-Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="RePassword"
                                                       class="form-control">
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label class="form-label" for="AboutMe">About Me</label>
                                                <textarea style="height: 125px;" id="AboutMe" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i
                                                class="ri-save-line me-1 fs-16 lh-1"></i> Save
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- profile -->
                            <div id="projects" class="tab-pane" role="tabpanel">
                                <div class="row m-t-10">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>TechUI Admin</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-info">Work
                                                                in Progress</span></td>
                                                    <td>GetAppui</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>TechUI Frontend</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-success">Pending</span>
                                                    </td>
                                                    <td>GetAppui</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>TechUI Admin</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-pink">Done</span>
                                                    </td>
                                                    <td>GetAppui</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>TechUI Frontend</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-purple">Work
                                                                in Progress</span></td>
                                                    <td>GetAppui</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>TechUI Admin</td>
                                                    <td>01/01/2015</td>
                                                    <td>07/05/2015</td>
                                                    <td><span class="badge bg-warning">Coming
                                                                soon</span></td>
                                                    <td>GetAppui</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card body -->
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
