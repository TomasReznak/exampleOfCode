<li id="{{$category['id']}}" data-jstree='{"icon":"fa "}'>

	<a href="#">{{ $category['name'] }}</a>

	@if (count($category['children']) > 0)
		<ul>
			@foreach($category['children'] as $category)
				@include('categories.categories', $category)
			@endforeach
		</ul>
	@endif
</li>