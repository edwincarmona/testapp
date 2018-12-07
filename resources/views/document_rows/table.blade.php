<table class="table table-responsive" id="documentRows-table">
    <thead>
        <tr>
            <th>Amount</th>
        <th>Product Id</th>
        <th>Document Id</th>
        <th>Created By Id</th>
        <th>Updated By Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($documentRows as $documentRow)
        <tr>
            <td>{!! $documentRow->amount !!}</td>
            <td>{!! $documentRow->product_id !!}</td>
            <td>{!! $documentRow->document_id !!}</td>
            <td>{!! $documentRow->created_by_id !!}</td>
            <td>{!! $documentRow->updated_by_id !!}</td>
            <td>
                {!! Form::open(['route' => ['documentRows.destroy', $documentRow->id_row], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documentRows.show', [$documentRow->id_row]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documentRows.edit', [$documentRow->id_row]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>