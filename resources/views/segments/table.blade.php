<table class="table table-responsive" id="segments-table">
    <thead>
        <tr>
            <th>Code</th>
        <th>Name</th>
        <th>Is Deleted</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($segments as $segment)
        <tr>
            <td>{!! $segment->code !!}</td>
            <td>{!! $segment->name !!}</td>
            <td>{!! $segment->is_deleted !!}</td>
            <td>
                {!! Form::open(['route' => ['segments.destroy', $segment->id_segment], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('segments.show', [$segment->id_segment]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('segments.edit', [$segment->id_segment]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>