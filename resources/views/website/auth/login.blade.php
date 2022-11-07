<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
tabindex="-1">
<div class="modal-dialog 	modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header px-4">
            <h5 class="modal-title" id="exampleModalToggleLabel">تسجيل دخول</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            <div class="container">

                <form action="{{ route('client.login_sub') }}" method="post">
                    @csrf
                    <label for="email-2" class=" fs-6 m-lg-1"> رقم الهاتف</label>
                    <input type="text" class="form-control mt-2 mb-2" name="phone" id="email-2"
                        value="{{ old('phone') }}">

                    <label for="password-2" class=" m-lg-1 fs-6"> كلمة المرور</label>
                    <input type="password" class="form-control mt-2 mb-0" name="password" id="password-2"
                        value="{{ old('password') }}">
                    <i class="fa-solid
                    fa-eye-slash"
                        style="position: absolute;top: 140px; left: 34px;" id="togglePassword"></i>
                    @error('phone')
                        <span class="error-msg-form">
                            {{ $message }}
                        </span>
                    @enderror
                    @error('password')
                        <span class="error-msg-form">
                            {{ $message }}
                        </span>
                    @enderror

                    <div class="d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="custom-control-input-user" name="remember"
                                id="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label fs-6" for="flexCheckDefault">
                                حفظ تسجيل الدخول
                            </label>
                        </div>

                        <div class="reset">
                            <p class="fs-7"> هل نسيت كلمت المرور ؟</p>
                        </div>
                    </div>

                    <button class="w-100 p-2 btn main-background mb-3 second-color  border-20 text-white mb-2"
                        type="submit">الدخول</button>
                </form>
                <div class="d-flex justify-content-center">
                    <p class="fw-bold  fs-6no-acount">ليس لديك حساب ؟</p>
                    <a href="" class="no-acount main-color fs-6 text-decoration-underline"
                        style="margin-right: 7px;">
                        تسجيل حساب
                    </a>
                </div>
                <a href="{{ route('seller.login') }}" class="no-acount main-color text-center fs-6 text-decoration-underline"
                    style="margin-right: 7px; display: block;">
                    تسجيل الدخول كبائع
                </a>
            </div>





        </div>


    </div>
</div>
</div>
