@extends('admin.admin_master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub SubCategory List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Category</th>
                                        <th>SubCategory Name </th>
                                        <th>Sub->subCategory Name En</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subsubcategories as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->category->category_name_en }}</td>
                                            <td>{{ $item->subcategory->subcategory_name_en }}</td>
                                            <td>{{ $item->subsubcategory_name_en }}</td>
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
                        <h3 class="box-title">Form SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('subsubcategory.store') }}" method="post">
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
                                        <h5>Sub Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                           <select class="form-control" name="subcategory_id" id="subcategory_id">
                                            <option value="">Pilih Sin Category</option>

                                           </select>
                                            @error('subcategory_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub->Subcategory Name En<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subsubcategory_name_en" name="subsubcategory_name_en"
                                                class="form-control">
                                            @error('subsubcategory_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>subsubcategory Name Ind<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subsubcategory_name_ind" name="subsubcategory_name_ind"
                                                class="form-control">
                                            @error('subsubcategory_name_ind')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        {{-- <button type="submit" class="btn btn-primary btn-rounded btn-block mt-3">Tambah
                                        Brand</button> --}}
                                        <input type="submit" class="btn btn-primary btn-rounded btn-block mt-3"
                                            value="Tambah Sub sub Category">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                // alert(category_id);

                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });

    </script>
@endsection
