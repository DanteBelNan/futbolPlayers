@extends('layouts.layouts')

@section('content')


<div class="split-screen">
    <!-- Left content -->
    <div class="split-screen__half">

        <h5 class="card-title">{{ $player->name }}</h5>
        <img src="{{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }}">
        <p class="card-text"> {{$player->desc}} </p>
        <p class="card-text"> Habilidad: {{$player->skill}} </p>
        
    </div>
    
    <!-- Right content -->
    <div class="split-screen__half">
        <div class="card">
                <p class="card-text">Posición: {{ $player->posicion1 }}</p>
                @if ($player->posicion2)
                <p class="card-text">Posición 2: {{ $player->posicion2 }}</p>
                @endif
                @if ($player->posicion3)
                <p class="card-text">Posición 3: {{ $player->posicion3 }}</p>
                @endif
                @if ($player->posicion4)
                <p class="card-text">Posición 4: {{ $player->posicion4 }}</p>
                @endif
                <p class="card-text">Edad: {{ $player->age }}</p>
                <p class="card-text">Altura: {{ $player->height }} cm</p>
                <p class="card-text">Diestro/Zurdo: {{ $player->diestro ? 'Diestro' : 'Zurdo' }}</p>
                <p class="card-text">Goles: {{ $player->goals ?? 0 }}</p>
                <p class="card-text">Asistencias: {{ $player->assists ?? 0 }}</p>
                <p class="card-text">Partidos jugados: {{ $player->amountGames ?? 0 }}</p>
                <p class="card-text">Valla invicta: {{ $player->vallaInvicta ? 'Sí' : 'No' }}</p>
        </div>
        <form method="GET" action="{{ route('players.edit' , $player->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $player->id }}">
            <button type="submit">Editar jugador</button>
        </form>
        <form method="GET" action="{{ route('players.delete', $player->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $player->id }}">
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        
    
    </div>
</div>

<form method="GET" action="{{ route('home.index') }}">
    <button type="submit">Ir a la página de inicio</button>
</form>

@endsection
    