@extends('admin.layouts.master')
@section('title')
    Edit Footer
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

                    <h4 class="card-title">Edit {{$footerData->name}} Blog </h4>

                    <form method="post" action="{{ route('admin.footer.update', $footerData->id) }}" >
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input name="phone" class="form-control" type="text" id="phone" value="{{$footerData->phone ?? old('phone')}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input name="address" class="form-control" type="text" id="address" value="{{$footerData->address ?? old('address')}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="email" id="email" value="{{$footerData->email ?? old('email')}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <input name="facebook" class="form-control" type="text" id="facebook" value="{{$footerData->facebook ?? old('facebook')}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-10">
                                <input name="twitter" class="form-control" type="text" id="twitter" value="{{$footerData->twitter ?? old('twitter')}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                            <div class="col-sm-10">
                                <input name="copyright" class="form-control" type="text" id="copyright" value="{{$footerData->copyright ?? old('copyright')}}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="description" class="form-control">{{$footerData->description ?? old('description')}}</textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <button type="submit" class="btn btn-info waves-effect waves-light">Update Footer</button>
                    </form>



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


@endpush
