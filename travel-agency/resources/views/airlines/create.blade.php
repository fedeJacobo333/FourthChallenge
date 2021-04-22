<h1>Crear Aereolinea</h1>

<form method="POST" action="/airlines">
    @csrf
    <div>
        <label for="name">Name</label>
        <div>
            <input class="input"
                   type="text"
                   name="name"
                   id="name"
                   >
        </div>
    </div>
    <div>
        <label for="businessDescription">Business description</label>
        <div>
            <textarea class="input"
                      name="businessDescription"
                      id="businessDescription"
                      required></textarea>
        </div>
    </div>
    <div>
        <div>
            <input class="input"
                   type="checkbox"
                   name="multiDestEnable"
                   id="multiDestEnable">
            <label for="multiDestEnable">Availability to make many flights to different destinations</label>
        </div>
    </div>
    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
