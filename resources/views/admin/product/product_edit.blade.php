@extends('admin.admin_master')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                                                <option value="{{ $brand->id }}"
                                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
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
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
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
                                                            @foreach ($subcategories as $subcategory)
                                                                <option value="{{ $subcategory->id }}"
                                                                    {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                                                    {{ $subcategory->subcategory_name_en }}
                                                                </option>
                                                            @endforeach
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
                                                            @foreach ($subsubcategories as $subsubcategory)
                                                                <option value="{{ $subsubcategory->id }}"
                                                                    {{ $subsubcategory->id == $product->subsubcategory_id ? 'selected' : '' }}>
                                                                    {{ $subsubcategory->subsubcategory_name_en }}
                                                                </option>
                                                            @endforeach
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
                                                                class="form-control"
                                                                value="{{ old('product_name_en', $product->product_name_en) }}"
                                                                required>
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
                                                                class="form-control"
                                                                value="{{ old('product_name_ind', $product->product_name_ind) ?? old('product_name_ind') }}"
                                                                required>
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
                                                                    class="form-control"
                                                                    value="{{ old('product_code', $product->product_code) ?? old('product_code') }}"
                                                                    required>
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
                                                                value="{{ old('product_qty', $product->product_qty) }}"
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
                                                            <input type="text" name="selling_price"
                                                                class="form-control"
                                                                value="{{ old('selling_price', $product->selling_price) }}"
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
                                                                    class="form-control"
                                                                    value="{{ old('discount_price', $product->discount_price) }}"
                                                                    required>
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
                                                                class="form-control" onchange="mainThamUrl(this)"
                                                                required>
                                                        </div>
                                                        <img src="" id="mainThumb" alt="">
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
                                                                class="form-control" multiple="" id="multiImg"
                                                                required>
                                                        </div>
                                                        @error('multiple_img[]')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div class="row" id="preview_img"></div>
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
                                                                <textarea name="short_descp_en" class="form-control">{{ old('short_descp_en', $product->short_descp_en) }}</textarea>
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
                                                            <textarea name="short_descp_ind" class="form-control">{{ old('short_descp_ind', $product->short_descp_ind) }}</textarea>
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
                                                                <textarea id="editor1" name="long_descp_en" rows="10" cols="80">{!! old('long_descp_en', $product->long_descp_en) !!}</textarea>
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
                                                            <textarea id="editor2" name="long_descp_ind" rows="10" cols="80">{!! old('long_descp_ind', $product->long_descp_ind) !!}</textarea>
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
                                                                    class="form-control"
                                                                    value="{{ old('product_tags_en', $product->product_tags_en) }}"
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
                                                                class="form-control"
                                                                value="{{ old('product_tags_ind', $product->product_tags_ind) }}"
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
                                                                class="form-control"
                                                                value="{{ old('product_size_en', $product->product_size_en) }}"
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
                                                                    class="form-control"
                                                                    value="{{ old('product_size_ind', $product->product_size_ind) }}"
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
                                                                class="form-control"
                                                                value="{{ old('product_color_en', $product->product_color_en) }}"
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
                                                                class="form-control"
                                                                value="{{ old('product_color_ind', $product->product_color_ind) }}"
                                                                data-role="tagsinput" placeholder="add tags">
                                                        </div>
                                                        @error('product_color_ind')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2"
                                                                value="{{ $product->hot_deals }}"
                                                                {{ $product->hot_deals == 1 ? 'checked' : '' }}
                                                                name="hot_deals">
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3"
                                                                value="{{ $product->featured }}"
                                                                {{ $product->featured == 1 ? 'checked' : '' }}
                                                                name="featured">
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="special_offer"
                                                                value="{{ $product->special_offer }}"
                                                                {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="specials_deals"
                                                                value="{{ $product->special_deals }}"
                                                                {{ $product->special_deals == 1 ? 'checked' : '' }}>
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

    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThumb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiImg').on('change', function() {
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) {
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
                            //Create image element
                            var picReader = new FileReader();
                            picReader.onload = (e) => {
                                var picFile = e.target;
                                var html = $(
                                    '<li class="list-inline-item"><img class="mb-4" src="' +
                                    picFile.result +
                                    '" width="80" height="80" /><button type="button" class="btn btn-danger btn-sm remove">Remove</button></li>'
                                );
                                $('#preview_img').append(html);
                            }
                            picReader.readAsDataURL(file);
                        } else {
                            alert('Not a vaild image!');
                        }
                    });
                } else {
                    alert("Your browser does not support File API")
                }
            });

            $(document).on('click', '.remove', function() {
                $(this).parent().remove();
            });
        })
    </script>
@endsection
