<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_id', 'Document Id:') !!}
    {!! Form::number('document_id', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('documentRows.index') !!}" class="btn btn-default">Cancel</a>
</div>
