@extends('admin/layouts.master')

@section('title', 'Admin')

@section('title-topbar', 'Admin')

<!-- css insert -->
@section('css')

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- boostrap datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <!-- tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.9/css/autoFill.bootstrap5.min.css">

@endsection




@section('fixedcontent')

    <div id="add_buttn_fixed">
        {{-- <a href="{{ route('sett.invoice.create') }}" class="text-white">
            <i class="fas fa-plus"></i>
        </a> --}}
    </div>

    <!-- session successful message -->
    @if (Session::has('success'))
        <div id="flash-msg" class="shadow pt-3">
            <div class="d-flex justify-content-between mb-2">
                <i class="fas fs-1 fa-check"></i>
                <a id="flash-msg-btn" class="text-blue-300 clickable-item-pointer"><i class="fas fa-times"></i></a>
            </div>
            <h3>Sent Successfully</h3>
            <p class="text-blue-300">{{ Session::get('success') }}</p>
        </div>
    @endif

@endsection

<!-- content insert -->
@section('content')
    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-5">

            <span class="mb-0">
                <a class="link-cust-text text-gray-200 fw-light"
                    href="{{ url('prox/admin') }}">{{ __('Admin.dashboard') }} |</a>
                <a class="text-gray-300">{{ __('Admin search') }}</a>
            </span>

            <div class="d-flex justify-content-center mt-2 mt-md-0">

                <a href="{{ route('sett.buyre.index') }}"
                    class=" main-color-bg btn btn-sm shadow-sm b-r-l-cont p-2 px-4 text-blue-200"><i
                        class="fas fa-users fa-sm text-blue-200 me-1"></i> {{ __('Admin') }}</a>

            </div>

        </div>


        <div class="row justify-content-center position-relative">

            <div class="col-12 col-md-10 col-lg-8 col-xl-7 text-center">
                <img class="img-fluid p-md-2" width="540px"
                    src="{{ URL::asset('img/dashboard/Admin-amico.png') }}" alt="">

                <div class="search-eng-cont">

                    <div class="p-1 bg-white rounded rounded-pill"
                        style="box-shadow: -1px 1rem 1rem 7px rgb(58 59 69 / 15%) !important; ">

                        <div class="input-group">
                            <input id="search" type="search"
                                placeholder="Write here the client name .."   autocomplete="off" aria-describedby="button-add"
                                class="form-control border-0 bg-transparent px-4" autofocus>
                            <div class="input-group-append pe-2 d-flex">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary typeahead"><i
                                        class="fa fa-search text-gray-300"></i></button>
                            </div>
                        </div>

                    </div>

                    <div id="search-eng-show-list" class="search-eng-results list-group p-4 bg-white b-r-l-b-cont"
                        style="box-shadow: -1px 1rem 1rem 7px rgb(58 59 69 / 15%) !important; display:none">
                    </div>

                </div>

            </div>
        </div>





        @endsection

        <!-- js insert -->
        @section('js')
            <script>
                $(document).ready(function() {

                  //   --------------------- search engine ajax -------------------


                    // Send Search Text to the server

                    $("#search").keyup(function() {

                        let search_query = $(this).val();

                        var url = "{{ route('sett.search.query.admin','search_query') }}";
                        url = url.replace('search_query', search_query);

                        if (search_query != "") {
                            $.ajax({
                                url: url,
                                type: "GET",
                                dataType: "json",
                                success: function(data) {
                                    console.log(data);
                                    $("#search-eng-show-list").show();

                                    if (data !== "") {
                                        var html = ''
                                        $.each(data, function(key, value) {
                                            var url_show =
                                               "{{ route('sett.show.client', 'id') }}";
                                          url_show = url_show.replace('id', value.id);

                                            html +=
                                                '<a href="' + url_show +
                                                '" class="search-eng-a d-flex justify-content-between list-group-item list-group-item-action border-1 text-gray-500" style="cursor: pointer;">' +
                                                '<div class="d-flex me-3 align-items-center"><i class="fas fa-search text-gray-200 me-2"></i><span>' +
                                                value.first_name +' '+ value.second_name +'</span></div>' +
                                                '<div class="text-truncate text-gray-300">' +

                                                '</div></a>';
                                        });
                                        $('#search-eng-show-list').html(html);
                                    }

                                    if (data == "") {
                                        $('#search-eng-show-list').html(
                                            '<a class="list-group-item list-group-item-action border-0"><i class="fas fa-search text-gray-200 me-2"></i>{{ __('This customer does not have a name') }}</a>'
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

        @endsection
