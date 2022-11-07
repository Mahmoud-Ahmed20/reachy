@extends('admin/layouts.master')

@section('title', 'Clients')

@section('title-topbar', 'Client')

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
                <a class="link-cust-text text-gray-200 fw-light" href="{{ route('sett.dashboard_admin') }}">Dashboard |</a>
                <a href="{{ route('sett.show.all.client') }}" class="link-cust-text text-gray-200 fw-light">
                    Smart Search|</a>
                <a class="text-gray-300">Client</a>

            </span>


        </div>

        <div class="card shadow mb-3 pb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i class="fas fa-users me-2"></i> All Clients</h6>

            </div>

            <!-- Card Body -->
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display datatable-modal" id="p-lab-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-xxs">Avatar</th>
                                <th class="text-xxs">Name</th>
                                <th class="text-xxs text-center">Email</th>
                                <th class="text-xxs text-center">Activision</th>
                                <th class="text-xxs text-center">Gendar</th>
                                <th class="text-xxs text-center">Phone</th>
                                <th class="text-xxs text-center">Country</th>
                                <th class="text-xxs text-center">Note</th>

                                <th class="text-xxs text-center">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buyre as $item)
                                <tr>
                                    <td>
                                        <a class="d-flex align-items-center"
                                            href="{{ route('sett.show.client', $item->id) }}">
                                            <img class="rounded-circle avatar-small me-2"
                                                src="{{ URL::asset('img/useravatar/' . $item->avatar) }}">

                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <h6
                                                class=" mb-1
                                          text-s fw-bold text-gray-mixed-400">
                                                {{ $item->first_name . ' ' . $item->second_name }}</h6>
                                            <p class="mb-0 text-xs text-gray-300"></p>
                                        </div>
                                    </td>


                                    <td>{{ $item->email }}</td>


                                    <td class="text-center">
                                        @if ($item->inactive == 0)
                                            <i class="fas fa-circle me-2 text-xxs mb-0 main-color"></i><span
                                                class="main-color fw-bold">Actived</span>
                                        @else
                                            <i class="fas fa-circle me-2 text-xxs mb-0 text-red"></i><span
                                                class="text-red fw-bold">deactivate</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($item->gendar == 'male')
                                            <i class="fas fa-circle me-2 text-xxs mb-0 main-color"></i><span
                                                class="main-color fw-bold">Male</span>
                                        @else
                                            <i class="fas fa-circle me-2 text-xxs mb-0 text-red"></i><span
                                                class="text-red fw-bold">Female</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    @if ($item->country_id == null)
                                        <td></td>
                                    @else
                                        <td>{{ $item->country->name_ar }}</td>
                                    @endif

                                    <td>{{ $item->note }}</td>


                                    <td class="text-center">
                                        <a href="{{ route('sett.edit_buyre', $item->id) }}"
                                            class="btn btn-sm status-col-link active-color-btn b-r-xs mb-1"
                                            title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                                        <a href="{{ route('sett.ShowOrders.client', $item->id) }}"
                                            class="btn btn-sm status-col-link main-color b-r-xs mb-1" title="Orders"><i
                                                class="fas fa-shopping-cart"></i> Order </a>

                                    </td>



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
            var role_id = $(this).data("role_id");
            var modal = $('.delete-conf-input [name="role_id"]')
            modal.val(role_id);
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
