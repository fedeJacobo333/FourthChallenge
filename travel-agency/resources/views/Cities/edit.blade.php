<h1>Editar ciudad</h1>

<form method="POST" action="/Cities/{{ $city->id }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <div>
            <input class="input"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $city->name }}" required>
        </div>
    </div>
    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
