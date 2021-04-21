<h1>Crear ciudad</h1>

<form method="POST" action="/cities">
    @csrf
    <div>
        <label for="name">Name</label>
        <div>
            <input class="input" type="text" name="name" id="name" required>
        </div>
    </div>
    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
