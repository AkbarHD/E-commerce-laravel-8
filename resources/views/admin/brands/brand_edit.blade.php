@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">


            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('brand.update', $brand->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                    <div class="form-group">
                                        <h5>Brand Name En<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="brand_name_en" name="brand_name_en"
                                                class="form-control"
                                                value="{{ old('brand_name_en', $brand->brand_name_en) }}">
                                            @error('brand_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Name Ind<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="brand_name_ind" name="brand_name_ind"
                                                class="form-control"
                                                value="{{ old('brand_name_ind', $brand->brand_name_ind) }}">
                                            @error('brand_name_ind')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Image Brand<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="brand_image" name="brand_image" class="form-control">
                                            @error('brand_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        {{-- <button type="submit" class="btn btn-primary btn-rounded btn-block mt-3">Tambah
                                        Brand</button> --}}
                                        <input type="submit" class="btn btn-primary btn-rounded btn-block mt-3"
                                            value="Edit Brand">
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
