@extends('home')
@section('title')
<title>Lista de autores</title>
@endsection
@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de autores</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            	<th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="3">No existen autores</td>
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
