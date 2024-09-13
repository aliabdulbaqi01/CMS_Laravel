@extends('admin.layouts.master')
@section('title')
   Blog
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Blogs</h4>



            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div >
                        <h4 class="card-title col-6 " style="display:inline">All blogs </h4>
                        <a href="{{route('admin.blogs.create')}}" class=" btn btn-info waves-effect waves-light mb-3" style="float: right" >add new blog</a>
                    </div>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Action</th>
                        </thead>


                        <tbody>

                        @foreach($blogs as $blog)
                            <tr>
                                <td> {{ $blog->id}} </td>
                                <td> {{ $blog->title }} </td>
                                <td> {{ $blog->tags }} </td>
                                <td> <img src="{{ asset($blog->image) }}" style="width: 60px; height: 50px;"> </td>
                                <td>{{ $blog->category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit',$blog->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                    <form action="{{ route('admin.blogs.destroy',$blog->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt">Delete</i></button>
                                    </form>
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

