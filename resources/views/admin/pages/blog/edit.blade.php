@extends('admin.layouts.master')
@section('title')
    Edit {{$blog->name}} Portfolio
@endsection
@push('css')
    // jquery
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{--    Tags INput   --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
    <style type="text/css">
        .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: #b70000 ;
            font-weight: 700px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit {{$blog->name}} Blog </h4>

                    <form method="post" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title </label>
                            <div class="col-sm-10">
                                <input name="title" class="form-control" type="text" id="title" value="{{$blog->title ?? old('title')}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-select" aria-label="Default select example">
                                    @foreach($categories as $category)
                                        <option @selected($category->id == $blog->category->id) value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="tags" class="col-sm-2 col-form-label">Blog Tags </label>
                            <div class="col-sm-10">
                                <input name="tags" value="{{$blog->tags ?? old('tags')}}" class="form-control " type="text" data-role="tagsinput">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="description" class="form-control">{{$blog->description ?? old('description')}}</textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"> Image </label>
                            <div class="col-sm-10">
                                <input name="image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                            <div class="col-sm-10">
                                <img id="showImage" class="rounded avatar-lg" src="{{$blog->image ? asset($blog->image) : url('uploads/no_image.jpg') }}" alt="show image">
                            </div>
                        </div>
                        <!-- end row -->
                        <button type="submit" class="btn btn-info waves-effect waves-light">Update portfolio</button>
                    </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@push('js')
    {{--  tags input   --}}
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>

    <!--tinymce js-->
    <script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

    <!-- init js -->
    <script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>


    {{--  show Image  --}}
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
