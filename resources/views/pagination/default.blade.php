@if ($paginator->lastPage() > 1)
<div class="pagination-container margin-bottom-40">
	<nav class="pagination">
		<ul>
            <li><a href="{{ $paginator->url(1) }}"><i class="sl sl-icon-arrow-left"></i></a></li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
			<li><a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? ' current-page' : '' }}">{{ $i }}</a></li>
			@endfor
			<li><a href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="sl sl-icon-arrow-right"></i></a></li>
		</ul>
	</nav>
</div>
@endif