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

        <h1>Lista de Autores</h1>

        <a href="/autor/cadastro">Novo Autor</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">CPF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autores as $autor): ?>
                <tr>
                    <th scope="row"> <?= $autor->id ?> </th>
                    <td> <a href="/autor/cadastro?id=<?= $autor->id ?>"><?= $autor->nome ?></a> </td>
                    <td> <?= $autor->data_nascimento ?> </td>
                    <td> <?= $autor->cpf ?> </td>
                    <td> <a href="/autor/delete?id=<?= $autor->id ?>">Remover</a> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>