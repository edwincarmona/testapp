<!-- Id Document Field -->
<div class="form-group">
    {!! Form::label('id_document', 'Id Document:') !!}
    <p>{!! $document->id_document !!}</p>
</div>

<!-- Dt Date Field -->
<div class="form-group">
    {!! Form::label('dt_date', 'Dt Date:') !!}
    <p>{!! $document->dt_date !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $document->amount !!}</p>
</div>

<!-- Created By Id Field -->
<div class="form-group">
    {!! Form::label('created_by_id', 'Created By Id:') !!}
    <p>{!! $document->created_by_id !!}</p>
</div>

<!-- Updated By Id Field -->
<div class="form-group">
    {!! Form::label('updated_by_id', 'Updated By Id:') !!}
    <p>{!! $document->updated_by_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $document->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $document->updated_at !!}</p>
</div>

