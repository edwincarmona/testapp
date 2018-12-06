<div class="row">
    <!-- Client Code Field -->
    <div class="form-group col-md-6">
        {!! Form::label('client_code', 'Client Code:') !!}
        {!! Form::text('client_code', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Client Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('client_name', 'Client Name:') !!}
        {!! Form::text('client_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <!-- Credit Limit Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('credit_limit', 'Credit Limit:') !!}
        {!! Form::number('credit_limit', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Credit Days Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('credit_days', 'Credit Days:') !!}
        {!! Form::number('credit_days', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <!-- Segment Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('segment_id', 'Segment Id:') !!}
        {!! Form::select('segment_id', $segments, 2, ['class' => 'form-control']) !!}
    </div>

    <!-- Is Deleted Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('is_deleted', 'Eliminado') !!}
        <label class="checkbox-inline">
            {!! Form::checkbox('is_deleted', 1, false, ['class' => 'form-control']) !!}
        </label>
    </div>
</div>

<!-- Submit Field -->
<div class="row">
    <div class="col-sm-2  offset-sm-10">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('clients.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
