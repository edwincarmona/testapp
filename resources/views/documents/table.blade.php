<table class="table table-responsive" id="documents-table">
    <thead>
        <tr>
            <th>Dt Date</th>
        <th>Amount</th>
        <th>Created By Id</th>
        <th>Updated By Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($documents as $document)
        <tr>
            <td>{!! $document->dt_date !!}</td>
            <td>{!! $document->amount !!}</td>
            <td>{!! $document->created_by_id !!}</td>
            <td>{!! $document->updated_by_id !!}</td>
            <td>
                {!! Form::open(['route' => ['documents.destroy', $document->id_document], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documents.show', [$document->id_document]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documents.edit', [$document->id_document]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>