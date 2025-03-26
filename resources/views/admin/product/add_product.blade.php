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
                                                        <select class="form-control" name="subcategory_id"
                                                            id="subcategory_id">
                                                            <option value="">Pilih SubCategory</option>
                                                        </select>
                                                        @error('subcategory_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>SubsubCategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="form-control" name="subsubcategory_id"
                                                            id="subsubcategory_id">
                                                            <option value="" hidden>Pilih SubsubCategory</option>

                                                        </select>
                                                        @error('subsubcategory_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Name en<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en"
                                                                class="form-control" required>
                                                        </div>
                                                        @error('product_name_en')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Name ind<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_name_ind"
                                                                class="form-control" required>
                                                        </div>
                                                        @error('product_name_ind')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Product Code<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <input type="text" name="product_code"
                                                                    class="form-control" required>
                                                            </div>
                                                            @error('product_code')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_qty" class="form-control"
                                                                required>
                                                        </div>
                                                        @error('product_qty')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="selling_price" class="form-control"
                                                                required>
                                                        </div>
                                                        @error('selling_price')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <input type="text" name="discount_price"
                                                                    class="form-control" required>
                                                            </div>
                                                            @error('discount_price')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Main Thumbnail<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="file" name="product_thumbnail"
                                                                class="form-control" required>
                                                        </div>
                                                        @error('product_thumbnail')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Multiple Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="file" name="multiple_img[]"
                                                                class="form-control" required>
                                                        </div>
                                                        @error('multiple_img[]')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Short Description English<span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <textarea name="short_descp_en" class="form-control"></textarea>
                                                            </div>
                                                            @error('short_descp_en')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description Ind<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <textarea name="short_descp_ind" class="form-control"></textarea>
                                                        </div>
                                                        @error('short_descp_ind')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Long Description English<span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <textarea id="editor1" name="long_descp_en" rows="10" cols="80"></textarea>
                                                            </div>
                                                            @error('long_descp_en')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description Ind<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <textarea id="editor2" name="long_descp_ind" rows="10" cols="80"></textarea>
                                                        </div>
                                                        @error('long_descp_ind')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Product Tags En<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <input type="text" name="product_tags_en"
                                                                    class="form-control" value="Lorem,Ipsum,Amet"
                                                                    data-role="tagsinput" placeholder="add tags">
                                                            </div>
                                                            @error('product_tags_en')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Tags ind<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_tags_ind"
                                                                class="form-control" value="Lorem,Ipsum,Amet"
                                                                data-role="tagsinput" placeholder="add tags">
                                                        </div>
                                                        @error('product_tags_ind')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Size En<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_size_en"
                                                                class="form-control" value="Lorem,Ipsum,Amet"
                                                                data-role="tagsinput" placeholder="add tags">
                                                        </div>
                                                        @error('product_size_en')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Product Size Ind<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <input type="text" name="product_size_ind"
                                                                    class="form-control" value="Lorem,Ipsum,Amet"
                                                                    data-role="tagsinput" placeholder="add tags">
                                                            </div>
                                                            @error('product_size_ind')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Color En</h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_color_en"
                                                                class="form-control" value="Lorem,Ipsum,Amet"
                                                                data-role="tagsinput" placeholder="add tags">
                                                        </div>
                                                        @error('product_color_en')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Color Ind<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_color_ind"
                                                                class="form-control" value="Lorem,Ipsum,Amet"
                                                                data-role="tagsinput" placeholder="add tags">
                                                        </div>
                                                        @error('product_color_ind')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Product Size Ind<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <input type="text" name="product_size_ind"
                                                                    class="form-control" value="Lorem,Ipsum,Amet"
                                                                    data-role="tagsinput" placeholder="add tags">
                                                            </div>
                                                            @error('product_size_ind')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Color en<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_color_en"
                                                                class="form-control" value="Lorem,Ipsum,Amet"
                                                                data-role="tagsinput" placeholder="add tags">
                                                        </div>
                                                        @error('product_color_en')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <h5>Product Color Ind<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <div class="controls">
                                                            <input type="text" name="product_color_ind"
                                                                class="form-control" value="Lorem,Ipsum,Amet"
                                                                data-role="tagsinput" placeholder="add tags">
                                                        </div>
                                                        @error('product_color_ind')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" required
                                                                value="1" name="hot_deals">
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" value="1">
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" required
                                                                value="1">
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" value="1">
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
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


    <script>
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
                            $('select[name="subsubcategory_id"]').empty();
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

            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                // alert(category_id);

                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/sub/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_en + '</option>');
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
