@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Name En</th>
                                        <th>Category Name Ind</th>
                                        <th>Category Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $item)
                                        <tr>
                                            <td>{{ $item->category_name_en }}</td>
                                            <td>{{ $item->category_name_ind }}</td>
                                            <td>
                                               <i class="{{ $item->category_icon }}"></i>
                                            </td>
                                            <td class="d-flex ">
                                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info btn-sm"> <i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('category.delete', $item->id) }}" onclick="return confirm('Are you sure?') }}" id="delete" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"></i> </a>
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
                                <form action="{{ route('category.store') }}" method="post" >
                                    @csrf
                                <div class="form-group">
                                    <h5>category Name En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control">
                                        @error('category_name_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>category Name Ind<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_ind" name="category_name_ind"
                                            class="form-control">
                                        @error('category_name_ind')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Icon Category<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="category_icon" name="category_icon" class="form-control">
                                        @error('category_icon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    {{-- <button type="submit" class="btn btn-primary btn-rounded btn-block mt-3">Tambah
                                        Brand</button> --}}
                                        <input type="submit" class="btn btn-primary btn-rounded btn-block mt-3" value="Tambah Category">
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
