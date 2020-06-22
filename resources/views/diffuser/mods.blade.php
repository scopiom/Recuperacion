@extends('home')
@section('title')
<title>Últimas modificaciones</title>
@endsection
@section('content')
<div class="content">
	<div class="btn-group">
		<a href="{{ url('/cont-all') }}" class="btn btn-secondary">Atrás</a>
	</div>
</div>
	@forelse($contents as $content)
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
            	<div class="card">
            		<h3 class="card-header text-center">{{ $content->name }}</h3>
            		<div class="card-body">
            			<label>ID:</label>
            			{{ $content->id }}<br>
            			@if($content->updated_at != NULL)
            			<label>Última actualización:</label>
            			{{ $content->updated_at }}
            			@else
            			<label>Última actualización:</label>
            			No se ha modificado.
            			@endif
                        <br><label>Pertenece a:</label>
                        @forelse($users as $user)
                            @if($content->user_id == $user->id)
                            <label>{{ $user->name }}</label>
                            @endif
                        @empty
                        <label>No existen usuarios</label>
                        @endforelse
            		</div>
            	</div>

            </div>
        </div>
    </div>
    @empty
    <div class="content">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">No existen actualizaciones</div>
	            </div>
	        </div>
	    </div>
	</div>
    @endforelse
@endsection
