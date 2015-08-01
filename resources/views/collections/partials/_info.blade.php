<h3>
    <a href="{{ route('collections.show', $collection->id) }}" class="link">{{ $collection->name }}</a>
    @if($collection->user == Auth::User())
        <a href="{{ route('collections.edit', $collection->id) }}" class="no-dec"><i class="fa fa-fw fa-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['collections.destroy', $collection->id], 'style' => 'display:inline']) !!}
            <a href="#" onclick="del_collection($(this).closest('form'))" class="no-dec"><i class="fa fa-fw fa-trash-o"></i></a>
        {!! Form::close() !!}
    @endif
</h3>
<ul class="list-unstyled">
    <li>
        @if ($collection->is_public)
            <i class="fa fa-fw fa-users"></i> Public
        @else
            <i class="fa fa-fw fa-user-secret"></i> Private
        @endif
    </li>
    <li>
        @if (count($collection->notes) > 0)
            @if (count($collection->notes) == 1)
                <i class="fa fa-fw fa-file-o"></i> contains 1 note
            @else
                <i class="fa fa-fw fa-files-o"></i> contains {{ count($collection->notes) }}
            @endif
        @else
            <i class="fa fa-fw fa-file"></i> contains no notes
        @endif
    </li>
    <li><i class="fa fa-fw fa-calendar-o"></i> created {{ date('d F Y', strtotime($collection->created_at)) }}</li>
</ul>