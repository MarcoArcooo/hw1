<?php

    session_start();
    if(!isset($_SESSION['user']))
    {
        header("Location: login.php");
        exit;
    }
    
        // Carico le informazioni dell'utente loggato per visualizzarle nella sidebar (mobile)
        $conn = mysqli_connect('localhost', 'root', '', 'homework');
        $user = mysqli_real_escape_string($conn, $_SESSION['user']);
        $query = "SELECT * FROM utenti WHERE username = '$user'";
        $res = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res);   

?>

<html>
    <head>
        <link rel='stylesheet' href='ut.css'>
        <script src='utenti.js' defer></script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
   
    </head>
    <body>
                 <nav>
                    <div class="navcontainer1">
                        <img src="Dribbble-Logo.jpg"><div><span id="nome"><?php echo $_SESSION['user']?></span><a href='index.php'>Home</a></div>
                    </div>
                    </div>
                </nav> 
                <div id="info">
                <h1>Nome utente: <?php echo $_SESSION['user']?></h1>
                <h6>data creazione account: <?php echo $userinfo['data_registrazione'];?></h6>
                <h2>email: <?php echo $userinfo['email'];?></h2>
                <label >Password: <input type="password" <?php echo "value=".$_SESSION['pass'] ?>></label>

                <h3></h3>

                <a id="cron" href="cronologia.php">Cronologia ricerche</a>
                </div>
        <img id="sfondo" src="Sfondo.jpg">
    </body>
</html>