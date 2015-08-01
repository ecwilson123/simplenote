<ul class="list-unstyled">
    <li>
        <i class="fa fa-fw fa-users"></i>
        {{ count($collections['public']) }} Public
        @if (count($collections['public']) == 1)
            Collection
        @else
            Collections
        @endif
    </li>
    <li>
        <i class="fa fa-fw fa-user-secret"></i>
        {{ count($collections['private']) }} Private
        @if (count($collections['private']) == 1)
            Collection
        @else
            Collections
        @endif
    </li>
    <li>
        Total Collections: {{ count($collections['private']) + count($collections['public']) }}
    </li>
</ul>
