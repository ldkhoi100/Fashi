<div class="card-body" id="tableProducts">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13.5px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th width='10%'>Name</th>
                    <th width='6%'>Category</th>
                    <th width='6%'>Object</th>
                    <th width='6%'>Description</th>
                    <th>Size</th>
                    <th>Cost</th>
                    <th>Sale</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Highlight</th>
                    <th>New</th>
                    <th>Total rating</th>
                    <th>User created</th>
                    <th>User updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th width='10%'>Name</th>
                    <th width='6%'>Category</th>
                    <th width='6%'>Object</th>
                    <th width='6%'>Description</th>
                    <th>Size</th>
                    <th>Cost</th>
                    <th>Sale</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Highlight</th>
                    <th>New</th>
                    <th>Total rating</th>
                    <th>User created</th>
                    <th>User updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($products as $key => $product)

                <tr>
                    <td>{{ ++$key }}</td>
                    <td><a href="{{ route('getDetailProductMen', $product->id) }}"
                            target="_blank">{{ $product->name }}</a></td>
                    <td>{{ $product->categories->name }}</td>
                    <td>{{ $product->objects->name }}</td>
                    {{-- <td><a href="{{ route('product.show', $product->id) }}">Details</a></td> --}}
                    <td><button data-url="{{ route('product.show',$product->id) }}" ​ type="button" data-target="#show"
                            data-toggle="modal" class="btn btn-info btn-show btn-sm">Detail</button></td>
                    <td>
                        @foreach ($product->size as $size)
                        {{ $size->name }},
                        @endforeach
                    </td>
                    <td>{{ $product->unit_price }}</td>

                    <td>{{ $product->promotion_price }}</td>

                    <td>{{ $product->amount }}</td>

                    <td><img src="img/products/{{ $product->image1 }}" alt="" srcset="" width="75px">
                    </td>

                    @if($product->highlight == 1)
                    <td><a href="javascript:void(0);" onclick="changeHighlight({{ $product->id }})"
                            style="color:#32CD32; font-weight: bold">Yes</a>
                    </td>

                    @else

                    <td><a href="javascript:void(0);" onclick="changeHighlight({{ $product->id }})"
                            style="color:red; font-weight: bold">No</a>
                    </td>

                    @endif

                    @if($product->new == 1)
                    <td><a href="javascript:void(0);" style="color:#32CD32; font-weight: bold"
                            onclick="changeNew({{ $product->id }})">Yes</a>
                    </td>

                    @else

                    <td><a href="javascript:void(0);" style="color:red; font-weight: bold"
                            onclick="changeNew({{ $product->id }})">No</a>
                    </td>

                    @endif

                    <td><a href="{{ route('reivew.show', $product->id) }}"><b>{{ count($product->reviews) }}</b></a>
                    </td>

                    <td><b style="color:orange">{{ $product->user_created }}</b> <br> {{ $product->created_at }}
                    </td>

                    <td><b style="color:purple">{{ $product->user_updated }}</b> <br> {{ $product->updated_at }}
                    </td>

                    <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-edit" title="Edit"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" id="my-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Do you want delete product {{$product->name}} ?')"
                                class="btn btn-danger btn-sm" id="btn-submit" style="border: none"><i
                                    class="fa fa-backspace"></i></button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>