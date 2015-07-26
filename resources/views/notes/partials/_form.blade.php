<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $title_val }}">
</div>
<div class="form-group">
    <label for="collection">Collection</label>
    <select class="form-control" name="collection">
        <option value="0" @if($collection_val == 0) selected="selected" @endif>---------------</option>
        @foreach($collections as $collection)
        <option value="{{ $collection->id }}" @if($collection_val == $collection->id) selected="selected" @endif>{{ $collection->name }}</option>
        @endforeach
    </select>
</div>
<p id="buttons" class="btn-group">
    <button class="btn" value="1"><i class="fa fa-fw fa-users"></i> Public</button>
    <button class="btn" value="0"><i class="fa fa-fw fa-user-secret"></i> Private</button>
</p>
<input type="hidden" name="is_public" id="is-private-target" value="{{ $is_public_val }}"/>
<textarea id="redactor" name="body_text">{!! $body_text_val !!}</textarea>
<div id="preview">
    <h3 class="red">Preview</h3>
    <div id="phtml"></div>
</div>

<p id="btn-preview">
    <button type="button" class="btn-outline" onclick="previewNote()"><i class="fa fa-fw fa-eye"></i> Preview</button>
</p>

<p id="btn-save" style="display: none;">
    <br>
    <button class="btn-outline" type="button" onclick="editNote()"><i class="fa fa-fw fa-pencil-square"></i> Edit</button>
    <button class="btn-outline" type="submit"><i class="fa fa-fw fa-save"></i> Save</button>
</p>