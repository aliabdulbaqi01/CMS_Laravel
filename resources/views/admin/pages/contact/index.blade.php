@extends('admin.layouts.master')
@section('title')
   Contact Messages
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Contact Messages</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3" >
                        <h4 class="card-title col-6 " style="display:inline">All Contact Message </h4>
                   </div>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>


                        <tbody>

                        @foreach($contacts as $contact)
                            <tr>
                                <td> {{ $contact->id}} </td>
                                <td> {{ $contact->name }} </td>
                                <td> {{ $contact->subject }} </td>
                                <td> {{ $contact->email }} </td>
                                <td class="{{ $contact->status == "true" ? 'text-success' :  'text-danger' }}">{{ $contact->status == "true" ? 'active' :  'inactive' }}</td>
                                <td><a href="{{route('admin.contact.show', $contact->id)}}" class="btn btn-success">Show</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->




@endsection

