@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">


            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('subcategory.update', $subcategory->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select class="form-control" name="category_id" id="category_id">
                                                <option value="">Pilih Category</option>
                                                @forelse ($category as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $subcategory->category_id ? 'selected' : '' }}>{{ $item->category_name_en }}
                                                    </option>
                                                @empty
                                                    <option value=""> No Data</option>
                                                @endforelse
                                            </select>
                                                @error('subcategory_name_en')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>subcategory Name En<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_en" name="subcategory_name_en"
                                                class="form-control"
                                                value="{{ old('subcategory_name_en', $subcategory->subcategory_name_en) }}">
                                            @error('subcategory_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>subcategory Name Ind<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_ind" name="subcategory_name_ind"
                                                class="form-control"
                                                value="{{ old('subcategory_name_ind', $subcategory->subcategory_name_ind) }}">
                                            @error('subcategory_name_ind')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        {{-- <button type="submit" class="btn btn-primary btn-rounded btn-block mt-3">Tambah
                                        Brand</button> --}}
                                        <input type="submit" class="btn btn-primary btn-rounded btn-block mt-3"
                                            value="Edit SubCategory">
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
