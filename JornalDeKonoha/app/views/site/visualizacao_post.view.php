<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização Individual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/visualizacao_post.css">
    <link rel="stylesheet" href="../../../public/css/navbar_e_footer.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php require './app/views/include/navbar.html'?>
    <div class="main">
        <div class="titulo-post">
            <h1><?= $post->titulo ?></h1>
            <h2><?= $post->subtitulo ?></h2>
            <div class="titulo-usuario">
                <div class="information-usuario">
                    <figcaption><?= $post->autor ?></figcaption>
                    <figcaption><?= date('d/m/Y',strtotime($post->date)) ?></figcaption>
                </div>
            </div>
        </div>

        <div class="conteudo">
            <div class="img-principal">
                <img src="../../../public/img/<?= $post->imagem ?>" alt="Poster de Chainsaw Man">
            </div>
            <p><?= $post->conteudo ?></p>
        </div>
    </div>
    <?php require './app/views/include/footer.html'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>