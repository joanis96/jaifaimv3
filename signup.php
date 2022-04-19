<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-store,max-age=0" />
    <title>Jaifaim, s'inscrire </title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>

    <div id="container">
        <div class="sign-in-form">
            <h1>Bienvenue sur Jaifaim</h1>

            <h2>Inscrivez-vous !</h2>
            <br />

            <fieldset class="sign-up-form-1">
                <form method="post" action="signup_form.php" enctype="multipart/form-data">
                    <table cellpadding="5" cellspacing="5">
                    <tr>
                        <td colspan="2" style="color: red;">* Veuillez remplir tous les champs svp. *</td>
                    </tr>
                        <tr>
                            <td><label>Prénom</label></td>
                            <td><label>Nom</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="firstname" placeholder="Votre prénom..." class="form-1" title="Écrivez votre prénom" required /></td>
                            <td><input type="text" name="lastname" placeholder="Votre nom..." class="form-1" title="Écrivez votre nom" required /></td>
                        </tr>
                        <tr>
                            <td><label>Nom d'utilisateur</label></td>
                            <td><label>Réécrire nom d'utilisateur</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="username" placeholder="surnom..." class="form-1" title="Écrivez votre surnom" required /></td>
                            <td><input type="text" name="username2" placeholder="surnom..." class="form-1" title="Réécrire votre surnom" required /></td>
                        </tr>
                        
                    </table>
            </fieldset>

            <br />

            <fieldset class="sign-up-form-1">
                <legend>Infos croustillantes</legend>
                <table cellpadding="5" cellspacing="5">
                    <tr>
                        <td><label>Date d'anniversaire</label></td>
                        <td>
                            <select name=day style="font-size:18px;" required>
                                <?php

                                $day = 1;
                                while ($day <= 31) {
                                    echo "<option> $day
					                    </option>";
                                    $day++;
                                }
                                ?>
                            </select>
                            <select name=month style="font-size:18px;" required>
                                <option>Janvier</option>
                                <option>Février</option>
                                <option>Mars</option>
                                <option>Avril</option>
                                <option>Mai</option>
                                <option>Juin</option>
                                <option>Juillet</option>
                                <option>Août</option>
                                <option>Septembre</option>
                                <option>Octobre</option>
                                <option>Novembre</option>
                                <option>Décembre</option>
                            </select>
                            <select name=year style="font-size:18px;" required>
                                <?php
                                $year = 1901;
                                while ($year <= 2014) {
                                    echo "<option> $year
					                    </option>";
                                    $year++;
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Genre</label></td>
                        <td>
                            <label>Homme</label><input type="radio" name="gender" value="male" required />
                            <label>Femme</label><input type="radio" name="gender" value="female" required />
                            <label>X</label><input type="radio" name="gender" value="nongender" required />
                            <label>Garçon</label><input type="radio" name="gender" value="boy" required />
                            <label>Fille</label><input type="radio" name="gender" value="girl" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label>Numéro de téléphone</label></td>
                        <td><input type="text" name="number" placeholder="450....." maxlength="13" class="form-1" title="Entrez votre numéro de téléphone" required /></td>
                    </tr>
                </table>
            </fieldset>

            <br />

            <fieldset class="sign-up-form-1">
                <legend>Informations de connexion</legend>
                <table cellpadding="5" cellspacing="5">
                    <tr>
                        <td><label>Votre adresse courriel</label></td>
                        <td><label>Confirmez votre adresse courriel</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" placeholder="jaifaim@jaifaim.com" class="form-1" title="Écrivez votre adresse courriel" required /></td>
                        <td><input type="text" name="email2" class="form-1" title="Confirmez votre adresse courriel" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2">N-B: personne ne verra votre adresse courriel.</td>
                    </tr>
                    <tr>
                        <td><label>Mot de passe</label></td>
                        <td><label>Répétez le mot de passe</label></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" placeholder="**********" class="form-1" title="Écrivez votre mot de passe" required /></td>
                        <td><input type="password" name="password2" class="form-1" title="Confirmez votre mot de passe" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2">N-B: personne ne peut voir votre mot de passe.</td>
                    </tr>
                </table>
            </fieldset>

            <br />

            <strong>J'ai lu et j'accepte les conditions d'utilisation sur Jaifaim et je rejoins la communauté. <a href="#">Jaifaim conditions d'utilisation</a></strong>

            <br />
            <br />
            <input type="submit" name="submit" value="S'inscrire" class="btn-sign-in" title="S'enregistrer" />
            </form>

        </div>
    </div>

</body>

</html>