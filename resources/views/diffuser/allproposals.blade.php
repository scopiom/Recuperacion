@extends('home')
@section('title')
<title>Lista de propuestas</title>
@endsection
@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de propuestas</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            	<th class="text-center">ID</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Fecha de creación</th>
                                <th class="text-center">Última actualización</th>
                                <th class="text-center">ID - Autor</th>
                                <th class="text-center">Nombre - Autor</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($allproposals as $proposals)
                            <tr>
                            	<td class="text-center"><a class="form-control" href="/prop-all/{{ $proposals->id }}/details">{{ $proposals->id }}</a></td>
                                <td class="text-center">
                                	@if($proposals->status == 'FALSE')
                                		<text>Rechazado</text>
                                	@elseif($proposals->status == 'TRUE')
                                		<text>Aceptado</text>
                                	@elseif($proposals->status == 'NULL')
                                		<text>Aún sin revisar</text>
                                	@endif
                                </td>
                                <td class="text-center">{{ $proposals->name }}</td>
                                <td class="text-center"><img src="/images/contents/{{$proposals->image1}}" width="150" height="100"></td>
                                <td class="text-center">{{ $proposals->created_at }}</td>
                                <td class="text-center">{{ $proposals->updated_at }}</td>
                                <td class="text-center"><a class="form-control" href="">{{ $proposals->user_id }}</a></td>
                                @forelse($users as $user)
                                    @if($proposals->user_id == $user->id)
                                    <td class="text-center"><a class="form-control" href="">{{ $user->name }}</a></td>
                                    @endif
                                @empty
                                @endforelse
                            </tr>
                        @empty
                        <tr>
                            <td colspan="7">No existen propuestas</td>
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
