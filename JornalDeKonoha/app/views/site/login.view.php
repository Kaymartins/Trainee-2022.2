<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-eqiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/login.css">
    <link rel="stylesheet" href="../../../public/css/navbar_e_footer.css">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">

    
    <title>Login</title>

</head>


<body>
    <?php require './app/views/include/navbar.html'?>
    <div class="main-login">

        <div class="left-login">
            <h1>Faça login para acessar o Jornal de Konoha</h1>
            <img src="../../../public/img/logo_jornal_de_konoha.png" class="left-login-img" alt="logo-jornal">
        </div>

        <div class="right-login">
            <form action="logar" method="POST" class="card-login">
                <h1>LOGIN</h1>

                <div class="textfield">
                    <label for="usuario">Email</label>
                    <input type="text" name="usuario" placeholder="Email">
                    
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <?php
                if(isset($_SESSION['error_message'])) {
                ?>
                <div class="text-warning">
                    <?= $_SESSION['error_message'] ?>
                </div>
                
                <?php
                unset($_SESSION['error_message']);
                }
                ?>
                <button type="submit" class="btn-login">Login</button>
            
            </form>

        </div>
    </div>
    <?php require './app/views/include/footer.html'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>