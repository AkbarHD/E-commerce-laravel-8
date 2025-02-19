@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">


            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('category.update', $category->id) }}" method="post" >
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <h5>category Name En<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_name_en" name="category_name_en"
                                                class="form-control"
                                                value="{{ old('category_name_en', $category->category_name_en) }}">
                                            @error('category_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>category Name Ind<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_name_ind" name="category_name_ind"
                                                class="form-control"
                                                value="{{ old('category_name_ind', $category->category_name_ind) }}">
                                            @error('category_name_ind')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_icon" name="category_icon" value="{{ old('category_icon', $category->category_icon) }}" class="form-control">
                                            @error('category_icon')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        {{-- <button type="submit" class="btn btn-primary btn-rounded btn-block mt-3">Tambah
                                        Brand</button> --}}
                                        <input type="submit" class="btn btn-primary btn-rounded btn-block mt-3"
                                            value="Edit Category">
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
