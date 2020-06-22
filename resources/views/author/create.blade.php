@extends('home')
@section('title')
<title>Propuesta</title>
@endsection
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ url('/cont') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-header">Creando propuesta</div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nombre:</label>
                                        <input type="text" name="name" id="nombre" class="form-control input-sm" placeholder="Nombre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea name="desc" class="form-control input-sm" placeholder="Descripción" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Selecciona imagen para subir:</label>
                                    <input id="file1" type="file" name="image1">
                                    <hr>
                                        <div id="preview1"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Selecciona imagen para subir:</label>
                                    <input id="file2" type="file" name="image2">
                                    <hr>
                                        <div id="preview2"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Selecciona imagen para subir:</label>
                                    <input id="file3" type="file" name="image3">
                                    <hr>
                                        <div id="preview3"></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Elige tu sección*:</label><br>
                                    @forelse ($sections as $section)
                                        <input id="changed" type="checkbox" name="section_id" value="{{ $section->id }}"> {{ $section->name }}<br>
                                    @empty
                                    <label>No existen secciones</label><br>
                                    @endforelse
                                    <font size="1">*Solo puedes seleccionar una opción</font>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <button type="submit" value="Guardar" class="btn btn-primary col-xs-2 col-sm-2">Guardar</button>
                            <a href="{{ url('/cont') }}" class="btn btn-secondary col-xs-2 col-sm-2" >Atrás</a>
                        </div>
                    </form>
                </div>
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
