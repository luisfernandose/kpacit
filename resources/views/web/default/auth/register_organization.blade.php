@extends(getTemplate().'.layouts.app')

@section('content')
    @php
        $registerMethod = getGeneralSettings('register_method') ?? 'mobile';
    @endphp

    <div class="container">
        <div class="row login-container">
            <div class="col-12 col-md-6 pl-0">
                <img src="{{ getPageBackgroundSettings('register') }}" class="img-cover" alt="Login">
            </div>
            <div class="col-12 col-md-6">
                <div class="login-card">
                    <h1 class="font-20 font-weight-bold">{{ trans('auth.signup') }}</h1>

                    <form method="post" action="/register-organization" class="mt-35">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="input-label" for="organization_name">Empresa:</label>
                            <input name="organization_name" type="text" value="{{ old('organization_name') }}" class="form-control @error('organization_name') is-invalid @enderror">
                            @error('organization_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="input-label" for="organization_nit">NIT:</label>
                            <input name="organization_nit" type="text" class="form-control @error('organization_nit') is-invalid @enderror"
                                    value="{{ old('organization_nit') }}" id="organization_nit">

                            @error('organization_nit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="input-label" for="contact_name">Nombre contacto:</label>
                            <input name="contact_name" type="text" value="{{ old('contact_name') }}" class="form-control @error('contact_name') is-invalid @enderror">
                            @error('contact_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="input-label" for="contact_phone">Teléfono contacto:</label>
                            <input name="contact_phone" type="text" value="{{ old('contact_phone') }}" class="form-control @error('contact_phone') is-invalid @enderror">
                            @error('contact_phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="input-label" for="contact_email">Email contacto:</label>
                            <input name="contact_email" type="text" value="{{ old('contact_email') }}" class="form-control @error('contact_email') is-invalid @enderror">
                            @error('contact_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="term" value="1" class="custom-control-input @error('term') is-invalid @enderror" id="term">
                            <label class="custom-control-label font-14" for="term">{{ trans('auth.i_agree_with') }}
                                <a href="pages/terms" target="_blank" class="text-secondary font-weight-bold font-14">{{ trans('auth.terms_and_rules') }}</a>
                            </label>

                            @error('term')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @error('term')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <button type="submit"
                                class="btn btn-primary btn-block mt-20">{{ trans('auth.signup') }}</button>
                    </form>

                    <div class="text-center mt-20">
                        <span class="text-secondary">
                            {{ trans('auth.already_have_an_account') }}
                            <a href="/login" class="text-secondary font-weight-bold">{{ trans('auth.login') }}</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
