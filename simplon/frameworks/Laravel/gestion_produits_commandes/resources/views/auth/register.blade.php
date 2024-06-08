

    <h1 class="title">Créer un nouveau compte</h1>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nom complet: </label>
            <input type="text" id="name" name="name" placeholder="nom" value="{{ old("name") }}" class="form-input">
            {{-- @error("name")
                {{ $message }}
            @enderror --}}
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" placeholder="email" value="{{ old("email") }}" class="form-input">
            {{-- @error("email")
                {{ $message }}
            @enderror --}}
        </div>
        <div class="form-group">
            <label for="password">Mot de passe: </label>
            <input type="password" id="password" name="password" placeholder="mot de passe" class="form-input">
            {{-- @error("password")
                {{ $message }}
            @enderror --}}
        </div>

        <div>
            <a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a>
            <button type="submit" class="btn-primary">Inscription</button>
        </div>

        {{-- Errors --}}
        @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $key => $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    </form>
