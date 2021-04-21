<h1>Informacion de la aereolinea</h1>

<h2 style="margin: auto"> {{ $airline->name }} </h2>
<h3 style="margin: auto"> {{ $airline->businessDescription }} </h3>

@if($airline->multiDestEnable == 1)
    <h3 style="margin: auto"> Esta habilitada para realizar muchos vuelos a diferentes destinos. </h3>
@else
    <h3 style="margin: auto"> No esta habilitada para realizar muchos vuelos a diferentes destinos. </h3>
@endif
