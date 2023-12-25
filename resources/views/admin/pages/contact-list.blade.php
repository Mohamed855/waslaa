@extends('layouts.admin')

@section('title', 'Contact List')

@section('subtitle', 'Extra Pages')

@section('dashboard-content')
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-1.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Michael Taylor</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Commercial lender</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-2.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Timothy Baker</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Cash manager</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-3.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Joseph Hubert</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Pest control worker</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-4.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Evie Nash</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">avionics service technician</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-5.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Hollie Connolly</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Human resources trainer</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-6.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Jayden Mann</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Physiologist</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-7.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Jack Birch</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Deputy sheriff</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-8.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Louie Harrison</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Physical oceanographer</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-12.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Luke Payne</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Paleontologist</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-10.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Elise Vincent</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Development Manager</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-11.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Scott Barry</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Magnetic resonance technologist</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <img src="{{ asset('storage/assets/images/users/avatar-9.jpg') }}" alt=""
                             class="avatar-lg img-thumbnail">
                        <div class="dropdown">
                            <a href="javascript: void(0);"
                               class="dropdown-toggle arrow-none text-dark font-18"
                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-pencil me-1 text-muted"></i>Edit
                                    Contact</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-account-circle me-1 text-muted"></i>Action</a>
                                <a class="dropdown-item" href="#"><i
                                        class="mdi mdi-delete me-1 text-muted"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="title">Aaliyah Berry</h4>
                    <p class="text-muted mb-3 fs-15 fw-medium">Data Entry Worker</p>
                    <h4 class="mb-2 mt-0">Follow On:</h4>
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
                    <div class="d-flex">
                        <a href="pages-profile.html" class="btn btn-secondary w-50">Profile</a>
                        <button type="button" class="btn btn-soft-primary mx-1 w-50">Contact Us</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"> <i
                                class="mdi mdi-chevron-left lh-sm"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="active page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="disabled page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"> <i
                                class="mdi mdi-chevron-right lh-sm"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- end row -->
@endsection
