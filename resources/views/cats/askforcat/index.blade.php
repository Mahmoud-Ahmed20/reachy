@extends('layouts.master')

@section('title', 'Ask for | Proxima - Medical Management app')

@section('title-topbar', 'Ask for')

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
                <a class="text-gray-300">{{ __('patientappo.Ask for controll') }}</a>
            </span>

            <div class="d-flex justify-content-center">
                <a href="{{ route('sett.askforcat.create') }}"
                    class=" main-color-bg text-white btn btn-sm shadow-sm b-r-l-cont p-2 px-4 me-1"><i
                        class="fas fa-plus fa-sm me-1"></i> {{ __('basic.new') }}</a>
            </div>
        </div>

        <div class="card shadow mb-3 pb-2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 fw-bold text-gray-500"><i
                        class="fas fa-capsules me-2"></i>{{ __('patientappo.Ask for controll') }}</h6>
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
                                <th class="text-xxs">{{ __('basic.id') }}</th>
                                <th class="text-xxs">{{ __('basic.name') }}</th>
                                <th class="text-xxs text-center">{{ __('basic.handle') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($askfor as $item)
                                <tr>


                                    <td>
                                        {{ $item->id }}
                                    </td>

                                    <td>
                                        {{ $item->name }}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('sett.askforcat.edit', $item->id) }}"
                                            class="btn btn-sm status-col-link active-color-btn b-r-xs mb-1" title="edit"><i
                                                class="fas fa-pencil-alt"></i> {{ __('basic.edit') }} </a>

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
