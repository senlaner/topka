@extends('layouts.master')

@section('content')


	@if($items)
		<ul>
			@foreach ($items as $item)
				<li>{{ $item['name']; }} - {{ $item['title'] }}</li>
			@endforeach
		</ul>
	@else
		

		<p>没找到内容！</p>

	@endif

@stop

