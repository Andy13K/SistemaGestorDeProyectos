<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Líderes de Proyecto</title>
</head>
<body>
<h1>Reporte de Líderes de Proyecto</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
    </tr>
    @foreach ($lideres as $lider)
        <tr>
            <td>{{ $lider->id }}</td>
            <td>{{ $lider->nombre }}</td>
            <td>{{ $lider->email }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>

