@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reportes</h1>
        <div class="list-group">
            <a href="{{ route('reportes.proyectos_por_fecha') }}" class="list-group-item list-group-item-action">Reporte de Proyectos por Fecha</a>
            <a href="{{ route('reportes.proyectos_en_ejecucion') }}" class="list-group-item list-group-item-action">Reporte de Proyectos en Ejecución</a>
            <a href="{{ route('reportes.proyectos_finalizados') }}" class="list-group-item list-group-item-action">Reporte de Proyectos Finalizados</a>
            <a href="{{ route('reportes.proyectos_por_lider') }}" class="list-group-item list-group-item-action">Reporte de Proyectos por Líder</a>
            <a href="{{ route('reportes.proyectos_por_cliente') }}" class="list-group-item list-group-item-action">Reporte de Proyectos por Cliente</a>
        </div>
    </div>
@endsection


