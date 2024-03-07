<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('publication.index')}}">Social Network</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route("login")}}">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('profile.create')}}">Ajouter Profile</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('profile.index')}}">Tous profil</a>
                        </li>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('publication.create')}}">Ajouter Publication</a>
                            </li>
                        </ul>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('publication.index')}}">Tous Publication</a>
                    </li>
                </ul>              
                @auth
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{route("profile.show",auth()->user()->id)}}">your profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item deconnextion" href="{{route("login.logout")}}" >Déconnextion</a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</body>
</html>

