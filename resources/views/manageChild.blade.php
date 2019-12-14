<ul>

@foreach($childs as $child)

	<li>

	    {{ $child->ar_name }}

	@if(count($child->childs))

            @include('manageChild',['childs' => $child->childs])

        @endif

	</li>

@endforeach

</ul>