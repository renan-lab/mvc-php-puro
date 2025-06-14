<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . "/Includes/menu.php"; ?>

        <h1>Lista de Livros</h1>

        <a href="/livro/cadastro">Novo Livro</a>

        <?= $model->getErrors(); ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Editora</th>
                    <th scope="col">Ano</th>
                    <th scope="col">ISBN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model->rows as $livro): ?>
                    <tr>
                        <th scope="row"> <?= $livro->id ?> </th>
                        <td> <a href="/livro/cadastro?id=<?= $livro->id ?>"><?= $livro->titulo ?></a> </td>
                        <td> <?= $livro->editora ?> </td>
                        <td> <?= $livro->ano ?> </td>
                        <td> <?= $livro->isbn ?> </td>
                        <td> <a href="/livro/delete?id=<?= $livro->id ?>">Remover</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>