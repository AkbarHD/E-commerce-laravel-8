@extends('admin.admin_master')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Form Validation</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form novalidate>
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Brand <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="form-control" name="brand_id" id="brand_id">
                                                            <option value="">Pilih Brand</option>
                                                            @forelse ($brands as $brand)
                                                                <option value="{{ $brand->id }}">
                                                                    {{ $brand->brand_name_en }}</option>
                                                            @empty
                                                                <option value=""> No Data</option>
                                                            @endforelse
                                                        </select>
                                                        @error('brand_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="form-control" name="category_id" id="category_id">
                                                            <option value="">Pilih Category</option>
                                                            @forelse ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name_en }}</option>
                                                            @empty
                                                                <option value=""> No Data</option>
                                                            @endforelse
                                                        </select>
                                                        @error('category_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>SubCategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                            <option value="">Pilih SubCategory</option>
                                                        </select>
                                                        @error('subcategory_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="file" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">




                                        <div class="form-group">
                                            <h5>Basic Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="select" id="select" required class="form-control">
                                                    <option value="">Select Your City</option>
                                                    <option value="1">India</option>
                                                    <option value="2">USA</option>
                                                    <option value="3">UK</option>
                                                    <option value="4">Canada</option>
                                                    <option value="5">Dubai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Textarea <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Submit">
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
@endsection
