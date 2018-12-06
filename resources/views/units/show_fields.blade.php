<!-- Id Unit Field -->
<div class="form-group">
    {!! Form::label('id_unit', 'Id Unit:') !!}
    <p>{!! $unit->id_unit !!}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $unit->code !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $unit->name !!}</p>
</div>

<!-- Is Deleted Field -->
<div class="form-group">
    {!! Form::label('is_deleted', 'Is Deleted:') !!}
    <p>{!! $unit->is_deleted !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $unit->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $unit->updated_at !!}</p>
</div>

