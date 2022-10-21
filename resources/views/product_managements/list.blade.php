@extends('admin.default')
@section('title', 'Product List')
<!-- Dashboard Ecommerce start -->
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="demo-spacing-0">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-body">{{ $message }}</div>
                            </div>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="demo-spacing-0">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body">{{ $message }}</div>
                            </div>
                        </div>
                    @endif
                    <h4 class="card-title">Product List</h4>
                    <a style="float:right;" title="Add Module" href="{{ route('product_managements.create') }}"
                        class="btn btn-primary mb-1"><span></span>Add Product</a>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th> Description</th>
                                    <th> Price</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (sizeof($All_Products))
                                    @php $i=0; @endphp
                                    @foreach ($All_Products as $val)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $val->product_name }}</td>
                                            <td>{{ $val->description }}</td>
                                            <td>{{ $val->price }}</td>
                                            <td class="t-center"> <a target="_blank"
                                                    href="{{ asset('uploads/images/' . $val->image) }}"><img
                                                        style="width:60px;"
                                                        src="{{ asset('uploads/images/' . $val->image) }}"></a></td>
                                            <td>
                                                <form action="{{ route('product_managements.destroy', $val->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('product_managements.edit', $val->id) }}" title="Edit"><i
                                                            class="mdi mdi-pencil icon-sm mr-2 text-success"></i></a>

                                                    <button title="Remove" onclick="return confirm('Are you sure?')"
                                                        class="btn"><i
                                                            class="fa fa-fw fa-trash icon-sm mr-2 text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align:center; color:red;"> Data not found </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{-- <div class="d-flex justify-content-end">
                            {{ $All_Products->links() }}
                        </div>   --}}
                    </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <!----row--->
    <div class="modal fade text-start" id="large" tabindex="-1" aria-labelledby="myModalLabel17" aria-hidden="true">
    </div>
@endsection
