<?php

    session_start();
    if(!isset($_SESSION['user']))
    {
        header("Location: login.php");
        exit;
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='cronologia.css'>
        <script src='cronol.js' defer></script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
   
    </head>
    <body>
                 <nav>
                    <div class="navcontainer1">
                        <img src="Dribbble-Logo.jpg"><div><span id="nome"><?php echo $_SESSION['user']?></span><a href='utente.php'>< Indietro</a></div>
                    </div>
                    </div>
                </nav>

                <div id="lista">
                    <h2>Cronologia Ricerche:</h2>
                    <table>


                    </table>
                </div>
                <a href='Clear.php'>Cancella Cronologia</a>
             
    </body>
</html>