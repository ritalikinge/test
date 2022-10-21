@extends('admin.default')
@section('title', 'Product Add')
<!-- Dashboard Ecommerce start -->
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Add</h4>

                <form action="{{ route('product_managements.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="form_type" value="details">

                    <div class="form-group">
                        <label for="title">Product Name<span class="required">*</span></label>
                        <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" autocomplete="off">
                        @error('product_name')<span class="error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Description<span class="required">*</span></label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}" autocomplete="off">
                        @error('description')<span class="error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Price<span class="required">*</span></label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}" autocomplete="off">
                        @error('price')<span class="error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Images<span class="required">*</span></label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        @error('image')<span class="error">{{ $message }}</span>@enderror
                    </div>

                    <a style="float:right;" title="Cancel" href="{{ route('product_managements.index') }}" class="btn btn-dark mb-1"><span></span>Cancel</a>
                    <input style="float:right" type="submit" name="command" class="btn btn-primary mr-2" value="Save" />
            </div>
            </form>
        </div>
    </div>
</div>

</div>
<!--row--->
@endsection