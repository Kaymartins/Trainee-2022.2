<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Posts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../public/css/lista_posts.css">
        <link rel="stylesheet" href="../../../public/css/navbar_e_footer.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    <?php require './app/views/include/navbar.html'?>
        <div class="main">
        
            <div class="navigation">
            
                <div class="titulo">
                    <h3>Lista de Posts</h3>
                </div>

                <nav class="navbar">
                    <div class="container-fluid">
                        <form class="d-flex" method="GET" action="/listaposts/search">
                            <input name="busca" class="form-control me-2" type="search" placeholder="Pesquisar posts"
                                aria-label="Search" id="pesquisar" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>">
                            <button type="submit" class="btn btn-primary">&telrec;</button>
                        </form>
                    </div>
                </nav>
            </div>

            <?php
            if(empty($posts)){
                ?>
                <div style="height:50vh;" class="d-flex justify-content-center align-items-center">
                    <h1 class="titulo">Posts não foram encontrados!</h1>
                </div>
                <?php
            } else if(!isset($_GET['busca'])) {
            ?>
            <div class="card-vertical">
                <?php $cont = 0;
                    foreach ($posts as $post): 
                        if (++$cont <= 4) { ?>
                        <div class="card cards-ver" style="width: 18rem;">
                            <img src="../../../public/img/<?= $post->imagem ?>" class="card-img-top" alt="imagem">
                            <div class="card-body">
                                <h5 class="card-title"><?= $post->titulo ?></h5>
                                <p class="card-text"><?= $post->subtitulo ?></p>
                                <a class="mais" href="visualizacao_post?id=<?= $post->id ?>">Leia Mais >>></a>
                            </div>
                        </div>
                <?php 
                    }else { ?>
            </div>

            <div class="card-horizontal">
                    <div class="card mb-3 cards-hor">
                        <div class="row g-0">
                            <div class="col-md-4 imagem">
                                <img src="../../../public/img/<?= $post->imagem ?>" class="img-fluid rounded-start new-img"
                                    alt="imagem">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body card-texto">
                                    <h5 class="card-title"><?= $post->titulo ?></h5>
                                    <p class="card-text"><small class="text-muted"><span><?= date('d/m/Y',strtotime($post->date)) ?></span></small></p>
                                    <p class="card-text"><?= $post->subtitulo ?></p>
                                    <a class="mais" href="visualizacao_post?id=<?= $post->id ?>">Leia Mais >>></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } 
                endforeach; 
            } else{    
                if($pesquisa == "")
                    header('Location: /listaposts');
                else {
                    foreach ($posts as $post):
                    ?>
                        <div class="card-horizontal">
                            <div class="card mb-3 cards-hor">
                                <div class="row g-0">
                                    <div class="col-md-4 imagem">
                                        <img src="../../../public/img/<?= $post->imagem ?>" class="img-fluid rounded-start new-img"
                                            alt="imagem">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body card-texto">
                                            <h5 class="card-title"><?= $post->titulo ?></h5>
                                            <p class="card-text"><small class="text-muted"><span><?= date('d/m/Y',strtotime($post->date)) ?></span></small></p>
                                            <p class="card-text"><?= $post->subtitulo ?></p>
                                            <a class="mais" href="visualizacao_post?id=<?= $post->id ?>">Leia Mais >>></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                    endforeach;
                }
            }
            ?>
            </div>
        </div>

        <?php if(!isset($_GET['busca'])) 
            require './app/views/include/pagination.php'
        ?>
        <?php require './app/views/include/footer.html'?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
</html>