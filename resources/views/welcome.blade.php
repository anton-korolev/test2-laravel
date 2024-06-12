<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Test2 - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">

    <header id="header" class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Wikiparser</a>
        </div>
    </header>

    <main id="main" class="h-100" role="main">
        <div class="container my-4">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-import-tab" data-bs-toggle="tab" data-bs-target="#nav-import" type="button" role="tab" aria-controls="nav-import" aria-selected="true">Импорт статей</button>
                    <button class="nav-link" id="nav-search-tab" data-bs-toggle="tab" data-bs-target="#nav-search" type="button" role="tab" aria-controls="nav-search" aria-selected="false">Поиск</button>
                </div>
            </nav>
            <div class="tab-content p-3 border border-top-0 rounded-bottom" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-import" role="tabpanel" aria-labelledby="nav-import-tab" tabindex="0">Импорт</div>
                <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab" tabindex="0">Поиск</div>
            </div>
        </div>
    </main>

    <footer id="footer" class="py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; Антон Королев 2024</div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
