@extends('website/layouts.master_top')

@section('title', 'address')

<!-- css insert -->
@section('css')

    <link rel="stylesheet" href="{{ URL::asset('css/input-tel.css') }}">

@endsection

<!-- content insert -->
@section('content')


    <!-- contente -->
    <section>
        <div class="container-fluid">
            <div class="row">
                @include('website.layouts.includes.sidebar_2')



                <div class="col-12 col-xl-9 div-boxshadow pt-4">
                    <div class="back-gift">
                        <div class="title-order">
                            <h2>اشترك دلوقتي في الباقة الفضية</h2>
                            <p>وهتوفر لحد 1250 جنيه على مشترياتك</p>
                            <button>تسوق الان</button>
                        </div>
                    </div>
                    <div class="mt-5 p-4">
                        <h2 class="mb-2 fw-bold fs-5"> <i class="fa-solid fa-location-dot"></i> إضافة عنوان جديد </h2>
                        <div class="row">
                            <div class="col-lg-7">
                                <form action="{{ route('client.address.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <select name="country_id"
                                                class="js-example-basic-single border-radius form-control">
                                                <option value="0">
                                                    البلد
                                                </option>
                                                @foreach ($country as $iteam)
                                                    <option value="{{ $iteam->id }}">{{ $iteam->name_ar }}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <select
                                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('branch') is-invalid @enderror"
                                                name="city_id" required>
                                                <option value="0">
                                                    المدينة
                                                </option>

                                            </select>
                                            @error('city_id')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <select
                                                class="js-example-basic-single select2-no-search select2-hidden-accessible @error('branch') is-invalid @enderror"
                                                name="region_id" required>
                                                <option value="0">
                                                    المنطقة
                                                </option>

                                            </select>
                                            @error('region_id')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" name="name_street" class="form-control"
                                                placeholder="اسم الشارع" aria-label="Last name">
                                            @error('name_street')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="number" name="building_number" class="form-control"
                                                placeholder="رقم الدور" aria-label="First name">
                                            @error('building_number')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="number" name="apartment_number" class="form-control"
                                                placeholder="رقم الشقة" aria-label="Last name">
                                            @error('apartment_number')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <textarea name="address_details" id="" rows="5" placeholder="العنوان بالتفصيل" class="form-control"
                                                style="height: 115px;"></textarea>
                                            {{-- <input type="text" class="form-control" placeholder="العنوان بالتفصيل"> --}}
                                            @error('address_details')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- <div class="col">
                                            <input type="number" class="form-control" placeholder="رقم العمارة"
                                                aria-label="First name">
                                        </div> --}}
                                        {{-- <div class="col">
                                            <input type="text" class="form-control" placeholder="علامة مميزه"
                                                aria-label="Last name">
                                        </div> --}}
                                        <div class="col">
                                            <input class="form-control" type="text" id="phone"
                                                placeholder="e.g. +20 1157593629" name="phone" value="+20 ">
                                            @error('phone')
                                                <span class="error-msg-form">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <button class="btn-form">حفظ</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="col-lg-5">
                                <img src="{{ asset('image/pin_12.png') }}" width="100%" height="100%" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>



@endsection


<!-- js insert -->
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Use as a jQuery plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src='https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?1549804213570'></script>
    <script src="./script.js"></script>
    <script>
        // jQuery
        // International telephone format
        // $("#phone").intlTelInput();
        // get the country data from the plugin
        var countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone"),
            addressDropdown = document.querySelector("#address-country");

        // init plugin
        var iti = window.intlTelInput(input, {
            hiddenInput: "full_phone",
            utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js?1549804213570" // just for formatting/placeholders etc
        });

        // populate the country dropdown
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            var optionNode = document.createElement("option");
            optionNode.value = country.iso2;
            var textNode = document.createTextNode(country.name);
            optionNode.appendChild(textNode);
            addressDropdown.appendChild(optionNode);
        }
        // set it's initial value
        addressDropdown.value = iti.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        input.addEventListener('countrychange', function(e) {
            addressDropdown.value = iti.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        addressDropdown.addEventListener('change', function() {
            iti.setCountry(this.value);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            //hide search
            $('.select2-no-search').select2({
                minimumResultsForSearch: -1
            });
        });
    </script>
    <script>
        $('select[name="country_id"]').on('change', function(e) {
            e.preventDefault();
            var countryID = $(this).val();
            var url = "{{ route('client.city_get_ajax', ':id') }}";
            url = url.replace(':id', countryID);
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="' +
                                value.id + '">' + value.name_ar + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city_id"]').empty();
            }
        });
        $('select[name="city_id"]').on('change', function(e) {
            e.preventDefault();
            var countryID = $(this).val();
            var url = "{{ route('client.region_get_ajax', ':id') }}";
            url = url.replace(':id', countryID);
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="region_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="region_id"]').append('<option value="' +
                                value.id + '">' + value.name_ar + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="region_id"]').empty();
            }
        });
    </script>
@endsection
