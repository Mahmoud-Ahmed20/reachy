

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog 	modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title" id="exampleModalToggleLabel"> انشاء حساب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container">

                    <form id="myform" class="myform" action="{{ route('client.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="name-one" class="mb-2 fs-6 m-lg-1"> الاسم الاول</label>
                                <input name="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" id="name-one"
                                    required value="{{ old('first_name') }}">
                                <span class="text-danger" id="first_name-ErrorMsg"></span>

                            </div>
                            <div class="col-6">
                                <label for="name-two" class="mb-2 fs-6 m-lg-1">الاسم الاخير </label>
                                <input name="second_name" type="text"
                                    class="form-control @error('second_name') is-invalid @enderror" required
                                    value="{{ old('second_name') }}" id="name-two">
                                <span class="text-danger" id="second_name-ErrorMsg"></span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="email" class="mb-2 fs-6 m-lg-1">البريد الالكتروني</label>
                                <input name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" id="email">
                                <span class="text-danger" id="email-ErrorMsg"></span>

                            </div>
                            <div class="col-6">
                                <label for="phone" class="mb-2 fs-6 m-lg-1"> رقم الهاتف </label>
                                <input name="phone" type="number"
                                    class="form-control @error('phone') is-invalid @enderror" required
                                    value="{{ old('phone') }}" id="phone">
                                <span class="text-danger" id="phone-ErrorMsg"></span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="pass" class="mb-2 fs-6 m-lg-1"> كلمة المرور</label>
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Wrtie your password here..." required id="pass">
                                <span class="text-danger" id="password-ErrorMsg"></span>

                            </div>
                            <div class="col-6">
                                <label for="password" class="mb-2 m-lg-1 fs-6"> تأكيد كلمة المرور </label>
                                <input name="password_confirmation" type="password" class="form-control"
                                    id="password-confirm" required id="password">
                                <span class="text-danger" id="password_confirmation-ErrorMsg"></span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <select name="gendar" class="js-example-basic-single_resp border-radius form-control">
                                    <option selected="selected"> النوع</option>
                                    <option value="male">ذكر</option>
                                    <option value="female">انثي</option>
                                </select>
                                <span class="text-danger" id="gendar-ErrorMsg"></span>
                            </div>
                        </div>

                        <button class="w-100 p-2 btn main-background mb-3 mt-5 border mb-2"
                            id="submit_register_client">الدخول</button>

                        @if ($errors->has('password'))
                            <span class="error-msg-form">
                                {{ $errors->first('password') }}
                            </span>
                        @else
                            {{-- <div class="form-text text-gray-200">We'll never share your email with anyone
                                else.
                            </div> --}}
                        @endif

                        @error('phone')
                            <span class="error-msg-form">
                                {{ $message }}
                            </span>
                        @enderror
                        @error('second_name')
                            <span class="error-msg-form">
                                {{ $message }}
                            </span>
                        @enderror
                        @error('first_name')
                            <span class="error-msg-form">
                                {{ $message }}
                            </span>
                        @enderror
                        @error('email')
                            <span class="error-msg-form">
                                {{ $message }}
                            </span>
                        @enderror
                    </form>

                    <div class="d-flex justify-content-center">
                        <p class="fw-bold no-acount fs-6"> لديك حساب ؟</p>
                        <a href="" class="no-acount main-color text-decoration-underline fs-6"
                            style="margin-right: 7px;">
                            تسجيل دخول
                        </a>

                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="d-flex justify-content-around">
                            <p class="fw-bold "> ليس لديك حساب؟</p>
                            <a class="main-color" href="{{ route('seller.register') }}"> إنشاء حساب كبائع</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


	</div>


<div class="modal fade" id="otp_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-6 mt-4 " id="exampleModalToggleLabel"> اكتب رمز التأكيد
                    هنبعتلك دلوقتي كود على موبايلك مكون من 6 أرقام يرجى كتابة الكود لتأكيد حسابك</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="get" class="digit-group mt-3 text-center" data-group-name="digits"
                        data-autosubmit="false" autocomplete="off">
                        <input type="text" id="digit_1" name="digit-1" data-next="digit_1" />
                        <input type="text" id="digit_2" name="digit_2" data-next="digit_2"
                            data-previous="digit_1" />
                        <input type="text" id="digit_3" name="digit_3" data-next="digit_3"
                            data-previous="digit_2" />
                        <input type="text" id="digit_4" name="digit_4" data-next="digit_4"
                            data-previous="digit_3" />
                    </form>
                    <button id="otp_send" class="w-100 p-2 btn main-background mb-3 mt-5 border mb-2">تم</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    //add new client
    $(document).on('click', "#submit_register_client", function(e) {
        e.preventDefault();

        //run vlidation plugin
        var first_name = $("input[name='first_name']").val();
        var second_name = $("input[name='second_name']").val();
        var email = $("input[name='email']").val();
        var phone = $("input[name='phone']").val();
        var password = $("input[name='password']").val();
        var password_confirmation = $("input[name='password_confirmation']").val();
        var gendar = $("select[name='gendar']").val();

        var url = "{{ route('client.store') }}";

        $(this).prop("disabled", true);
        // add spinner to button
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );

        $.ajax({
            url: url,
            type: 'POST',
            dataType: "json",
            data: {
                '_token': "{{ csrf_token() }}",
                'first_name': first_name,
                'second_name': second_name,
                'email': email,
                'phone': phone,
                'password': password,
                'password_confirmation': password_confirmation,
                'gendar': gendar,
            },
            success: function(data) {
                if (data.status == true) {
                    toastr.success("The user Has Added Successfully");
                    $('.modal').modal('hide');
                    $("#otp_modal").modal("show");

                } else {
                    toastr.error("Sorry, We Could not Add The New user");
                }
            },
            error: function(err) {

                // remove spinner to button
                $("#submit_register_client").prop("disabled", false);
                $("#submit_register_client").html('ارسال');
                $('#first_name-ErrorMsg').text(err.responseJSON.errors.first_name);
                $('#second_name-ErrorMsg').text(err.responseJSON.errors.second_name);
                $('#email-ErrorMsg').text(err.responseJSON.errors.email);
                $('#phone-ErrorMsg').text(err.responseJSON.errors.phone);
                $('#password-ErrorMsg').text(err.responseJSON.errors.password);
                $('#password_confirmation-ErrorMsg').text(err.responseJSON.errors
                    .password_confirmation);
                $('#gendar-ErrorMsg').text(err.responseJSON.errors.gendar);
                toastr.error("Sorry, Something went wrong");
            },
        });

    });

    //otp confirm
    $(document).on('click', "#otp_send", function(e) {
        e.preventDefault();

        //run vlidation plugin
        var digit_1 = $("input[name='digit_1']").val();
        var digit_2 = $("input[name='digit_2']").val();
        var digit_3 = $("input[name='digit_3']").val();
        var digit_4 = $("input[name='digit_4']").val();

        var digits = digit_1 + digit_2 + digit_3 + digit_4;

        var url = "{{ route('client.register_with_otp') }}";

        $(this).prop("disabled", true);
        // add spinner to button
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );

        $.ajax({
            url: url,
            type: 'POST',
            dataType: "json",
            data: {
                '_token': "{{ csrf_token() }}",
                'digits': digits,
            },
            success: function(data) {
                if (data.status == true) {
                    toastr.success("The user Has Added Successfully");
                    $(location).attr('href', 'https://google.com');
                } else {
                    toastr.error("Sorry, We Could not Add The New user");
                }
            },
            error: function(err) {
                // remove spinner to button
                $("#submit_register_client").prop("disabled", false);
                $("#submit_register_client").html('ارسال');
                $('#first_name-ErrorMsg').text(err.responseJSON.errors.first_name);
                toastr.error("Sorry, OTP went wrong");
            },
        });

    });
</script>
