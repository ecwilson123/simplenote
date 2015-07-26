<ul class="list-unstyled">
    <li>
        <i class="fa fa-fw fa-users"></i>
        {{ count($notes['public']) }} Public
        @if(count($notes['public']) == 1)
            Note
        @else
            Notes
        @endif
    </li>
    <li>
        <i class="fa fa-fw fa-user-secret"></i>
        {{ count($notes['private']) }} Private
        @if(count($notes['private']) == 1)
            Note
        @else
            Notes
        @endif
    </li>
    <hr>
    <li>
        Total Notes: {{ count($notes['public']) + count($notes['private']) }}
    </li>
</ul>
