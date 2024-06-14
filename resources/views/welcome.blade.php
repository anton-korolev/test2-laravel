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

            <!-- Импорт -->
            <div class="tab-content p-3 border border-top-0 rounded-bottom" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-import" role="tabpanel" aria-labelledby="nav-import-tab" tabindex="0">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Ключевое слово" id="importKeyWord">
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-light" id="importButton">Импорт</button>
                            <div class="spinner-border float-end invisible" role="status" id="importSpinner">
                                <span class="visually-hidden">Загрузка...</span>
                            </div>
                        </div>

                        <div class="col-md-8 p-3 border rounded">
                            <pre id="importResult">
                            </pre>
                        </div>

                        <div class="col-12 p-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Ссылка</th>
                                        <th scope="col">Размер</th>
                                        <th scope="col">Кол-во слов</th>
                                    </tr>
                                </thead>
                                <tbody id="articleList">
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <!-- Поиск -->
                <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab" tabindex="0">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Ключевое слово" id="searchKeyWord">
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-light" id="searchButton">Найти</button>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3" id="searchTitle">
                            </div>
                            <div id="searchResult">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <textarea class="form-control border" id="articleText" rows="20">
                            </textarea>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer id="footer" class="py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; Антон Королёв 2024</div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

</html>
