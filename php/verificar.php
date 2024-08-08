<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/lg.css">

</head>
<body>
<div class="title-bar">
        <button id="menu-btn">☰</button>
        <button id="minimize-btn">_</button>
        <button id="close-btn">X</button>
    </div>
    <?php
        include "UserController.php";
        $u = new UserController();
        $username = $_POST['username'];
        $senha = $_POST['senha'];
        if($username && $senha){
            $usuario = $u->selectUser($username, $senha);
        }
        if(empty($usuario)) {
            echo "E-mail ou senha invalidos";
            ?>
            <br>
            <a href="../login.html">Retornar</a><br>
            <?php
        } else {
            ?>
    </div>
    
    <div class="container">
        <h2>Meus jogos</h2>

        <div class="game-card">
            <img src="img/img.jpg" alt="">
            <span>JOGO 1</span>
        </div>

        <div class="game-card">
            <img src="img/img.jpg" alt="">
            <span>JOGO 2</span>
        </div>   

        <div class="game-card">
            <img src="img/img.jpg" alt="">
            <span>JOGO 3</span>
        </div>    

        <div class="game-card">
            <img src="img/img.jpg" alt="">
            <span>JOGO 4</span>
        </div>
<br>
        <h2>Todos os jogos</h2>
        <div class="all-games"></div>
    </div>
        <?php } ?>
    <script>
        document.getElementById('minimize-btn').addEventListener('click', () => {
            window.api.minimizeWindow();
        });

        document.getElementById('close-btn').addEventListener('click', () => {
            window.api.closeWindow();
        });
    </script>
</body>
</html>