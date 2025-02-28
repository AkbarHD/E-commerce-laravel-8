@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit SubSubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('subsubcategory.update', $subsubcategory->id) }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                           <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Pilih Category</option>
                                            @forelse ( $category as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $subsubcategory->category_id ? 'selected' : '' }}>{{ $item->category_name_en }}</option>
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
                                            @forelse ( $subcategory as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>{{ $item->subcategory_name_en }}</option>
                                            @empty
                                            <option value=""> No Data</option>
                                            @endforelse
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
                                                class="form-control" value="{{ old('subsubcategory_name_en', $subsubcategory->subsubcategory_name_en) }}">
                                            @error('subsubcategory_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>subsubcategory Name Ind<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subsubcategory_name_ind" name="subsubcategory_name_ind"
                                                class="form-control" value="{{ old('subsubcategory_name_ind', $subsubcategory->subsubcategory_name_ind) }}">
                                            @error('subsubcategory_name_ind')
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
                            $("#subcategory_id").empty();
                            $.each(data, function(key, value) {
                                $("#subcategory_id").append('<option value="' +
                                    value.id + '">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    $("#subcategory_id").empty();
                }
            });

        })
    </script>
@endsection
