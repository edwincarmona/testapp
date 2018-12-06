<table class="table table-responsive" id="units-table">
    <thead>
        <tr>
            <th>Code</th>
        <th>Name</th>
        <th>Is Deleted</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($units as $unit)
        <tr>
            <td>{!! $unit->code !!}</td>
            <td>{!! $unit->name !!}</td>
            <td>{!! $unit->is_deleted !!}</td>
            <td>
                {!! Form::open(['route' => ['units.destroy', $unit->id_unit], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('units.show', [$unit->id_unit]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('units.edit', [$unit->id_unit]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>