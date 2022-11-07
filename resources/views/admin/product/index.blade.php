@extends('admin.layouts.master')

@section('title', 'Products | Proxima - Medical Management app')

@section('title-topbar', 'Products')

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
                <a class="text-gray-300">Products</a>
            </span>

            <div class="d-flex justify-content-center">
                {{-- <a href="{{ route('sett.hr_create_attendance_admin') }}"
                    class=" text-gray-400 bg-white btn btn-sm shadow-sm b-r-l-cont p-2 px-4 me-1"><i
                        class="fas fa-person-booth fa-sm me-1"></i> New Attendance</a> --}}

                <a href="{{ route('sett.product.create') }}"
                    class=" main-color-bg text-white btn btn-sm shadow-sm b-r-l-cont p-2 px-4 me-1"><i
                        class="fas fa-plus fa-sm me-1"></i> New Products</a>
            </div>
        </div>

        <div class="card shadow mb-3 pb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-globe-europe"></i> All Products</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display datatable-modal" id="p-lab-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-xxs">NAME ARABIC</th>
                                <th class="text-xxs">NAME ENGLISH</th>
                                <th class="text-xxs text-center">Active</th>
                                <th class="text-xxs">NAME SLUG ENGLISH </th>
                                <th class="text-xxs">NAME SLUG ARABIC</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->name_ar }}</td>
                                    <td>{{ $item->name_en }}</td>
                                    <td class="text-center">
                                        @if ($item->inactive == 0)
                                            <i class="fas fa-circle me-2 text-xxs mb-0 main-color"></i><span
                                                class="main-color fw-bold">Actived</span>
                                        @else
                                            <i class="fas fa-circle me-2 text-xxs mb-0 text-red"></i><span
                                                class="text-red fw-bold">deactivate</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->slug_ar }}</td>
                                    <td>{{ $item->slug_en }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('sett.product.edit', $item->id) }}"
                                            class="btn btn-sm status-col-link active-color-btn b-r-xs mb-1"
                                            title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                                        <a href="{{ route('sett.product.show', $item->id) }}"
                                            class="btn btn-sm status-col-link active-color-btn b-r-xs mb-1"
                                            title="Show"><i class="far fa-eye"></i> Show </a>
                                        <a class="btn btn-sm modal-effect status-col-link cancel-color-btn b-r-xs mb-1 delete-conf"
                                            title="delete" data-effect="effect-scale" data-product_id="{{ $item->id }}"
                                            data-name_ar="{{ $item->name_ar }}" data-bs-toggle="modal"
                                            data-bs-target="#delete1"><i class="fas fa-trash"></i> Delete
                                        </a>

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

                                                <form action="{{ route('sett.product.destroy', $item->id) }}"
                                                    method="post">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}

                                                    <!-- Modal content -->
                                                    <div class="modal-body px-4">

                                                        <div class="modal-body delete-conf-input text-center py-0">
                                                            <p class="mb-0">ِAre you sure you want to delete
                                                                this
                                                                city?</p><br>
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <div class="left-side">
                                                            <button type="button" class="btn btn-default btn-link"
                                                                data-bs-dismiss="modal">Never Mind</button>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="right-side">
                                                            <button type="submit"
                                                                class="btn btn-default btn-link text-red">Delete
                                                            </button>
                                                        </div>

                                                    </div>
                                                </form>

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
            var product_id = $(this).data("product_id");
            var name_ar = $(this).data("name_ar");
            console.log(product_id);
            var modal = $('.delete-conf-input [name="product_id"]')
            modal.val(product_id);
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
