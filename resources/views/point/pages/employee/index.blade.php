@extends('point.layouts.master')
@section('title')
    all employees
@endsection
@push('css')
    <!-- dataTables -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- dataTables end -->
@endpush
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="page-title">All Employee</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{route('point.employees.create')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Employee </a>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="page-title">All Employee</h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                        </thead>
<tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->id}}</td>
                                <td>
                                    <a href="{{route('point.employees.show', $employee->id)}}" class="btn btn-success waves-effect waves-light">show</a>
                                    <a href="{{route('point.employees.edit', $employee->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
                                    <a href="{{route('point.employees.delete', $employee->id)}}" class="btn btn-danger waves-effect waves-light">Delete</a>
                                </td>
                            </tr>
                        @endforeach

</tbody>


                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('js')
<!-- datatables js -->
<script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<!-- third party js ends -->


<script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>
<!-- Datatables Eend -->
@endpush
