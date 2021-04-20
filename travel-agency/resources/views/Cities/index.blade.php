<h1>Lista de ciudades</h1>
@foreach($cities as $city)
    <h3>
        {{ $city->name }} <br>
        <button>Editar</button>
        <button>Eliminar</button>
    </h3>
@endforeach
