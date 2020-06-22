@extends('home')
@section('title')
<title>Lista de contenidos</title>
@endsection
@section('content')
<div class="content">
    <a class="btn btn-success" href="{{ url('/cont-all/create') }}">Crear sección</a>
    <a class="btn btn-info" href="{{ url('/mods') }}">Últimas modificaciones</a>
</div>
@forelse($sections as $section)
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ $section->name }}</strong></div>
                @forelse($contents as $content)
                    @if($section->id == $content->section_id)
                    <div class="container text-center">________________________________________________________________________________________________________</div>
                        <div class="card-body">
                            <div>
                                <div class="text-center">
                                    <img src="/images/contents/{{$content->image1}}" width="500" height="300">
                                </div>
                                <section class="text-center">
                                        <strong class="card-title">Nombre:</strong>
                                        <div id="name">{{ $content->name }}</div>
                                        <div>______________________________________</div>
                                        <strong class="card-title">Descripción:</strong>
                                        <div>{{ $content->desc }}</div>
                                        <strong class="card-title">Versión:</strong>
                                        <div>Versión {{ $content->ver }}</div>
                                </section>
                                <!--<a href="" class="btn btn-success">Suscribirse</a>-->
                            </div>
                        </div>
                        <div class="card-header">
                            <strong>Autor asignado a esta sección:</strong>
                            @forelse($users as $user)
                                @if($user->id == $section->user_id)
                                {{ $user->name }}
                                @endif
                            @empty
                            @endforelse
                        </div>
                    @endif
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
@empty
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">No existen secciones</div>
            </div>
        </div>
    </div>
</div>
@endforelse
@endsection
