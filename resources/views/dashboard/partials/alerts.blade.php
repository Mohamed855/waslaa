@if (session()->has('success'))
    <div class="alert alert-success" role="alert"
         style="display: flex;
                justify-content: center;
                height: 58px;
                align-items: center;">
        <p>{{ session('success') }}</p>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger" role="alert"
         style="display: flex;
                justify-content: center;
                height: 58px;
                align-items: center;">
        <p>{{ session('error') }}</p>
    </div>
@endif
