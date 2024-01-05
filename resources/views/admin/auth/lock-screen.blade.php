{{--
@extends('layouts.auth')

@section('title', 'Lock Screen')

@section('card-content')
    <div class="text-center w-75 m-auto">
        <img src="{{ asset('storage/assets/images/users/avatar-1.jpg') }}" height="64" alt="user-image" class="rounded-circle img-fluid img-thumbnail avatar-xl">
        <h4 class="text-center mt-3 fw-bold fs-20">Hi ! Daniel </h4>
        <p class="text-muted mb-4">Enter your password to access the admin.</p>
    </div>

    <form action="#">
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" type="email" id="password" required="" placeholder="Enter your password">
        </div>

        <div class="mb-0 text-start">
            <button class="btn btn-primary w-100" type="submit"><i class="fa-solid fa-right-to-bracket me-1"></i> <span class="fw-bold">Log In</span> </button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="text-muted font-18">Sign in with</p>
        <div class="d-flex gap-2 justify-content-center mt-3">
            <a href="javascript: void(0);"
               class="btn btn-sm btn-soft-primary font-16"><i
                    class="mdi mdi-facebook"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-danger font-16"><i
                    class="mdi mdi-instagram"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-info font-16"><i
                    class="mdi mdi-twitter"></i></a>
            <a href="javascript: void(0);" class="btn btn-sm btn-soft-dark font-16"><i
                    class="mdi mdi-github"></i></a>
        </div>
    </div>
@endsection

@section('secondary-action')
    <p class="text-muted text-center font-16 mb-5">Back To <a href="sign-in.blade.php" class="text-dark ms-1">Sign In</a></p>
@endsection
--}}
