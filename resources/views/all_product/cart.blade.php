<div class="modal-dialog modal-dialog-centered modal-lg" style="max-width:50%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel17">Users Module Access</h4>
        </div>
        <div class="modal-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Name</th>
                            <th> Description </th>
                            <th> Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (sizeof($data))
                            @php 
                                $i=0;
                                $total_price = 0;
                             @endphp
                            @foreach ($data as $val)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $val[0]->product_name }}</td>
                                    <td>{{ $val[0]->description }}</td>
                                    <td>{{ $val[0]->price }}</td>
                                </tr>
                                @php
                                    $total_price += $val[0]->price;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="3">Total Price</td>
                                <td >{{ $total_price }}</td>

                            </tr>
                        @else
                            <tr>
                                <td colspan="4" style="text-align:center; color:red;"> No Product</td>
                            </tr>
                        @endif
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
