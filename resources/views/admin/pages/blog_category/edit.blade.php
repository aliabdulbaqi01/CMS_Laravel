@extends('admin.layouts.master')
@section('title')
    Edit {{$category->name}} Category
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

                    <h4 class="card-title">Edit {{$category->name}} Blog Category </h4>

                    <form method="post" action="{{route('admin.blog.categories.update', $category->id)}}" >
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" id="name" value="{{$category->name ?? old('name')}}">
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- end row -->
                        <button type="submit" class="btn btn-info waves-effect waves-light">Update Category</button>
                    </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
