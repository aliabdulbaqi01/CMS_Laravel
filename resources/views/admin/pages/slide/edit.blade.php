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

                    <h4 class="card-title mb-4" >Edit Slide Section</h4>
                    <form action="{{route('admin.slides.update', $slides->id)}}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text"  id="title" name="title" value="{{$slides->title ?? old('title')}}"  class="form-control"  placeholder="Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="short_title" class="col-sm-2 col-form-label">Short title</label>
                            <div class="col-sm-10">
                                <input type="text"  id="short_title" name="short_title" value="{{$slides->short_title ?? old('short_title')}}"  class="form-control"  placeholder="Short title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                                <input type="text"  id="video_url" name="video_url" value="{{$slides->video_url ?? old('video_url')}}"  class="form-control"  placeholder="Video URL">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input type="file"  id="image" name="image"  class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <img class="rounded avatar-lg " id="showImage" src="{{$slides->image ? asset($slides->image) : url('uploads/no_image.jpg')}}" alt="Profile Image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-info waves-light waves-effect">Update Profile</button>
                    </form>
                    <!-- end row -->
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
