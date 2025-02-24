@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SubCategory List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>SubCategory Name En</th>
                                        <th>SubCategory Name Ind</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subcategories as $item)
                                        <tr>
                                            <td>{{ $item->category->category_name_en }}</td>
                                            <td>{{ $item->subcategory_name_en }}</td>
                                            <td>{{ $item->subcategory_name_ind }}</td>
                                            <td class="d-flex ">
                                                <a href="{{ route('subcategory.edit', $item->id) }}"
                                                    class="btn btn-info btn-sm"> <i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('subcategory.delete', $item->id) }}"
                                                    onclick="return confirm('Are you sure?') }}" id="delete"
                                                    class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"></i> </a>
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
                        <h3 class="box-title">Form Sub SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('subcategory.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                           <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Pilih Category</option>
                                            @forelse ( $category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name_en }}</option>
                                            @empty
                                            <option value=""> No Data</option>
                                            @endforelse
                                           </select>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Subcategory Name En<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_en" name="subcategory_name_en"
                                                class="form-control">
                                            @error('subcategory_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>subcategory Name Ind<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_ind" name="subcategory_name_ind"
                                                class="form-control">
                                            @error('subcategory_name_ind')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        {{-- <button type="submit" class="btn btn-primary btn-rounded btn-block mt-3">Tambah
                                        Brand</button> --}}
                                        <input type="submit" class="btn btn-primary btn-rounded btn-block mt-3"
                                            value="Tambah Category">
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

    <script src=""></script>
@endsection
