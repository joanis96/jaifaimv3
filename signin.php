<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jai faim, se connecter </title>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>

<body>

    <div id="container">
        <div class="sign-in-form">
            <table>
                <h1>Bienvenue sur Jaifaim</h1>
                <h2>Se connecter</h2>
                <form method="post" action="signin_form.php" enctype="multipart/form-data">
                    <tr>
                        <td><label>Courriel</label></td>
                        <td><input type="email" name="email" placeholder="jaifaim@jaifaim.com" class="form-1" title="Écrivez votre adresse courriel" required /></td>
                    </tr>
                    <tr>
                        <td><label>Mot de passe</label></td>
                        <td><input type="password" name="password" placeholder="*********" class="form-1" title="Écrivez votre mot de passe" required /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Connexion" class="btn-sign-in" title="Se connecter" />
                            <input type="reset" name="cancel" value="Effacer" class="btn-cancel" title="Annuler précédentes entrées au clavier" />
                        </td>
                    </tr>
                </form>
            </table>

        </div>
    </div>


    

</body>

</html>