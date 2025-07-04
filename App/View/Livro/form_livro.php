<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Biblioteca - Cadastro de Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . "/Includes/menu.php"; ?>
        <h1>Cadastro de Livro</h1>

        <?= $model->getErrors(); ?>

        <form method="post" action="/livro/cadastro" class="p-5">
            <input type="hidden" name="id" value="<?= $model->id ?? null ?>">

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $model->titulo ?? null ?>">
            </div>

            <div class="mb-3">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" class="form-control" value="<?= $model->isbn ?? null ?>">
            </div>

            <div class="mb-3">
                <label for="editora">Editora:</label>
                <input type="text" name="editora" id="editora" class="form-control" value="<?= $model->editora ?? null ?>">
            </div>

            <div class="mb-3">
                <label for="ano">Ano:</label>
                <input type="text" name="ano" id="ano" class="form-control" value="<?= $model->ano ?? null ?>">
            </div>

            <div class="mb-3">
                <label for="id_categoria">Categoria:</label>
                <select name="id_categoria" id="id_categoria" class="form-select">
                    <option value="">Selecione</option>
                    <?php foreach ($model->rows_categorias as $categoria): ?>
                        <option value="<?= $categoria->id ?>" <?= $categoria->id === $model->id_categoria ? 'selected' : '' ?>>
                            <?= $categoria->descricao ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <p>Autores:</p>
                <?php foreach ($model->rows_autores as $autor): ?>
                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input"
                            type="checkbox"
                            value="<?= $autor->id ?>"
                            name="autor[]"
                            id="<?= $autor->id ?>"
                            <?= (!empty($model->id_autores) && in_array($autor->id, $model->id_autores)) ? 'checked' : '' ?>
                        >
                        <label for="<?= $autor->id ?>" class="form-check-label"><?= $autor->nome ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>