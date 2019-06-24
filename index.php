<?php

session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>


<html lang="en">
    <head>
        <title>Api Git</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="./node_modules/bootstrap/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous"
        />
        <link rel="style" href="./style.css" />
    </head>
    <body id="body" style="background-color: #FFEBA8">
        <nav class="navbar navbar-light" style="background-color: #E8A68E">
            <a class="navbar-brand">Git Hub Profiles</a>

            
            <form class="form-inline">
            <b class="mx-2"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
                <button class="btn btn-outline-dark my-2 my-sm-0"  href="login.php" id="btnIniciar">Iniciar Sessão</button>
                <button class="btn btn-outline-dark my-2 my-sm-0 mx-1"  href="logout.php" id="btnSair">Sair</button>
            </form> 
        </nav>
        <div class="container py-5 mx">
            <div class="row">
                <div class="col-12">
                    <h1 style="font-family: Comfortaa" class="text-center">Git Hub Profiles</h1>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12 ">
                    <h2 class="text-center" style="font-size: 30px">Find your friend or yourself user in GitHub</h2>
                    <div class="row py-3">
                        <div class="col-12 mx-auto">
                            <img src="GitHub-Mark/PNG/GitHub-Mark-120px-plus.png" class="img-fluid mx-auto d-block" alt="Responsive image" />
                        </div>
                    </div>
                    <div class="row py-3">
                        <form class="mx-auto" id="formulario">
                            <div class="row mx-auto">
                                <div class="col">
                                    <label style="font-family: Comfortaa">Insira o nome de GitHub a procurar</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control mx-auto" placeholder="GitHub Name" id="pesquisa" />
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col">
                                    <input type="submit" class="form-control mx-auto" placeholder="Go for it" />
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                        <div id="resultado" style="background-color: #E8DC8E"></div>
                        </div>
                    </div>
                </div>
            </div>

            

            

        <script src="./node_modules/jquery/dist/jquery.min.js"></script>
        <script src="./node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="apis.js"></script>
    </body>
</html>
