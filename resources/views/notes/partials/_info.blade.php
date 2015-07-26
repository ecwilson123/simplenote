<h3>
    <a href="{{ route('notes.show', $note->id) }}" class="link">{{ $note->title }}</a>
    @if ($note->collection != null)
        <a href="{{ route('collections.show', $note->collection_id) }}" class="no-dec">
            <span class="label" style="background-color: {{ $note->collection->color }}">{{ $note->collection->name }}</span>
        </a>
    @endif
    @if($note->user == Auth::User())
        <a href="{{ route('notes.edit', $note->id) }}" class="no-dec"><i class="fa fa-fw fa-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['notes.destroy', $note->id], 'style' => 'display:inline']) !!}
            <a href="#" onclick="del_note($(this).closest('form'))" class="no-dec"><i class="fa fa-fw fa-trash-o"></i></a>
        {!! Form::close() !!}
    @endif
</h3>
