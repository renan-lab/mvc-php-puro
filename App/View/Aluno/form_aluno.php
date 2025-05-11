<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Biblioteca - Cadastro de Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . "/Includes/menu.php"; ?>
        <h1>Cadastro de Aluno</h1>

        <form method="post" action="/aluno/cadastro" class="p-5">
            <input type="hidden" name="id" value="<?= $aluno->id ?? null ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" value="<?= $aluno->nome ?? null ?>" id="nome" name="nome">
            </div>
            <div class="mb-3">
                <label for="ra" class="form-label">RA:</label>
                <input type="text" class="form-control" value="<?= $aluno->ra ?? null ?>" id="ra" name="ra">
            </div>
            <div class="mb-3">
                <label for="curso" class="form-label">Curso:</label>
                <input type="text" class="form-control" value="<?= $aluno->curso ?? null ?>" id="curso" name="curso">
            </div>
            
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>