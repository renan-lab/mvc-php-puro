<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas Biblioteca - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div>
        <h1>Login</h1>

        <form action="/login" method="post" class="p-5">
            <?= "<p>$erro</p>" ?>

            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" value="<?= $model->email ?>" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>
            <div class="mb-3">
                <input type="checkbox" class="form-check-input" name="lembrar" id="lembrar">
                <label class="form-check-label" for="lembrar">Lembrar meu usuário</label>
            </div>

            <button class="btn btn-success" type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>