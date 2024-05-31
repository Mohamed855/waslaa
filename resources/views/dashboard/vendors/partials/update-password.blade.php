<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('changePassword', ['guard' => 'vendor', 'id' => $selected['id']]) }}" class="form form-vertical">
            @csrf
            <div class="row mb-2">
                {{-- new password --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="password">@lang('auth.password')</label>
                    <div class="position-relative">
                        <input type="password" id="password" class="form-control" name="password" placeholder="@lang('auth.password')"/>
                        <button class="btn btn-link position-absolute text-muted password-addon top-0 end-0" type="button" onclick="togglePasswordVisibility()">
                            <i id="eyeIcon" data-feather="eye"></i>
                        </button>
                    </div>
                </div>
                {{-- password confirmation --}}
                <div class="col-md-6 col-sm-12 mb-1">
                    <label class="form-label" for="password_confirmation">@lang('auth.confirmPassword')</label>
                    <div class="position-relative">
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="@lang('auth.confirmPassword')"/>
                        <button class="btn btn-link position-absolute text-muted end-0 top-0" type="button" onclick="toggleConfirmPasswordVisibility()">
                            <i id="eyeConfirmIcon" data-feather="eye"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-2 d-flex">
                    <button type="submit" class="btn btn-primary w-100" style="min-width: 180px">@lang('translate.changePassword')</button>
                </div>
            </div>
        </form>
    </div>
</div>
