@extends('layouts.app')
@section('title')
<title>Información del producto</title>
@endsection
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
            	<form class="form-group" name="response" method="POST" action="{{ route('home.suscription', $content->id) }}" enctype="multipart/form-data">
            		@method('PUT')
            		@csrf
            		<div class="card">
            			<h3 class="card-header">Detalles del contenido: "{{$content->name}}"</h3>
            			<div class="card-body">
            				<div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <strong class="card-title">Nombre:</strong>
            							<input type="text" disabled="disabled" name="nombre" id="nombre" class="form-control input-sm" placeholder="{{$content->name}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <strong class="card-title">Fecha de creación:</strong>
                                        <div>{{ $content->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong>Opciones:</strong><br>
                                <button class="btn btn-success form-group" onclick="hiddenInput()">Suscribirse*</button>
                                <div id="div"></div>
                                <script type="text/javascript">
                                    var ban = 0;
                                    function hiddenInput(){
                                        if (ban == 0) {
                                            document.getElementById('div').style.display='block';
                                            line = '<input type="text" name="name" placeholder="Ingresa tu nombre" required>';
                                            line += ' <input type="email" name="email" placeholder="Ingresa tu correo electrónico" required>';
                                            line += '<br><font size="1">*Presiona el botón "suscriberse" nuevamente para confirmar tu suscripción :)</font>';
                                            $('#div').append(line);
                                            ban = 1;
                                        }else{
                                            document.response.submit();
                                        }
                                    }
                                </script>
                            </div>
            				<div class="form-group">
            					<strong class="card-title">Descripción:</strong>
            					<textarea type="text" style="resize: none;" disabled="disabled" name="desc" id="desc" class="form-control input-sm" placeholder="{{$content->desc}}"></textarea>
            				</div>
            				<strong class="card-title">Imágenes:</strong>
            				<div class="form-group">
            					<img src="/images/contents/{{$content->image1}}" width="150" height="100">
            					<img src="/images/contents/{{$content->image2}}" width="150" height="100">
            					<img src="/images/contents/{{$content->image3}}" width="150" height="100">
            				</div>
                            <div class="form-group">
                                <strong class="card-title">Sección:</strong>
                                @forelse($sections as $section)
                                    @if($content->section_id == $section->id)
                                        <input type="text" disabled="disabled" class="form-control input-sm" placeholder="{{ $section->name }}">
                                    @else
                                    @endif
                                @empty
                                @endforelse
                            </div>
            			</div>
					</div><br>
					<div class="btn-group">
						<a href="{{ url('/') }}" class="btn btn-secondary" >Atrás</a>
					</div>
				</form>
            </div>
        </div>
    </div>
@endsection