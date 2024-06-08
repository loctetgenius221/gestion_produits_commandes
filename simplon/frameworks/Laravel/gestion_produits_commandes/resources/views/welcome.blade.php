<form method="POST" action={{ route('logout') }}>
    @csrf
    <button type="submit">Deconnexion</button>
</form>
