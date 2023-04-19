@extends('layouts.layouts')

@section('content')

@if(session('status'))
    <div class="alert alert-status">
        {{ session('status') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="sidebar">
    <!-- Sidebar -->
    <aside class="sidebar__sidebar">
        
        <h3>Crear un partido </h3>
    <select name="cancha" required form="mixTeams">
        <option value="" selected disabled>Tipo de cancha</option>
        <option value="5">FUTBOL 5</option>
        <option value="6">FUTBOL 6</option>
        <option value="8">FUTBOL 8</option>
        <option value="11">FUTBOL 11</option>
    </select>
    <button type="submit" form="mixTeams">Crear partido</button>
    <p>Mostrando {{count($players)}} jugadores </p>

    <hr>

    <h3> SearchBar: </h3>
        <form method="GET" action="{{ route('home.filters')}}" id='filters'>
            @csrf
            <div class="search-box">
                <input type="text" class="search-box__input" name="query" />
                <button type='submit' onclick="return validateForm()">Buscar</button>
            </div>
            {{isset($search) ? 'Mostrando resultados de: '. $search : ''}}
    <hr>

        <h3> Filter by: </h3>
            <h5> Posicion principal </h5>
            <div>
                <label>
                <input type="checkbox" name="posiciones1[]" value="DELANTERO" {{in_array('DELANTERO', $checkbox['posiciones1']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DELANTERO
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones1[]" value="MEDIOCAMPISTA" {{in_array('MEDIOCAMPISTA', $checkbox['posiciones1']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                MEDIOCAMPISTA
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones1[]" value="DEFENSOR" {{in_array('DEFENSOR', $checkbox['posiciones1']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DEFENSOR
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones1[]" value="ARQUERO" {{in_array('ARQUERO', $checkbox['posiciones1']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                ARQUERO
                </label>
            </div>

            <h5> Posicion secundaria </h5>
            <div>
                <label>
                <input type="checkbox" name="posiciones2[]" value="DELANTERO" {{in_array('DELANTERO', $checkbox['posiciones2']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DELANTERO
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones2[]" value="MEDIOCAMPISTA" {{in_array('MEDIOCAMPISTA', $checkbox['posiciones2']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                MEDIOCAMPISTA
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones2[]" value="DEFENSOR" {{in_array('DEFENSOR', $checkbox['posiciones2']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DEFENSOR
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones2[]" value="ARQUERO" {{in_array('ARQUERO', $checkbox['posiciones2']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                ARQUERO
                </label>
            </div>

            <h5> Posicion terciaria </h5>
            <div>
                <label>
                <input type="checkbox" name="posiciones3[]" value="DELANTERO" {{in_array('DELANTERO', $checkbox['posiciones3']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DELANTERO
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones3[]" value="MEDIOCAMPISTA" {{in_array('MEDIOCAMPISTA', $checkbox['posiciones3']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                MEDIOCAMPISTA
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones3[]" value="DEFENSOR" {{in_array('DEFENSOR', $checkbox['posiciones3']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DEFENSOR
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones3[]" value="ARQUERO" {{in_array('ARQUERO', $checkbox['posiciones3']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                ARQUERO
                </label>
            </div>

            <h5> Posicion cuaternaria </h5>
            <div>
                <label>
                <input type="checkbox" name="posiciones4[]" value="DELANTERO" {{in_array('DELANTERO', $checkbox['posiciones4']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DELANTERO
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones4[]" value="MEDIOCAMPISTA" {{in_array('MEDIOCAMPISTA', $checkbox['posiciones4']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                MEDIOCAMPISTA
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones4[]" value="DEFENSOR" {{in_array('DEFENSOR', $checkbox['posiciones4']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                DEFENSOR
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="posiciones4[]" value="ARQUERO" {{in_array('ARQUERO', $checkbox['posiciones4']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                ARQUERO
                </label>
            </div>

            <h5>PIERNA </h5>
            <div>
                <label>

                <input type="checkbox" name="diestro" value="1" {{isset($checkbox['diestro']) ? 'checked' : ''}}/>
                <span class="checkmark"></span>
                DIESTRO
                </label>
            </div>
            <div>
                <label>
                <input type="checkbox" name="zurdo" value="1" {{isset($checkbox['zurdo']) ? 'checked' : ''}} />
                <span class="checkmark"></span>
                ZURDO
                </label>
            </div>
            @foreach ($playersIds as $key =>$player)
            
            <input type="checkbox" id="player-{{ $key }}" name="playercheck[]" value="{{ $key }}" {{ $playersIds[$key] ? 'checked' : '' }} style=''>
            @endforeach
            <button type="submit" >Apply filters</button>
        </form>
    <hr>

    <h3> Crear </h3>
        <form method="GET" action="{{ route('players.create') }}">
            <button type="submit">Crear nuevo jugador</button>
        </form>
    <hr>
    
    

</aside>

<!-- Main -->

<main class="sidebar__main">
    <form action="{{ route('home.mixTeams') }}" method="post" id='mixTeams'>
        @foreach ($playersIds as $key =>$player)
            
        <input type="checkbox" id="player-{{ $key }}" name="playercheck2[]" value="{{ $key }}" {{ $playersIds[$key] ? 'checked' : '' }} style='display: none'>
        @endforeach
        @csrf
        <div class="card-layout">
            @if(!is_null($players))
            
            @foreach ($players as $key => $player)
            
            <div class="card-container">
                <label for="player-{{ $player->id }}" class="card-checkbox-label">
                    {{isset($checkbox['zurdo']) ? 'checked' : ''}}
                    <div class="card-layout__item {{ isset($checkbox['id'][$player->id]) ? 'clicked' : 'clickable' }}">
                    <div class="card-layout__header">
                      <h3>{{ $player->name }}</h3>
                      <p>Position: {{ $player->posicion1 }}</p>
                      <p>Skill: {{ $player->skill }}</p>
                    </div>
                    <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                    </div>
                    <div class="card-layout__footer">
                      <a href="{{ route('players.show', $player->id) }}">
                        Ver mas
                      </a>
                    </div>
                  </div>
                </label>
                <input type="checkbox" id="player-{{ $player->id }}" name="player[]" value="{{ $player->id }}" class="card-checkbox"  {{ $playersIds[$player->id] ? 'checked' : '' }}>
              </div>
              
            
            @endforeach
            @else
            <p>No players found.</p>
            @endif
            
        </form>
    </div> 
    </main>
</div>



@endsection