@extends('layouts.app')

@section('content')
    <h1>Gestión de Proyectos</h1>
    @if(auth()->user()->hasRole('Administrador'))
        <p>Bienvenido, Administrador.</p>
    @endif

    @if(auth()->user()->can('manage projects'))
        <p>Puedes gestionar proyectos.</p>
    @endif
@endsection

