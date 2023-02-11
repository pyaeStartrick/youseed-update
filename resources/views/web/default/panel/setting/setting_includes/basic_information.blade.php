<section style="padding: 20px 50px;">
    <h2 class="section-title after-line">{{ trans('financial.account') }}</h2>

    <div class="row mt-20">
        <div class="col-12 col-lg-4">
            <div class="form-group">
                <label class="input-label">{{ trans('public.email') }}</label>
                <input type="text" name="email"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->email : old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="" />
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="input-label">{{ trans('auth.name') }}</label>
                <input type="text" name="full_name"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->full_name : old('full_name') }}"
                    class="form-control @error('full_name') is-invalid @enderror" placeholder="" />
                @error('full_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            @if ($user->role_name == 'user')
            <div class="form-group">
                <label class="input-label">Student ID</label>
                <input type="text" name="student_id"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->student_id : old('student_id') }}"
                    class="form-control @error('student_id') is-invalid @enderror" disabled/>
                @error('student_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @endif
            <div class="form-group">
                <label class="input-label">{{ trans('auth.name') }}</label>
                <input type="text" name="full_name"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->full_name : old('full_name') }}"
                    class="form-control @error('full_name') is-invalid @enderror" placeholder="" />
                @error('full_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="input-label">{{ trans('auth.password') }}</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror" placeholder="" />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="input-label">{{ trans('auth.password_repeat') }}</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                    class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="" />
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="input-label">{{ trans('public.mobile') }}</label>
                <input type="tel" name="mobile"
                    value="{{ (!empty($user) and empty($new_user)) ? $user->mobile : old('mobile') }}"
                    class="form-control @error('mobile') is-invalid @enderror" placeholder="" />
                @error('mobile')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group d-none">
                <label class="input-label">{{ trans('auth.language') }}</label>
                <select name="language" class="form-control">
                    <option value="">{{ trans('auth.language') }}</option>
                    @foreach ($userLanguages as $lang => $language)
                        <option value="{{ $lang }}" @if (!empty($user) and mb_strtolower($user->language) == mb_strtolower($lang)) selected @endif>
                            {{ $language }}</option>
                    @endforeach
                </select>
                @error('language')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group d-none">
                <label class="input-label">{{ trans('update.timezone') }}</label>
                <select name="timezone" class="form-control select2" data-allow-clear="false">
                    {{-- <option value="" {{ empty($user->timezone) ? 'selected' : '' }} disabled>
                        {{ trans('public.select') }}</option>
                    @foreach (getListOfTimezones() as $timezone)
                        <option value="{{ $timezone }}" @if (!empty($user) and $user->timezone == $timezone) selected @endif>
                            {{ $timezone }}
                        </option>
                    @endforeach --}}
                    <option value="" {{ empty($user->timezone) ? 'selected' : '' }} disabled>
                        {{ trans('public.select') }}</option>
                    <option value="Asia/Kuala_Lumpur" selected>
                        Asia/Kuala_Lumpur
                    </option>
                </select>
                @error('timezone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label"
                    for="newsletterSwitch">{{ trans('auth.join_newsletter') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="join_newsletter" class="custom-control-input" id="newsletterSwitch"
                        {{ (!empty($user) and $user->newsletter) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="newsletterSwitch"></label>
                </div>
            </div> --}}

            {{-- <div class="form-group mt-30 d-flex align-items-center justify-content-between">
                <label class="cursor-pointer input-label" for="publicMessagesSwitch">{{ trans('auth.public_messages') }}</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="public_messages" class="custom-control-input" id="publicMessagesSwitch" {{ (!empty($user) and $user->public_message) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="publicMessagesSwitch"></label>
                </div>
            </div> --}}
        </div>
    </div>

</section>
