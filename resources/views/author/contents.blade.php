@extends('home')
@section('title')
<title>Lista de contenidos</title>
@endsection
@section('content')
<div class="content">
    <a class="btn btn-success" href="{{ url('/cont/create') }}">Proponer</a>
</div>
@forelse($sections as $section)
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$section->name}}</div>
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
                                </section>
                                <a href="/cont/{{ $content->id }}/update" class="btn btn-info">Editar</a>
                            </div>
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
