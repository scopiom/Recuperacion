@extends('home')
@section('title')
<title>Lista de suscriptores</title>
@endsection
@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de suscriptores</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            	<th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">ID de suscripción</th>
                                <th class="text-center">Nombre de sección</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                @forelse($contents as $content)
                                @if($user->content_id == $content->id)
                                <td class="text-center">{{ $content->id }}</td>
                                <td class="text-center">{{ $content->name }}</td>
                                @endif
                                @empty
                                @endforelse
                            </tr>
                        @empty
                        <tr>
                            <td colspan="5">No existen suscriptores</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
