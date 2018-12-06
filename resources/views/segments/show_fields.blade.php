<!-- Id Segment Field -->
<div class="form-group">
    {!! Form::label('id_segment', 'Id Segment:') !!}
    <p>{!! $segment->id_segment !!}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $segment->code !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $segment->name !!}</p>
</div>

<!-- Is Deleted Field -->
<div class="form-group">
    {!! Form::label('is_deleted', 'Is Deleted:') !!}
    <p>{!! $segment->is_deleted !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $segment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $segment->updated_at !!}</p>
</div>

