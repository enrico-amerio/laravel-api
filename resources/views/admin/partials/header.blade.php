<header>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark text-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Vedi Sito</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="ms-auto">
            <form action="{{ route('logout')}}" method='POST'>
                @csrf
                <button class="btn btn-danger " type="submit">Log Out</button>
            </form>
        </div>
        </div>
    </div>
</nav>

</header>
