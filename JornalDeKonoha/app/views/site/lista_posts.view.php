<!DOCTYPE html>

<?php 

// use App\Models\Post;
// use App\Models\User;
// use App\Core\App;

// $busca = $mysql->real_escape_string($_GET['busca']);
// $sql_code = "SELECT * FROM posts WHERE titulo LIKE '%$busca%'";
// $sql_query = $mysql->query($sql_code);

// if(!isset($_GET['busca'])) {
//     header('Location: listaposts');
// }




// $mysql = mysqli_connect('localhost', 'root', '', 'jornaldekonoha');
// $pesquisar = $_GET['busca'];
// //echo $pesquisar; 

// $result_posts = "SELECT * FROM posts WHERE titulo LIKE '%$pesquisar%'";
// $resultado_posts = mysqli_query($mysql, $result_posts);

// while($rows_cursos = mysqli_fetch_array($resultado_posts)) {

//     echo "Nome do post: " . $rows_cursos['titulo'] . "<br>";
// }


?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Posts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../public/css/lista_posts.css">
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
                        <form class="d-flex">
                            <input name="busca" class="form-control me-2" type="search" placeholder="Pesquisar posts"
                                aria-label="Search" id="pesquisar" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>">
                            <button type="submit" class="btn btn-primary">&telrec;</button>
                        </form>
                    </div>
                </nav>
            </div>

            <div class="card-vertical">
                <?php $cont = 0;
                //while($rows_cursos = mysqli_fetch_array($resultado_posts)):
                if(!isset($_GET['busca'])) {
                foreach ($posts as $post): 
                    if (++$cont <= 4) { ?>
                <div class="card cards-ver" style="width: 18rem;">
                    <img src="../../../public/img/<?= $post->imagem ?>" class="card-img-top" alt="imagem">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->titulo ?></h5>
                        <p class="card-text"><?= $post->conteudo ?></p>
                        <a class="mais" href="#">Leia mais >>></a>
                    </div>
                </div>
                <?php }else { ?>
            </div>

            <div class="card-horizontal">
                    <div class="card mb-3 cards-hor">
                        <div class="row g-0">
                            <div class="col-md-4 imagem">
                                <img src="../../../public/img/<?= $post->imagem ?>" class="img-fluid rounded-start"
                                    alt="imagem">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body card-texto">
                                    <h5 class="card-title"><?= $post->titulo ?></h5>
                                    <p class="card-text"><small class="text-muted"><span><?= date('d/m/Y',strtotime($post->date)) ?></span></small></p>
                                    <p class="card-text"><?= $post->conteudo ?></p>
                                    <a class="mais" href="#">Leia mais >>></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } endforeach; 
                    //endwhile;
                } else{ 
                ?>
                    <?php       
                    $mysqli = new mysqli('localhost', 'root', '', 'jornaldekonoha');

                    $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                    //$sql_code = "SELECT * FROM posts WHERE titulo LIKE '%$pesquisa%'";
                    //$sql_query = $mysqli->query($sql_code);
                    if($pesquisa == "")
                        header('Location: listaposts');
                    //if($sql_query->rum_rows > 0){
                    else {
                        //while($dados = $sql_query->fetch_assoc()){
                            foreach ($posts as $post):
                                //if(strrpos($post->titulo, $pesquisa) !== false) {
                                if (preg_match("/{$pesquisa}/i", $post->titulo)) {
                        ?>
                            <div class="card-horizontal">
                                <div class="card mb-3 cards-hor">
                                    <div class="row g-0">
                                        <div class="col-md-4 imagem">
                                            <img src="../../../public/img/<?= $post->imagem ?>" class="img-fluid rounded-start"
                                                alt="imagem">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body card-texto">
                                                <h5 class="card-title"><?= $post->titulo ?></h5>
                                                <p class="card-text"><small class="text-muted"><span><?= date('d/m/Y',strtotime($post->date)) ?></span></small></p>
                                                <p class="card-text"><?= $post->conteudo ?></p>
                                                <a class="mais" href="#">Leia mais >>></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        endforeach;
                        }
                    }
                //}
                 ?>
            </div>
        </div>

        <?php require './app/views/include/footer.html'?>
        
        <script>
            var search = document.getElementeById('pesquisar');
            function searchData() {
                window.location = 'listaposts?search=' + search.value;
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
</html>