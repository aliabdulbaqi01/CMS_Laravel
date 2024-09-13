@extends('admin.layouts.master')
@section('title')
   Create new Blog Category
@endsection
@push('css')
    // jquery
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Create new Blog Category </h4>

                    <form method="post" action="{{ route('admin.blog.categories.store') }}" >
                        @csrf
                        <div class="row mb-3 ">
                            <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input name="name" class="form-control" type="text" id="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <button type="submit" class="btn btn-info waves-effect waves-light">add new Category</button>
                    </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
