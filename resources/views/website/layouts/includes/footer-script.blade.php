<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>




<!-- Toastr alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('errors'))
        toastr.error("{{ session()->get('errors')->first() }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

<!-- select 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        //hide search
        $('.select2-no-search').select2({
            minimumResultsForSearch: -1
        });
    });
</script>

<!-- Validator plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" type="text/javascript">
</script>

<script>
    //Rules for the Validator plugin
    var $validator = $('.myform').validate({
        rules: {
            favorite_address: {
                maxlength: 50,
            },
            name_street: {
                maxlength: 50,
            },
            address_details: {
                maxlength: 50,
            },
            building_number: {
                maxlength: 50,
            },
            apartment_number: {
                maxlength: 50,
            },
            phone: {
                maxlength: 50,
            },

        },

        //for inserting erros for some inputs that makes posation problem such as selector 2 and bt datapicker
        errorPlacement: function(error, element) {
            switch (element.attr("name")) {
                case 'permissions':
                    error.insertAfter($("#permissions-js-error-valid"));
                    break;

                default:
                    error.insertAfter(element);
            }

        },
    });
</script>


<script>
    //--------------------- search engine ajax -------------------

    $(document).ready(function() {
        // Send Search Text to the server
        $("#search").keyup(function() {

            let search = $(this).val();
            console.log(search);
            if (search != "") {

                var url = "{{ route('products.search', 'search_query') }}";
                url = url.replace('search_query', search);

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#search-eng-show-list").show();

                        if (data !== "") {

                            var html = ''
                            $.each(data, function(key, value) {

                                var url_show =
                                    "{{ route('products.show', 'slug') }}";
                                url_show = url_show.replace('slug', value.slug_en);
                                var url_image =
                                    "{{ URL::asset('img/products/') }}" +
                                    "/" +
                                    value.cover_image;
                                html +=
                                '<div class="d-flex align-items-center mb-3 px-3 py-2"><img style="width:50px; height: 50px; object-fit: cover;"  src="' +
                                    url_image + '">';
                                html +=
                                '<a href="' + url_show +
                                    '" class="fs-6 text-black me-3 fw-light" style="cursor: pointer; color:#000;">' +
                                    value.name_ar + '</a></div>';   
                                


                            });
                            $('#search-eng-show-list').html(html);
                        }

                        if (data == "") {
                            $('#search-eng-show-list').html(
                                '<li class="justify-content-center mt-3"style="color:#000; list-style:none; text-align:center;"><i class="fas fa-search text-gray-200 ms-2"></i>لا يوجد نتيجة </li><hr>'
                            );
                        }
                    },
                });
            } else {
                $("#search-eng-show-list").empty();
                $("#search-eng-show-list").hide();;
            }
        });
    });
</script>


@yield('js')

<!-- own script -->
{{-- <script src="{{ URL::asset('js/multe-forme.js') }}"></script> --}}
<script src="{{ URL::asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.nice-select.js') }}"></script>

<script src="{{ URL::asset('js/main.js') }}"></script>
<script src="{{ URL::asset('js/menu.js') }}"></script>
