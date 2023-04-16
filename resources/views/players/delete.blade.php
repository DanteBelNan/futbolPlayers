@extends('layouts.layouts')

@section('content')


    <div class="container">
        <h1>Confirmar eliminación</h1>

        <form method="POST" action="{{ route('players.destroy', $player->id) }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $player->id }}">
            <h2>¿Estás seguro de que quieres borrar a {{ $player->name }}?</h2>
            <button type="submit" class="btn btn-danger">Sí, eliminar</button>
            <a href="{{ route('home.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>




@endsection