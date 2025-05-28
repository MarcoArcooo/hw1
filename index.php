
 <?php
    session_start();
    ?> 
<html>
    <head>
        <title>dribble copia</title>
        <link rel="stylesheet" href="home.css">
        <script src="index.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    </head>
    
    <body>
                <nav>
                    <div class="navcontainer1">
                        <div id="menu"><div></div> <div></div> <div></div></div>
                        <img src="Dribbble-Logo.jpg">
                        <a>Explore</a>
                         <?php  if(isset($_SESSION['user']))
                                  echo '<a class="pref" href="Preferiti.php">Preferiti</a>';
                           ?>
                        
                        <a>Find Jobs</a><a>Blog</a>
                    </div>
                    <div class="navcontainer2">
                        <?php  if(isset($_SESSION['user']))
                                  echo '<a class="pref" href="utente.php">'.$_SESSION['user'].'</a><a href="logout.php" id="logout">Logout</a>';
                                else echo ' <a href="login.php" id="logout">Login</a>';
                          ?>
                     </div>
                </nav>

            <header id="presentazione">     
                    <h1 id="frase1">Discover the world’s <br>top designers</h1>
                    <p id="frase2">
                        Explore work from the most talented and accomplished designers <br>ready to take on your next project
                    </p>
                   <?php if(isset($_SESSION['user']))
                  echo  '<form id="boxricerca">
                        <input type="text" id="domandabox" value="Search for high quality photos"></span> 
                        <div id="divbox">
                            <a>Shots</a>
                            <button id="immagine1" type="submit">
                                <img src="lente.png">
                            </button>
                        </div>
                        
                    </form>'; 
                    ?>
                    <div class="sparisci">
                        <span id="mostraRis">Chiudi</span>
                        <section id="ricerca">
                        </section>
                    </div>
                    <div id="barra2">
                        <span id="trend">Trending searches</span><a>landing page</a>
                        <a>e-commerce</a><a>logo design</a><a>icons</a>
                    </div>
                    <div id="barra3">
                        <div class="divisione"><a>Discover</a><a>Animation</a>
                        <a>Branding</a><a>Illustration</a></div><div class="divisione"><a>Mobile</a>
                        <a>Print</a><a>Product design</a><a>Typography</a></div>
                    </div> 
            </header>
            <section>
                <div id="main" 
                data-message="l'unico utilizzo di 'data-*'">
                </div>
            </section>
             <?php if(isset($_SESSION['user']))
                  echo
            '<form id="generaColore">
                <button type="submit">Genera colore</button>
                <div id="colore">
                    <div id="dati"></div><img>
                </div>
            </form>'; ?>
            
            <footer>
                <div class="footcontainer">
                    <div class="laterale">
                        <img src="Dribbble-Logo.jpg">
                    </div>
                    <div class="centrale">
                           <div class="divisione"> <a>For designer</a><a>Hire talent</a>
                            <a>Inspiration</a><a>Advertising</a></div><div class="divisione"><a>Blog</a>
                            <a>About</a><a>Carreers</a><a>Support</a></div>
                    </div>
                    <div class="laterale2">
                        <img src="threads.png">
                        <img src="facebook.png">
                        <img src="instagram.png">
                        <img src="pinterest.png">
                    </div>
                </div>
                <div class="footcontainer">
                    <div class="footitems">
                        <a>@ 2025 Dribble</a><a>Terms</a><a>Privacy</a><a>Cookies</a>
                    </div>
                    <div class="footitems">
                        <a>Jobs</a><a>Designer</a><a>Tags</a><a>Places</a><a>Resource</a>
                    </div>
                </div>
            </footer>
            <div id="postView" class="sparisci">
                <div id="visualizza">
                    <div id="visFoto">
                        <div>
                            <img src="x.png">
                        </div>
                    </div>
                </div>
            </div>
          
            <div id="menuContainer" class="sparisci">
                <div id="menuScomparsa">
                    <a>Explore</a> <?php  if(isset($_SESSION['user']))
                                  echo '<a class="pref" href="Preferiti.php">Preferiti</a>';
                           ?>
                    <a>Find Jobs</a><a>Blog</a>
                </div>
            </div>
    </body>
</html>