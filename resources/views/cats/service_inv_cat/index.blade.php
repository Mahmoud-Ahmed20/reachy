@extends('layouts.master')

@section('title', 'Main category | Proxima - Medical Management app')

@section('title-topbar', 'Main category')

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

@endsection


<!-- content insert -->
@section('content')
    <div class="container-fluid px-2 mt-3">

        <!-- page title link -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="mb-0">
                <a class="link-cust-text text-gray-200 fw-light"
                    href="{{ route('sett.home') }}">{{ __('basic.dashboard') }} |</a>
                <a class="text-gray-300">{{ __('basic.main category invoice') }}</a>
            </span>

            <div class="d-flex justify-content-center">
                <a href="{{ route('sett.service_inv_cat.create') }}"
                    class=" main-color-bg text-white btn btn-sm shadow-sm b-r-l-cont p-2 px-4 me-1"><i
                        class="fas fa-plus fa-sm me-1"></i> {{ __('basic.new') }}</a>
            </div>
        </div>

        <div class="card shadow mb-3 pb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i
                        class="fas fa-capsules me-2"></i>{{ __('patientappo.main category invoice') }}</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-300"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Action:</div>
                        <a class="dropdown-item" href="{{ route('sett.resourcecat.index') }}"><i
                                class="fas fa-users me-1"></i>
                            {{ __('basic.new') }}</a>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display datatable-modal" id="p-lab-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-xxs text-center">{{ __('basic.id') }}</th>
                                <th class="text-xxs text-center">{{ __('basic.name') }}</th>
                                <th class="text-xxs text-center">{{ __('basic.handle') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($service as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $item->id }}
                                    </td>

                                    <td class="text-center" width="50%">
                                        {{ $item->name }}
                                    </td>

                                    <td class="text-center">
                                        @if (!in_array($item->id, [1, 2, 3, 4, 5, 6, 7, 8, 9]))
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('sett.service_inv_cat.edit', $item->id) }}"
                                                    class="status-col-link main-color-btn text-white clickable-item-pointer shadow-sm b-r-l-cont-left rate-appointment p-2 px-3">
                                                    <i class="fas fa-edit fa-sm"></i>
                                                    {{ __('basic.edit') }}
                                                </a>
                                                <a title="delete" data-effect="effect-scale"
                                                    data-item_id="{{ $item->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#delete1"
                                                    class="delete-conf status-col-link cancel-color-btn shadow-sm b-r-l-cont-right p-2 px-3 clickable-item-pointer"><i
                                                        class="fas fa-trash"></i> {{ __('basic.delete') }}</a>
                                            </div>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="delete1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                <div class="modal-content b-r-s-cont border-0">

                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel"><i class="fas fa-trash me-1"></i>
                            Item delete</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('sett.service_inv_cat.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}

                        <!-- Modal content -->
                        <div class="modal-body px-4">

                            <div class="modal-body delete-conf-input text-center py-0">
                                <p class="mb-0">ِAre you sure you want to delete
                                    this item?</p><br>
                                <input type="hidden" name="id_delete" value="">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="left-side">
                                <button type="button" class="btn btn-default btn-link" data-bs-dismiss="modal">Never
                                    Mind</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-default btn-link text-red">Delete
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection

<!-- js insert -->
@section('js')
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

    <!-- delete confirmation modal -->
    <script>
        $('.delete-conf').click(function(event) {
            var item_id = $(this).data("item_id");
            var modal = $('.delete-conf-input [name="id_delete"]')
            modal.val(item_id);
        })
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
