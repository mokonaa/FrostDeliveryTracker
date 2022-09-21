
        <div class="form-container">
            <img class="connexion-logo" src="./img/logo.png" alt="logo">
            <form action="" id="connexion-form">
            <img src="./img/arrow-left-short.svg" width="32" alt="retour en arrière" id="login-button-return" onclick="window.history.go(-1); return false;">
                    
                <div class="form-title">Connexion</div>
                <div class="connexion-container">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" id="identifiant" autocomplete="off" required>
                </div> 
                <div class="connexion-container">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" autocomplete="off" required>
                </div>
                <button type="submit">Se connecter</button>
                <div class="information">
                    <p>Vous n'êtes pas client ?</p>
                    <a href="#">Accéder à nos offres</a>
                </div>
                </div>
            </form>
        </div>