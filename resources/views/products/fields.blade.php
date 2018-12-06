<div class="row">
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
</div>

<div class="row">
    <!-- Unit Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('unit_id', 'Unit Id:') !!}
        {!! Form::select('unit_id', $units, 2, ['class' => 'form-control']) !!}
    </div>

    <!-- Is Deleted Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('is_deleted', 'Is Deleted:') !!}
        <label class="checkbox-inline">
            {!! Form::checkbox('is_deleted', 1, false, ['class' => 'form-control']) !!}
        </label>
    </div>
</div>

<!-- Submit Field -->
<div class="row">
    <div class="col-sm-2  offset-sm-10">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>
