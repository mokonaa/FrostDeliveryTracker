<header>
        <div class="header">
                <a href="index.php"><img src="../img/logo.png" alt="Frost Delivery Tracker Logo" class="logo"
                        draggable="false"></a>

                <nav>
                <a href="../pageIndex/index.php">Accueil</a>
                <?php

                        require('../php/connect.php');

                        //On démarre la session (possibilité ensuite d'utiliser $_SESSION)
                        session_start();

                        //si on est connecté, le nouveau lien est disponible
                        if(isset($_SESSION['ID']))
                        {
                                echo '<a href="../configurationColis/configurationColis.php">Configuration de colis</a>';
                        }

                ?>
                                
                <a href="../pageApropos/apropos.php">À propos</a>
                <a href="../pagePartenaires/partenaires.php">Partenaires</a>
                <a href="../pageAdherer/adherer.php">Adhérer</a>
                <a href="../pageFaq/faq.php">FAQ</a>
                </nav>

                <?php
                        if(isset($_SESSION['ID']))
                        {
                                echo '<a href="../php/processlogout.php"><img src="../img/logout.png" alt="logout" class="user-login"></a>';
                        }
                        else
                        {
                                echo '<a href="../pageLogin/login.php"><img src="../img/user.png" alt="login" class="user-login"></a>';
                        }
                ?>
        </div>
</header>