@extends('admin.layouts.master')

@section('title', 'New Ctiy | Proxima - Medical Management app')

@section('title-topbar', 'New Ctiy')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


<!-- content insert -->
@section('content')

    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                {{-- <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.home') }}">Dashboard |</a> --}}
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.countries.index') }}">Buyre | </a>
                <a class="text-gray-300">Add Buyre</a>
            </span>
        </div>

        <div class="card card-input shadow mb-3 pb-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-plus me-2"></i> Add new buyre</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body px-3">

                <form id="myforminput" method="POST" action="{{ route('sett.update.buyre', $buyre->id) }}"
                    enctype=multipart/form-data>

                    @csrf

                    <div class="row mb-2 ">

                        <!-- <div class="col-12 col-md-12 mb-2">
                                                                                            <label class="form-label">Ctiy <small>(required)</small></label>
                                                                                            <select class="js-example-basic-single select2-no-search select2-hidden-accessible"
                                                                                                name="city_id" required>

                                                                                            </select>

                                                                                            @error('country_id')
        <span class="error-msg-form">
                                                                                                                                                                    {{ $message }}
                                                                                                                                                                </span>
    @enderror
                                                                                        </div> -->
                        <div class="col-12 col-md-6 align-self-center mb-2">

                            <div class="avatar-update-container">
                                <div class="picture">
                                    <img src="{{ URL::asset('img/useravatar/' . $buyre->avatar) }}" class="picture-src"
                                        id="mib_PicturePreview" title="" />
                                    <input type="file" name='avatar' accept="image/*" id="mib_img_input">
                                </div>
                                <h6 class="text-gray-300">Choose Picture</h6>

                                @error('avatar')
                                    <span class="error-msg-form">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>


                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Email <small>(required)</small></label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Write your email here" value="{{ $buyre->email }}">

                            @if ($errors->has('email'))
                                <span class="error-msg-form">
                                    {{ $errors->first('email') }}
                                </span>
                            @else
                                <div class="form-text text-gray-200">We'll never share your email with anyone else.
                                </div>
                            @endif

                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">First Name<small>(required)</small></label>
                            <input name="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror"
                                placeholder="Write the first name  here.." value="{{ $buyre->first_name }}">

                            @error('first_name')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Second Name<small>(required)</small></label>
                            <input name="second_name" type="text"
                                class="form-control @error('second_name') is-invalid @enderror"
                                placeholder="Write the second name here.." value="{{ $buyre->second_name }}">

                            @error('second_name')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-md-6 mb-2">
                                <label class="form-label">Password <small>(required)</small></label>
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Wrtie your password here..." value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="error-msg-form">
                                        {{ $errors->first('password') }}
                                    </span>
                                @else
                                    <div class="form-text text-gray-200">We'll never share your email with anyone else.
                                    </div>
                                @endif
                            </div>


                            <div class="col-12 col-md-6 mb-2">
                                <label class="form-label">Confirm password <small>(required)</small></label>
                                <input name="password_confirmation" type="password" class="form-control"
                                    placeholder="Confirm your password..." id="password-confirm"
                                    value="{{ old('password_confirmation') }}">
                            </div>

                        </div>



                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Gendar <small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('gendar') is-invalid @enderror"
                                name="gendar" required value="{{ $buyre->gendar }}">
                                <option value="male" @if ($buyre->gendar === 'male') selected @endif>Male</option>
                                <option value="female" @if ($buyre->gendar === 'female') selected @endif>Female</option>
                            </select>
                            <div id="gendar-js-error-valid"></div>

                            @error('gendar')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Countries<small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('country') is-invalid @enderror"
                                name="country_id" required>
                                @foreach ($Country as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_en }}</option>
                                @endforeach

                            </select>

                            @error('favorite_payment')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Activision <small>(required)</small></label>
                            <select
                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('inactive') is-invalid @enderror"
                                name="inactive" required value="{{ $buyre->inactive }}">
                                <option value="0" @if ($buyre->inactive === 0) selected @endif>Active</option>
                                <option value="1" @if ($buyre->inactive === 1) selected @endif>Deactivate
                                </option>
                            </select>
                            <div id="deactivate-js-error-valid"></div>

                            @error('inactive')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Note<small>(required)</small></label>
                            <textarea name="note" type="text" class="form-control @error('note') is-invalid @enderror"
                                placeholder="Write the note here..">{{ $buyre->note }}</textarea>

                            @error('note')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label">Phone Number <small>(required)</small></label>
                            <input name="phone" type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Write the phone number here.." required value="{{ $buyre->phone }}">

                            @error('phone_number')
                                <span class="error-msg-form">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                    </div>

                    <div class="d-flex pt-4 justify-content-center">
                        <button type="submit" class="btn btn-default btn-primary">Update
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection

<!-- js insert -->
@section('js')

    <!-- select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            //hide search
            $('.select2-no-search').select2({
                minimumResultsForSearch: -1
            });

            //multi select
            $('#multiselect').select2();
            $('#multiselect').on('select2:opening select2:closing', function(event) {
                var $searchfield = $(this).parent().find('.select2-search__field');
                $searchfield.prop('disabled', true);
            });
        });
    </script>

    <!-- validate jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" type="text/javascript">
    </script>
    <script>
        //Rules for the Validator plugin
        var $validator = $('#myforminput').validate({
            rules: {
                first_name: {
                    minlength: 3,
                },
                second_name: {
                    minlength: 3,
                },
                password: {
                    minlength: 7,
                    maxlength: 100,
                },
                password_confirmation: {
                    minlength: 7,
                    maxlength: 100,
                    equalTo: '#password',
                },
                note: {
                    minlength: 3,
                },

                phone: {
                    minlength: 11,
                },
            },
            messages: {
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                },
                password_confirmation: {
                    equalTo: "Password does not match",
                }
            },
            //for inserting erros for some inputs that makes posation problem such as selector 2 and bt datapicker
            errorPlacement: function(error, element) {
                switch (element.attr("name")) {

                    case 'note':
                        error.insertAfter($("#note-js-error-valid"));
                        break;
                    case 'gendar':
                        error.insertAfter($("#gendar-js-error-valid"));
                        break;
                    case 'phone_number':
                        error.insertAfter($("#phone_number-js-error-valid"));
                        break;
                    case 'active':
                        error.insertAfter($("#ctivate-js-error-valid"));
                        break;

                    default:
                        error.insertAfter(element);
                }

            },
        });
    </script>
    <!-- <script>
        //for country and cities ajax inputs
        $('select[name="country"]').on('change', function(e) {
            e.preventDefault();

            var countryID = $(this).val();
            var url = "{{ route('sett.createcityajax', ':id') }}";
            url = url.replace(':id', countryID);

            if (countryID) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"]').empty();
            }
        });
    </script> -->

@endsection
