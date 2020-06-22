@extends('layouts.app')
@section('content')
@forelse($sections as $section)
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$section->name}}</div>
                @forelse($contents as $content)
                    @if($section->id == $content->section_id)
                    <div class="container text-center">_________________________________________________________________________________________________________________________________</div>
                    @if($content->status == 'FALSE')
                    <div class="card-body">
                        <div class="text-center">
                            <h1>No existen contenidos para esta sección</h1>
                        </div>
                    </div>
                    @endif
                    <br><div class="container">
                        <a class="btn btn-info" href="{{ $content->id }}/details">Información</a>
                    </div>
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
                                        <div>______________________________________</div>
                                        <strong class="card-title">Fecha de creación:</strong>
                                        <div>{{ $content->created_at }}</div>
                                </section>
                            </div>
                        </div>
                    @endif
                @empty
                <div class="card-body">
                    <div class="text-center">
                        <h1>No existen contenidos</h1>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div><br>
@empty
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">No existen secciones</div>
                <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
@endforelse
@endsection
