<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $name_val, ['class' => 'form-control']) !!}
</div>
{!! Form::label('color', 'Color:') !!}
<div class="input-group" id="color-picker">
    {!! Form::text('color', $color_val, ['class' => 'form-control']) !!}
    <span class="input-group-addon"></span>
</div>
<p id="buttons" class="btn-group">
    <button class="btn" value="1"><i class="fa fa-fw fa-users"></i> Public</button>
    <button class="btn" value="0"><i class="fa fa-fw fa-user-secret"></i> Private</button>
</p>
<input type="hidden" name="is_public" id="is-private-target" value="{{ $is_public_val }}"/>
<br>
<button class="btn-outline" type="submit"><i class="fa fa-fw fa-save"></i> Save</button>
