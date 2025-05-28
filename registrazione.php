<?php
   session_start();
    if(isset($_SESSION["user"]))
    {
        header("Location: index.php");
        exit;
    }


    if (!empty($_POST["user"]) && !empty($_POST["pass"]) && !empty($_POST["cpass"]) && !empty($_POST["email"]))
    {
          $conn = mysqli_connect('localhost', 'root', '', 'homework') or die(mysqli_error($conn));
       
        if(!isset($_POST['user'])) {
            $error = true;
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['user']);
            $query = "SELECT username FROM utenti WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error = true;
            }
        }
        if (strlen($_POST["pass"]) < 8) {
            $error = true;
        }
        if (strcmp($_POST["pass"], $_POST["cpass"]) != 0) {
           $error = true;
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = true;
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM utenti WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error = true;
            }
        } 
        if (!isset($error)) {
            $password = mysqli_real_escape_string($conn, $_POST['pass']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO utenti(username, pass, email) VALUES('$username', '$password', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["user"] = $_POST["user"];
                $_SESSION["pass"] = $_POST["pass"];
                mysqli_close($conn);
                header("Location: index.php");
                exit;
            } else {
                $error = true;
            }
        }
        mysqli_close($conn);
    }
    else if (isset($_POST["user"])) {
        $error = true;
    }

?>
<html>
    <head>
        <link rel='stylesheet' href='regi.css'>
        <script src='regis.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
   
    </head>
    <body>
         <nav>
                    <div class="navcontainer1">
                        <img src="Dribbble-Logo.jpg"><span id="titolo">REGISTRAZIONE</span><a href='login.php'>Login</a>
                    </div>
                    </div>
                </nav>
        <div id="Err">
         <?php
            // Verifica la presenza di errori
            if(isset($error))
            {
                echo "<p>";
                echo "Nome Utente in uso <br> o Password non Valida.";
                echo "</p>";
            }
            ?>
        </div>
        <main>
            <form id="logForm" method='post'>
                     <label>Email <input id="email" type='text' name='email'></label>
                    <label>Nome utente <input id="username" type='text' name='user'></label>
                    <label>Password <input id="password" type='password' name='pass' ></label>
                    <label>Conferma password<input id="cpass" type='password' name='cpass' ></label>
                  <div id="but">  <button id="invia" type='submit'>invia</button> </div>
            </form>
       
        </main>
             <span>La password deve essere di almeno 8 caratteri e avere un carattere speciale  $%&/()</span>
    </body>
</html>