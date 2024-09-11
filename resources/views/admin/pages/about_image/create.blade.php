@extends('admin.layouts.master')
@section('title')
    Create About Image
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

                    <h4 class="card-title mb-4" >Add About Image</h4>
                    <form action="{{route('admin.images.store')}}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"> Image</label>
                            <div class="col-sm-10">
                                <input type="file"  id="image" name="image[]"  class="form-control" multiple="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <img class="rounded avatar-lg " id="showImage" src="{{ url('uploads/no_image.jpg')}}" alt="About Image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-info waves-light waves-effect">Add Image</button>
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
