@extends('admin.layouts.master')
@section('title')
    Edit Slide
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

                    <h4 class="card-title mb-4" >Edit About Page</h4>
                    <form action="{{route('admin.abouts.update', $about->id)}}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text"  id="title" name="title" value="{{$about->title ?? old('title')}}"  class="form-control"  placeholder="Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="short_title" class="col-sm-2 col-form-label">Short title</label>
                            <div class="col-sm-10">
                                <input type="text"  id="short_title" name="short_title" value="{{$about->short_title ?? old('short_title')}}"  class="form-control"  placeholder="Short title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <input type="text"  id="short_description" name="short_description" value="{{$about->short_description ?? old('short_description')}}"  class="form-control"  placeholder="Video URL">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="elm1" class="col-sm-2 col-form-label">Long Description </label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="long_description"> {{ $about->long_description }} </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">About Image</label>
                            <div class="col-sm-10">
                                <input type="file"  id="image" name="image"  class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <img class="rounded avatar-lg " id="showImage" src="{{$about->image ? asset($about->image) : url('uploads/no_image.jpg')}}" alt="About Image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-info waves-light waves-effect">Update About data</button>
                    </form>
                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@push('js')
    <!--tinymce js-->
    <script src="{{asset('backend/assets/libs/tinymce/tinymce.min.js')}}"></script>

    <!-- init js -->
    <script src="{{asset('backend/assets/js/pages/form-editor.init.js')}}"></script>

    {{--     show image script--}}
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
