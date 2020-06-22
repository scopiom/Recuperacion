@extends('home')
@section('title')
<title>Creando sección</title>
@endsection
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ url('/cont-all') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-header">Creando sección</div>
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
                                <label id="reasonslabel">Asignar autor:</label><br>
                                    @forelse ($users as $user)
                                        <div class="form-control"><input id="changed" type="checkbox" name="user_id" value="{{ $user->id }}"> {{ $user->name }}</div>
                                    @empty
                                    <label>No existen autores</label><br>
                                    @endforelse
                                    <table id="lista_matriculas">

                                    </table>
                            </div>
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
@endsection
