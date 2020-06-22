@extends('home')
@section('title')
<title>Detalle</title>
@endsection
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
            	<form class="form-group" name="response" method="POST" action="{{ route('all_proposals.status', $content->id) }}" enctype="multipart/form-data">
            		@method('PUT')
            		@csrf
            		<div class="card">
            			<h3 class="card-header">Detalles del contenido: "{{$content->name}}"</h3>
            			<div class="card-body">
            				<div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <strong>Nombre:</strong>
            							<input type="text" disabled="disabled" name="nombre" id="nombre" class="form-control input-sm" placeholder="{{$content->name}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Opciones:</strong><br>
                                    	<button id="accept" class="btn btn-success" type="submit" name="status" value="TRUE">Aceptar</button>
                                    	<button id="refuse" class="btn btn-secondary" type="submit" name="status" value="NULL">Quitar revisión</button>
                                    	<button class="btn btn-danger" name="status" value="FALSE" onclick="hiddenInput()">Rechazar*</button>
                                        <label id="reasonslabel">Razón*:</label>
                                        <div id="div"></div>
                                        <script type="text/javascript">
                                            var ban = 0;
                                            document.getElementById('reasonslabel').style.display='none';
                                            //document.getElementById('reasonsinput').style.display='none';
                                            function hiddenInput(){
                                                if (ban == 0) {
                                                    document.getElementById('reasonslabel').style.display='block';
                                                    document.getElementById('accept').style.display='none';
                                                    document.getElementById('refuse').style.display='none';
                                                    line = '<textarea id="reasonsinput" name="reasons" cols="38" rows="3" required></textarea>';
                                                    line += '<br><font size="1">*Presiona el botón "rechazar" nuevamente para confirmar</font>';
                                                    $('#div').append(line);
                                                    ban = 1;
                                                }
                                                else{
                                                    document.response.submit();
                                                }
                                            }
                                        </script>
                                        <font size="1">*Una vez seleccionada la opción no podrás cambiarla</font>
                                    </div>
                                </div>
                            </div>
            				<div class="form-group">
            					<strong>Descripción:</strong>
            					<textarea type="text" style="resize: none" disabled="disabled" name="desc" id="desc" class="form-control input-sm" placeholder="{{$content->desc}}"></textarea>
            				</div>
            				<strong>Imágenes:</strong>
            				<div class="form-group">
            					<img src="/images/contents/{{$content->image1}}" width="150" height="100">
            					<img src="/images/contents/{{$content->image2}}" width="150" height="100">
            					<img src="/images/contents/{{$content->image3}}" width="150" height="100">
            				</div>
                            <strong class="">Versión:</strong>
                            <div class="form-group">
                                <input class="text-center col-sm-1" type="text" placeholder="{{ $content->ver }}" disabled>
                            </div>
                            <div class="form-group">
                                <strong>Sección:</strong>
                                @forelse($sections as $section)
                                    @if($content->section_id == $section->id)
                                        <input type="text" disabled="disabled" class="form-control input-sm" placeholder="{{ $section->name }}">
                                    @else
                                    @endif
                                @empty
                                @endforelse
                            </div>
            			</div>
					</div>
					<div class="btn-group">
						<a href="{{ url('/prop-all') }}" class="btn btn-secondary" >Atrás</a>
					</div>
				</form>
            </div>
        </div>
    </div>
@endsection
