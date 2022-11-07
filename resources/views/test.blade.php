<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path('css/kv-mpdf-bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <!-- Card Body -->
    <div class="card-body px-4">




        <button id="get_location">Try It</button>

        <p id="demo"></p>

        <a title="delete" id="get_location" data-effect="effect-scale" data-bs-toggle="modal"
            class="status-col-link cancel-color-btn shadow-sm b-r-l-cont-right p-2 px-3 clickable-item-pointer"><i
                class="fas fa-trash"></i> {{ __('basic.delete') }}</a>


        <!-- Modal -->
        <div class="modal fade" id="attendance_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                <div class="modal-content b-r-s-cont border-0">

                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel"><i class="fas fa-trash me-1"></i>
                            Attendance</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('sett.hr_worker_attendance_insert') }}" method="post">
                        {{ method_field('POST') }}
                        {{ csrf_field() }}

                        <!-- Modal content -->
                        <div class="modal-body px-4">

                            <div class="modal-body delete-conf-input text-center py-0">
                                <p class="mb-0">ِAre you sure you want to attend to today?</p><br>
                                <input type="hidden" id="lati" name="lati" value="">
                                <input type="hidden" id="long" name="long" value="">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="left-side">
                                <button type="button" class="btn btn-default btn-link" data-bs-dismiss="modal">Never
                                    Mind</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-default btn-link text-red">Send
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>



    </div>



    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script>
        $(document).ready(function() {


            $(document).on('click', '#get_location', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            })

            function showPosition(position) {
                var item_id = $(this).data("item_id");
                var lati = $('#lati');
                var long = $('#long');

                lati.val(position.coords.latitude);
                long.val(position.coords.longitude);
                $('#attendance_modal').modal('show');
            }

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        x.innerHTML = "User denied the request for Geolocation."
                        break;
                    case error.POSITION_UNAVAILABLE:
                        x.innerHTML = "Location information is unavailable."
                        break;
                    case error.TIMEOUT:
                        x.innerHTML = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        x.innerHTML = "An unknown error occurred."
                        break;
                }
            }
        })
    </script>

</body>

</html>
