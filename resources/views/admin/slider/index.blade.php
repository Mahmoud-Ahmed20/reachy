@extends('admin.layouts.master')

@section('title', 'Sliders')

@section('title-topbar', 'Sliders')

<!-- css insert -->
@section('css')

    <!-- -- datatables plugin -- -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.9/css/autoFill.bootstrap5.min.css">

@endsection


@section('fixedcontent')

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

    <!-- session successful message -->
    @if (Session::has('error_delete'))
        <div id="flash-msg" class="shadow pt-3" style="background-color:#ff4152;">
            <div class="d-flex justify-content-between mb-2">
                <i class="fas fs-1 fa-times"></i>
                <a id="flash-msg-btn" class="text-blue-300 clickable-item-pointer"><i class="fas fa-times"
                        style="color:#ffb4bc"></i></a>
            </div>
            <h3>We can't do it!</h3>
            <p style="color:#ffb4bc">{{ Session::get('error_delete') }}</p>
        </div>
    @endif

@endsection


<!-- content insert -->
@section('content')
    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                {{-- <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.home') }}">Dashboard |</a> --}}
                <a class="text-gray-300">Sliders</a>
            </span>


        </div>

        <div class="card shadow mb-3 pb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-globe-europe"></i> All Sliders</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display datatable-modal" id="p-lab-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-xxs">Image </th>
                                <th class="text-xxs">Url </th>
                                <th class="text-xxs">Type </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $item)
                                <tr>
                                    <td>
                                        <img class="rounded-circle avatar-small me-2"
                                            src="{{ URL::asset('img/slider/' . $item->image) }}">
                                        </a>
                                    </td>
                                    <td>{{ $item->url }}</td>

                                    <td>
                                        @if ($item->type == 1)
                                            اسليدر
                                        @elseif ($item->type == 2)
                                            سكشن وافر اكتر النهاردة
                                        @elseif ($item->type == 3)
                                            سكشن عروض السوبرماركت
                                        @elseif ($item->type == 4)
                                            سكشن عروض مستلزمات الاطفال
                                        @elseif ($item->type == 5)
                                            سكشن الي تحت عروض مسلزمات الاطفال
                                        @elseif ($item->type == 6)
                                            سكشن عروض الصحة و الجمال
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('sett.edit.slider', $item->id) }}"
                                            class="btn btn-sm status-col-link active-color-btn b-r-xs mb-1"
                                            title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete1" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                            <div class="modal-content b-r-s-cont border-0">

                                                <div class="modal-header">
                                                    <div class="modal-title" id="exampleModalLabel"><i
                                                            class="fas fa-trash me-1"></i>
                                                        Countrie delete</div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>



                                            </div>
                                        </div>
                                    </div>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection


<!-- js insert -->
@section('js')

    <!-- delete confirmation modal -->
    <script>
        $('.delete-conf').click(function(event) {
            var station_id = $(this).data("station_id");
            var name_ar = $(this).data("name_ar");
            console.log(station_id);
            var modal = $('.delete-conf-input [name="station_id"]')
            modal.val(station_id);
            $('#name_ar').val(name_ar);
        })
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#p-lab-table').DataTable({
                lengthChange: true,
                buttons: [{
                    extend: 'csv',
                    split: ['pdf', 'excel'],
                }]
            });
        });
    </script>

    <!-- -- datatables plugin -- -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>



@endsection
