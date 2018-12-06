<div class="row">
    <div class="col-sm-4">
        <!-- Code Field -->
        <div class="form-group">
            {!! Form::label('code', 'Code:') !!}
            <p>{!! $product->code !!}</p>
        </div>

        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            <p>{!! $product->name !!}</p>
        </div>

        <!-- Unit Id Field -->
        <div class="form-group">
            {!! Form::label('unit_id', 'Unit Id:') !!}
            <p>{!! $product->unit_id !!}</p>
        </div>
    </div>
    
    <div class="col-sm-4">
        <!-- Is Deleted Field -->
        <div class="form-group">
            {!! Form::label('is_deleted', 'Is Deleted:') !!}
            <p>{!! $product->is_deleted !!}</p>
        </div>
        
        <!-- Created By Id Field -->
        <div class="form-group">
            {!! Form::label('created_by_id', 'Created By Id:') !!}
            <p>{!! $product->created_by_id !!}</p>
        </div>
        
        <!-- Updated By Id Field -->
        <div class="form-group">
                {!! Form::label('updated_by_id', 'Updated By Id:') !!}
                <p>{!! $product->updated_by_id !!}</p>
            </div>
    </div>

    <div class="col-sm-4">
        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{!! $product->created_at !!}</p>
        </div>
        
        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{!! $product->updated_at !!}</p>
        </div>
    </div>
</div>







