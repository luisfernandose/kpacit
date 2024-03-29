<section>
    <h2 class="section-title after-line">{{ trans('financial.account') }}</h2>

    <div class="row mt-20">
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('public.email') }}</label>
                <input type="text" name="email"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->email : old('email') }}"
                    class="form-control @error('email')  is-invalid @enderror" placeholder="" />
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('auth.name') }}</label>
                <input type="text" name="full_name"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->full_name : old('full_name') }}"
                    class="form-control @error('full_name')  is-invalid @enderror" placeholder="" />
                @error('full_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('auth.document_type') }}:</label>
                {{ $user->document_type }}
                <select name="document_type" class="form-control search-user-select2">
                    <option value="CC"
                        {{ $user && $user->document_type == 'CC' ? 'selected' : (old('document_type') == 'CC' ? 'selected' : '') }}>
                        CC</option>
                    <option value="CE"
                        {{ $user && $user->document_type == 'CE' ? 'selected' : (old('document_type') == 'CE' ? 'selected' : '') }}>
                        CE</option>
                </select>
                @error('document_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('auth.document_id') }}:</label>
                <input name="document_id" type="text"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->document_id : old('document_id') }}"
                    class="form-control @error('document_id') is-invalid @enderror">
                @error('document_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('auth.password') }}</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password')  is-invalid @enderror" placeholder="" />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('auth.password_repeat') }}</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                    class="form-control @error('password_confirmation')  is-invalid @enderror" placeholder="" />
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('public.mobile') }}</label>
                <input type="tel" name="mobile"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->mobile : old('mobile') }}"
                    class="form-control @error('mobile')  is-invalid @enderror" placeholder="" />
                @error('mobile')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label class="input-label">{{ trans('auth.language') }}</label>
                <select name="language" class="form-control">
                    <option value="">{{ trans('auth.language') }}</option>
                    @foreach ($userLanguages as $lang => $language)
                        <option value="{{ $lang }}" @if (!empty($user) and $user->language == $lang) selected @endif>
                            {{ $language }}</option>
                    @endforeach
                </select>
                @error('language')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label"
                    for="newsletterSwitch">{{ trans('auth.join_newsletter') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="join_newsletter" class="custom-control-input" id="newsletterSwitch"
                        {{ (!empty($user) and $user->newsletter) || old('join_newsletter') == 'on' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="newsletterSwitch"></label>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label"
                    for="publicMessagesSwitch">{{ trans('auth.public_messages') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="public_messages" class="custom-control-input" id="publicMessagesSwitch"
                        {{ (!empty($user) and $user->public_message) || old('public_messages') == 'on' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="publicMessagesSwitch"></label>
                </div>
            </div>
        </div>
    </div>

</section>
