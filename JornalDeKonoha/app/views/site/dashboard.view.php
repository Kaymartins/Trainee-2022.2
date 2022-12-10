<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../public/css/dashboard.css">
    <link rel="stylesheet" href="../../../public/css/sidebar.css">

    <title>Dashboard</title>
</head>

<body>
    <?php require './app/views/include/sidebar.html'?>
    <div class="logo">
        <img src="../../../public/img/logo_jornal_de_konoha.png" alt="logo logo jornal de konoha">
    </div>


    <div class="grupo-cartoes">
        <div class="card cartao">
            <img src="../../../public/img/file_icon.png" class="card-img-top imagem">
            <div class="card-body">
                <h5 class="card-title titulo">Posts</h5>

            </div>
            <div class="card-footer botaodashboard">
                <a href = "posts"><button type="button" class="btn btn-secondary">Ver posts</button></a>
            </div>
        </div>



        <div class="card cartao">
            <img src="../../../public/img/user_icon.png" class="card-img-top imagem">
            <div class="card-body">
                <h5 class="card-title titulo">Usuário</h5>

            </div>
            <div class="card-footer  botaodashboard">
            <a href = "users"><button type="button" class="btn btn-secondary">Ver usuário</button></a>
            </div>
        </div>



        <div class="card cartao">
            <img src="../../../public/img/logout_icon.png" class="card-img-top imagem">
            <div class="card-body">
                <h5 class="card-title titulo">Logout</h5>

            </div>
            <div class="card-footer botaodashboard">
                <button type="button" class="btn btn-secondary">Sair</button>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>