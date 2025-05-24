<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Biblioteca - Cadastro de Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . "/Includes/menu.php"; ?>
        <h1>Cadastro de Categoria</h1>

        <form method="post" action="/categoria/cadastro" class="p-5">
            <input type="hidden" name="id" value="<?= $categoria->id ?? null ?>">

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="<?= $categoria->descricao ?? null ?>">
            </div>
            
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>