<table id="clients-table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Client Code</th>
        <th>Client Name</th>
        <th>Credit Days</th>
        <th>Credit Limit</th>
        <th>Is Deleted</th>
        <th>Segment Id</th>
        <th>Created By Id</th>
        <th>Updated By Id</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{!! $client->client_code !!}</td>
            <td>{!! $client->client_name !!}</td>
            <td>{!! $client->credit_days !!}</td>
            <td>{!! $client->credit_limit !!}</td>
            <td>{!! $client->is_deleted !!}</td>
            <td>{!! $client->segment->name !!}</td>
            <td>{!! $client->user->username !!}</td>
            <td>{!! $client->userUpd->username !!}</td>
            <td>
                {!! Form::open(['route' => ['clients.destroy', $client->id_client], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('clients.show', [$client->id_client]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('clients.edit', [$client->id_client]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>