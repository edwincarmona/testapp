<table id="products-table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Unit Id</th>
            <th>Created By Id</th>
            <th>Updated By Id</th>
            <th>Is Deleted</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->code !!}</td>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->unit->code !!}</td>
            <td>{!! $product->user->username !!}</td>
            <td>{!! $product->userUpd->username !!}</td>
            <td>{!! $product->is_deleted !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id_product], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id_product]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id_product]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>