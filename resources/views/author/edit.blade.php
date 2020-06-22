@extends('home')
@section('title')
<title>Propuesta</title>
@endsection
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="form-group" name="response" method="POST" action="{{ route('contents.details', $content->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <h3 class="card-header">Editando el contenido: "{{$content->name}}"</h3>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nombre:</label>
                                        <input type="text" name="name" id="nombre" class="form-control input-sm" value="{{$content->name}}">
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción:</label>
                                <textarea type="text" name="desc" id="desc" class="form-control input-sm" value="">{{$content->desc}}</textarea><!-- RARO -->
                            </div>
                            <label>Imágenes:</label>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <img src="/images/contents/{{$content->image1}}" width="150" height="100">
                                </div>
                                <div class="col-sm-6">
                                    <input id="file1" type="file" name="image1" required>
                                    <div class="col-sm-6" id="preview1"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <img src="/images/contents/{{$content->image2}}" width="150" height="100">
                                </div>
                                <div class="col-sm-6">
                                    <input id="file2" type="file" name="image2" required>
                                    <div class="col-sm-6" id="preview2"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <img src="/images/contents/{{$content->image3}}" width="150" height="100">
                                </div>
                                <div class="col-sm-6">
                                    <input id="file3" type="file" name="image3" required>
                                    <div class="col-sm-6" id="preview3"></div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label>Sección actual:</label>
                                    @forelse($sections as $section)
                                        @if($content->section_id == $section->id)
                                            <input type="text" disabled class="form-control input-sm col-sm-6" value="{{ $section->name }}">
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Elige la nueva sección*:</label><br>
                                    @forelse ($sections as $section)
                                    <input id="changed" type="checkbox" name="section_id" value="{{ $section->id }}"> {{ $section->name }}<br>
                                    @empty
                                    <label>No existen secciones</label><br>
                                    @endforelse
                                    <font size="1">*Solo puedes seleccionar una opción</font>
                                </div>
                                </div>
                        </div>
                        <div class="col-sm-8">
                            <button type="submit" value="Guardar" class="btn btn-success form-group">Guardar</button>
                            <a href="{{ url('/cont') }}" class="btn btn-secondary form-group" >Atrás</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('file1').onchange = function(e) {
            let reader = new FileReader();
            reader.onload = function(){
                let preview = document.getElementById('preview1'),
                image = document.createElement('img');
                image.src = reader.result;
                preview.innerHTML = '';
                preview.append(image);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
        document.getElementById('file2').onchange = function(e) {
            let reader = new FileReader();
            reader.onload = function(){
                let preview = document.getElementById('preview2'),
                image = document.createElement('img');
                image.src = reader.result;
                preview.innerHTML = '';
                preview.append(image);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
        document.getElementById('file3').onchange = function(e) {
            let reader = new FileReader();
            reader.onload = function(){
                let preview = document.getElementById('preview3'),
                image = document.createElement('img');
                image.src = reader.result;
                preview.innerHTML = '';
                preview.append(image);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    </script>
@endsection
