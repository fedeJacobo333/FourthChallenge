<h1>Editar aereolineas</h1>

<form method="POST" action="/airlines/{{ $airline->id }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <div>
            <input class="input"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $airline->name }}"
                   required>
        </div>
    </div>
    <div>
        <label for="businessDescription">Business description</label>
        <div>
            <textarea class="input"
                      name="businessDescription"
                      id="businessDescription"
                      required>{{ $airline->businessDescription }}</textarea>
        </div>
    </div>
    <div>
        <div>
            <input class="input"
                   type="checkbox"
                   name="multiDestEnable"
                   id="multiDestEnable"
                   <?php
                        if($airline->multiDestEnable == 1)  echo ' checked';
                    ?>
            <label for="multiDestEnable">Availability to make many flights to different destinations</label>
        </div>
    </div>
    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
