<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Deleted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_deleted', 'Is Deleted:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_deleted', false) !!}
        {!! Form::checkbox('is_deleted', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('units.index') !!}" class="btn btn-default">Cancel</a>
</div>
