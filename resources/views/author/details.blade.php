@extends('home')
@section('title')
<title>Estado de propuesta</title>
@endsection
@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="form-group" name="response" method="POST" action="{{ route('proposals.status', $content->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <h3 class="card-header">Detalles del contenido: "{{$content->name}}"</h3>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nombre:</label>
                                        <input type="text" disabled="disabled" name="nombre" id="nombre" class="form-control input-sm col-sm-8" placeholder="{{$content->name}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Estado:</label><br>
                                        @if($content->status == 'NULL')
                                        <button class="btn btn-secondary" disabled="">Sin revisar</button>
                                        @endif
                                        @if($content->status == 'FALSE')
                                        <button class="btn btn-danger form-group" disabled>Rechazado</button><br>
                                        @forelse($reasons as $reason)
                                        @if($reason->content_id == $content->id)
                                            <label>Razones:</label><br>
                                            <textarea class="form-control" style="resize: none" disabled>{{$reason->reasons}}</textarea>
                                        @endif
                                        @empty
                                        @endforelse
                                        @endif
                                        @if($content->status == 'TRUE')
                                        <button class="btn btn-success" disabled>Aceptado</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción:</label>
                                <textarea type="text" style="resize: none;" disabled="disabled" name="desc" id="desc" class="form-control input-sm" placeholder="{{$content->desc}}"></textarea>
                            </div>
                            <label>Imágenes:</label>
                            <div class="form-group">
                                <img src="/images/contents/{{$content->image1}}" width="150" height="100">
                                <img src="/images/contents/{{$content->image2}}" width="150" height="100">
                                <img src="/images/contents/{{$content->image3}}" width="150" height="100">
                            </div>
                            <div class="form-group">
                                <label>Sección:</label>
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
                        <a href="{{ url('/prop') }}" class="btn btn-secondary" >Atrás</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
