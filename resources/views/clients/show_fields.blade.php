<div class="row">
    <div class="col-sm-4">
        <!-- Client Code Field -->
        <div class="form-group">
            {!! Form::label('client_code', 'Client Code:') !!}
            <p>{!! $client->client_code !!}</p>
        </div>
        
        <!-- Client Name Field -->
        <div class="form-group">
            {!! Form::label('client_name', 'Client Name:') !!}
            <p>{!! $client->client_name !!}</p>
        </div>
        
        <!-- Credit Days Field -->
        <div class="form-group">
            {!! Form::label('credit_days', 'Credit Days:') !!}
            <p>{!! $client->credit_days !!}</p>
        </div>
        
        <!-- Credit Limit Field -->
        <div class="form-group">
            {!! Form::label('credit_limit', 'Credit Limit:') !!}
            <p>{!! $client->credit_limit !!}</p>
        </div>
    </div>

    <div class="col-sm-4">
        <!-- Is Deleted Field -->
        <div class="form-group">
            {!! Form::label('is_deleted', 'Is Deleted:') !!}
            <p>{!! $client->is_deleted !!}</p>
        </div>
        
        <!-- Segment Id Field -->
        <div class="form-group">
            {!! Form::label('segment_id', 'Segment Id:') !!}
            <p>{!! $client->segment->name !!}</p>
        </div>    
    </div>

    <div class="col-sm-4">
        <!-- Created By Id Field -->
        <div class="form-group">
            {!! Form::label('created_by_id', 'Created By Id:') !!}
            <p>{!! $client->user->name !!}</p>
        </div>
        
        <!-- Updated By Id Field -->
        <div class="form-group">
            {!! Form::label('updated_by_id', 'Updated By Id:') !!}
            <p>{!! $client->userUpd->name !!}</p>
        </div>
        
        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{!! $client->created_at !!}</p>
        </div>
        
        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{!! $client->updated_at !!}</p>
        </div>
    </div>
</div>

