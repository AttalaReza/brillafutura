Rentals Page
@foreach ($data['tools'] as $tool)
<br/> {{ $tool }}
<a href="{{ route('landing.rental.show', $tool->slug) }}">show {{ $tool->name }} </a>
@endforeach
