@extends('layouts.layouts')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1> Form de creación de un player </h1>

<form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label for="desc">Descripción:</label>
        <textarea name="desc" cols="30" rows="5"></textarea>
    </div>

    <div>
        <label for="numero">Número:</label>
        <input type="number" name="numero" min="0">
    </div>

    <div>
        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar" accept="image/*">
    </div>

    <div>
        <label for="posicion1">Posicion 1:</label>
        <select name="posicion1" required>
            <option value="" selected disabled>Seleccione una posición</option>
            <option value="DELANTERO">DELANTERO</option>
            <option value="MEDIOCAMPISTA">MEDIOCAMPISTA</option>
            <option value="DEFENSOR">DEFENSOR</option>
            <option value="ARQUERO">ARQUERO</option>
        </select>
    </div>

    <div>
        <label for="posicion2">Posicion 2:</label>
        <select name="posicion2">
            <option value="" selected disabled>Seleccione una posición</option>
            <option value="DELANTERO">DELANTERO</option>
            <option value="MEDIOCAMPISTA">MEDIOCAMPISTA</option>
            <option value="DEFENSOR">DEFENSOR</option>
            <option value="ARQUERO">ARQUERO</option>
        </select>
    </div>

    <div>
        <label for="posicion3">Posicion 3:</label>
        <select name="posicion3">
            <option value="" selected disabled>Seleccione una posición</option>
            <option value="DELANTERO">DELANTERO</option>
            <option value="MEDIOCAMPISTA">MEDIOCAMPISTA</option>
            <option value="DEFENSOR">DEFENSOR</option>
            <option value="ARQUERO">ARQUERO</option>
        </select>
    </div>

    <div>
        <label for="posicion4">Posicion 4:</label>
        <select name="posicion4">
            <option value="" selected disabled>Seleccione una posición</option>
            <option value="DELANTERO">DELANTERO</option>
            <option value="MEDIOCAMPISTA">MEDIOCAMPISTA</option>
            <option value="DEFENSOR">DEFENSOR</option>
            <option value="ARQUERO">ARQUERO</option>
        </select>
    </div>

    <div>
        <label for="skill">Habilidad:</label>
        <input type="number" name="skill" min="0" max="100">
    </div>

    <div>
        <label for="diestro">Diestro:</label>
        <input type="checkbox" name="diestro" value="1" checked>
    </div>

    <div>
        <label for="zurdo">Zurdo:</label>
        <input type="checkbox" name="zurdo" value="1">
    </div>

    <div>
        <label for="goals">Goles:</label>
        <input type="number" name="goals" min="0">
    </div>

    <div>
        <label for="assists">Asistencias:</label>
        <input type="number" name="assists" min="0">
    </div>

    <div>
        <label for="shutout">Valla invicta:</label>
        <input type="number" name="shutout" min="0">
    </div>

    <div>
        <label for="amountGames">Cantidad de partidos:</label>
        <input type="number" name="amountGames" min="0">
    </div>

    <button type="submit">Guardar</button>
</form>

@endsection