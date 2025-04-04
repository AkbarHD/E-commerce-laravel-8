@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name En</th>
                                        <th>Product Name Ind</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->product_thumbnail) }}" width="100px" alt="">
                                            </td>
                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->product_name_ind }}</td>
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
        </div>
    </section>

    <script src=""></script>
@endsection
