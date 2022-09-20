<!DOCTYPE html>
<html lang="en">

<head>
    <title>Configuration d'un colis</title>
    <link rel="stylesheet" href="configurationColis.css">
    <link rel="stylesheet" href="../style.css">
    <?php require("../php/head.php") ?>
</head>

<body>
    <?php require("../php/header.php") ?>
    <div class="form-container">
        <form action="" id="configuration-form">
            <div class="form-title">Configuration de colis</div>
            <div class="configuration-container">
                <select name="arduino" id="arduino">
                    <option value="Arduino">Arduino</option>
                </select>
            </div>
            <div class="configuration-container">
                <label for="tracking-number">Numéro de colis</label>
                <input name="tracking-number" type="text" id="tracking-number" required>
            </div>
            <div class="configuration-container">
                <div class="temperature-title">Plage des températures
                </div>
                <div class="temperature-container">
                    <div class="temperature">
                        <input name="min-temp" type="text" id="min-temp" placeholder="Min." required>
                    </div>
                    <div class="temperature">
                        <input name="max-temp" type="text" id="max-temp" placeholder="Max." required>
                    </div>
                </div>
            </div>
            <div class="configuration-container">
                <label for="departure">Point de départ</label>
                <input name="departure" type="text" id="departure" required>
            </div>
            <button type="submit">Confirmer</button>
        </form>
    </div>
    <?php require("../php/footer.php") ?>
</body>

</html>