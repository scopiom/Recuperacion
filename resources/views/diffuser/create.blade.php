@extends('home')
@section('title')
<title>Creando sección</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ url('/cont-all') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="modal-header">Creando sección</div>
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
                            <div class="form-group">
                                <label id="autors">Asignar autor:</label><br>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" id="asignar">Asignar autor</button>
                                <table class="table" border="1" id="listas">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr id="{{$user->id}}">
                                            <td>{{$user->name}}</td>
                                            <td><a id="{{$user->id}}" class="btn btn-danger quitar" onclick="quitar()">Quitar</a></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" >Sin estudiantes matriculados</td>
                                        </tr>
                                        @endforelse
                                     </tbody>
                                </table>
                            </div>
                        <div class="content">
                            <button type="submit" value="Guardar" class="btn btn-success col-xs-2 col-sm-2">Guardar</button>
                            <a href="{{ url('/cont-all') }}" class="btn btn-info col-xs-2 col-sm-2" >Atrás</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false"  data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Lista de autores</h5>
                <!--<button class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>-->
                <div class="modal-body">
                    <!--<form>
                        <div class="row">
                            <div>
                                <input type="text" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Correo">
                            </div>
                            <div class="col-2">
                                <input type="submit" class="form-control btn-primary" value="BUSCAR">
                            </div>
                        </div>
                    </form><BR>-->
                    <div class="row">
                        <table class="table" border="1" id="lista_estudiantes">
                            <thead class="col-5">
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody class="col-5">
                                @forelse ($users as $user)
                                <tr id="{{ $user->id }}">
                                    <td>{{ $user->name }}</td>
                                    <td><a id="{{ $user->id }}" onclick="agregar()" class="btn btn-primary agregar">Agregar</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" >Sin estudiantes a matricular</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>
</div>
<script>
    function agregar(){
        event.preventDefault();
        id = this.id;
        axios.get('/add/' + id )
        .then(function (response) {
            line  ='<tr id=' + response.data.id + '>';
            line +='<td>' + response.data.nombre + '(' + response.data.correo + ')</td>';
            line +='<td><a id="' + response.data.id + '" class="btn btn-danger quitar">QUITAR</a></td>';
            line +='</tr>';
            $('#listas  > tbody').append(linea);
            $('#listas > tbody > tr#' + id ).remove();
            console.log(response);
        })
        .catch(function (error) {
            if(error.response.status==401)alert("Usted no ha iniciado en el sistema");
            if(error.response.status==500)alert("Error 500 en el sistema");
            else alert(error.response.data.error);
            console.log(error);
        })
    }
    function quitar(){
        e.preventDefault();
        id = this.id;
        axios.delete('/delete/' + id , {
            params: {
                _token:  '{{ csrf_token() }}'
            }
        })
        .then(function (response) {
            $('#lista > tbody > tr#' + response.data.id ).remove();
            alert("Se ha modificado la lista de autores, debe cargar de nuevo la página para poder asignar a otro autor");
            $('#asignar').prop( "disabled", true );
            console.log(response);
        })
        .catch(function (error) {
            if(error.response.status==401)alert("Usted no ha iniciado en el sistema");
            if(error.response.status==404)alert("No se encontro esta matriculación en la base de datos");
            if(error.response.status==500)alert("Error 500 en el sistema");
            else alert(error.response.data.error);
            console.log(error);
        })
    }
</script>
@endsection
