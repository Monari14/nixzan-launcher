<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="title-bar">
        <button id="minimize-btn">_</button>
        <button id="close-btn">X</button>
    </div>
    <div class="container">
        <?php
        include "UserController.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $cUser = new UserController();

            if ($cUser->checkUserExists($username, $email)) {
                echo "Nome de usuário ou e-mail já estão em uso.";
            } else {
                $cUser->setUsername($username);
                $cUser->setEmail($email);
                $cUser->setSenha($senha);

                if($cUser->inserirUser()){
                    echo "Registro concluído!";
                } else {
                    echo "Erro ao registrar usuário.";
                }
            }

        } else {
            echo "Método de requisição não suportado.";
        }
        ?>
    </div>
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
