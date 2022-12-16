<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../public/css/land.css">
        <link rel="stylesheet" href="../../../public/css/navbar_e_footer.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jornal de Konoha</title>
    </head>
    <body>
        <?php require './app/views/include/navbar.html'?>
        <div class="container-lg ">
        <div style="margin-top: 40px;" class="carrossel border">
            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="true">
                <div class="carousel-indicators">
                    <?php $cont = 0; ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner carrossel-inner">
                    <a href="#1"><div  class="carousel-item carrossel-item active">
                        <img src="../../../public/img/carr3.jpg" class="d-block w-100 img-carrossel" alt="post1">
                    </div></a>
                    <a href="#2"><div class="carousel-item carrossel-item">
                        <img src="../../../public/img/carr2.jpg" class="d-block w-100 img-carrossel" alt="post2">
                    </div></a>
                    <a href="#3"><div class="carousel-item carrossel-item">
                        <img src="../../../public/img/carr1.png" class="d-block w-100 img-carrossel" alt="post3">
                    </div></a>
                    <a href="#4"><div class="carousel-item carrossel-item">
                        <img src="../../../public/img/carr4.png" class="d-block w-100 img-carrossel" alt="post4">
                    </div></a>
                    <a href="#5"><div class="carousel-item carrossel-item">
                        <img src="../../../public/img/carr5.png" class="d-block w-100 img-carrossel" alt="post5">
                    </div></a>
                </div>
                <button class="carousel-control-prev ctrl" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next ctrl" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        </div>
        <div style="margin-top: 40px;" class="container-lg">
            <h2 class="titulo-landingpage"> Mais recentes </h2>
            <?php foreach ($posts->reverse() as $post):  ?>
                <div class="card mb-3 new-card" >
                    <div class="row g-0">
                        <div class="col-md-4 imagem">
                            <img src="../../../public/img/<?= $post->imagem ?>" class="img-fluid rounded-start new-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h4 class="card-title"><b><?= $post->titulo ?></b></h4>
                            <p class="card-text"><small class="text-muted">Publicado por: <span class="nome-cred"><?= $post->autor ?> -  <?= date('d/m/Y',strtotime($post->date)) ?></span></small></p>
                            <p class="card-text"><?= $post->subtitulo ?></p>
                            <a class="mais button-leia-mais" href="visualizacao_post?id=<?= $post->id ?>">Leia Mais >>></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                
                <div class="button-mais-antigo">
                    <a href="listaposts"><button type="button" class="btn btn-primary btn-lg btn-block w-100">Mais Antigas >>></button></a>
                </div>
            </div>
        </div>
          
        <?php require './app/views/include/footer.html'?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    </body>

    
</html>