<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Biblioteca - Cadastro de Empréstimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . "/Includes/menu.php"; ?>
        <h1>Cadastro de Empréstimo</h1>

        <?= $model->getErrors(); ?>

        <form method="post" action="/emprestimo/cadastro" class="p-5">
            <input type="hidden" name="id" value="<?= $model->id ?? null ?>">

            <div class="mb-3">
                <label for="id_aluno">Aluno:</label>
                <select name="id_aluno" id="id_aluno" class="form-select">
                    <option value="">Selecione</option>
                    <?php foreach ($model->rows_alunos as $aluno): ?>
                        <option value="<?= $aluno->id ?>" <?= $aluno->id === $model->dados_aluno?->id ? 'selected' : '' ?>>
                            <?= $aluno->nome ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_livro">Livro:</label>
                <select name="id_livro" id="id_livro" class="form-select">
                    <option value="">Selecione</option>
                    <?php foreach ($model->rows_livros as $livro): ?>
                        <option value="<?= $livro->id ?>" <?= $livro->id === $model->dados_livro?->id ? 'selected' : '' ?>>
                            <?= $livro->titulo ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="data_emprestimo" class="form-label">Data Empréstimo:</label>
                <input type="date" class="form-control" name="data_emprestimo" id="data_emprestimo" value="<?= $model->data_emprestimo ?>">
            </div>

            <div class="mb-3">
                <label for="data_devolucao" class="form-label">Data Devolução:</label>
                <input type="date" class="form-control" name="data_devolucao" id="data_devolucao" value="<?= $model->data_devolucao ?>">
            </div>


            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>