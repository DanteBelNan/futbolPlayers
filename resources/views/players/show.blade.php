@extends('layouts.layouts')

@section('content')

<h1> Bienvenido al perfil del jugador de {{$player->id}} </h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $player->name }}</h5>
        <img src="{{ asset(($player->avatar ? 'custom/'.$player->avatar : 'default/defaultImage.png')) }}" alt="Avatar">
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
</div>

<form method="GET" action="{{ route('home.index') }}">
    <button type="submit">Ir a la página de inicio</button>
  </form>
  
@endsection
    