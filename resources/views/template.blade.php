<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>App Name - @yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <button class="navbar-toggler navbar-toggler-right"
            type="button" data-toggle="collapse"
            data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Język</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ URL::to('language/pl') }}">polski</a>
                    <a class="dropdown-item" href="{{ URL::to('language/en') }}">angielski</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-toggle = "dropdown" href="{{ URL::to('books') }}">Książki </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ URL::to('books/cheapest') }}">Top 3 najtańszych</a>
                    <a class="dropdown-item" href="{{ URL::to('books/longest') }}">Top 3 najdłuższych</a>
                    <a class="dropdown-item" href="{{ URL::to('books') }}">Wszystkie</a>
                    <a class="dropdown-item" href="{{ URL::to('books/create') }}">Dodaj nową</a>
                </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('loans') }}">Wypożyczenia</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ URL::to('loans') }}">Wszystkie</a>
                    <a class="dropdown-item" href="{{ 'loans/create' }}">Dodaj nowe</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('authors') }}" class="nav-link">Autorzy</a>
                <div class="dropdown-menu">
                    <a href="{{ URL::to('authors') }}" class="dropdown-item">Wszyscy</a>
                    <a href="{{ URL::to('authors/create') }}" class="dropdown-item">Dodaj nowego</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif

@yield('content')



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/code.js') }}"></script>
</body>
</html>
