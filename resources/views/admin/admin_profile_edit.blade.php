@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Profile</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="" novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="text" class="form-control"
                                                            value="{{ $editData->name }}" required>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $editData->email }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="image" type="file" name="profile_photo_path" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <img id="showImage" class="rounded-circle" style="width: 85px; height: 85px;"
                                                    src="{{ !empty($editData->profile_photo_path) ? asset('upload/admin_images/' . $editData->profile_photo_path) : asset('upload/no_images.jpg') }}"alt="User Avatar">
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info mb-5">Submit</button>
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']); 
                });
            });
    </script>
@endsection
