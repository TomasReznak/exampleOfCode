
@foreach ($categories as $category)

	@if (count($category['children']) > 0)

		@include('categories.categories', $category)

	@endif
@endforeach