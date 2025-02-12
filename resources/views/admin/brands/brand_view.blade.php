@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand Name En</th>
                                        <th>Brand Name Ind</th>
                                        <th>Brand Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($brands as $item)
                                        <tr>
                                            <td>{{ $item->brand_name_en }}</td>
                                            <td>{{ $item->brand_name_ind }}</td>
                                            <td>
                                                <img src="{{ asset($item->brand_image) }}" alt="">
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-info">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data"></form>
                                <div class="form-group">
                                    <h5>Brand Name En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_en" name="brand_name_en"
                                            class="form-control">
                                        @error('brand_name_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Brand Name Ind<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_ind" name="brand_name_ind"
                                            class="form-control">
                                        @error('brand_name_ind')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Image Brand<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="brand_image" name="brand_image"
                                            class="form-control">
                                        @error('brand_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary btn-rounded btn-block mt-3">Tambah Brand</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
