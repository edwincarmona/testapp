<!-- Dt Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dt_date', 'Dt Date:') !!}
    {!! Form::date('dt_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by_id', 'Created By Id:') !!}
    {!! Form::number('created_by_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_by_id', 'Updated By Id:') !!}
    {!! Form::number('updated_by_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documents.index') !!}" class="btn btn-default">Cancel</a>
</div>
