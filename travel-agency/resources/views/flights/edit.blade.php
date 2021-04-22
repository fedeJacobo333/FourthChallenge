<h1>Editar vuelo</h1>

<form method="POST" action="/flights/{{ $flight->id }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">campo 1</label>
        <div>

        </div>
    </div>
    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
