<?php
require('includes/database.php');
$id = $_REQUEST['user_id'];

$result = mysqli_query($con, "SELECT * FROM user WHERE user_id  = '$id' ");
$test = mysqli_fetch_array($result);
if (!$result) {
    die("Error: Data not found..");
}
$firstname = $test['firstname'];
$lastname = $test['lastname'];
$username = $test['username'];
$birthday = $test['birthday'];
$gender = $test['gender'];
$number = $test['number'];

if (isset($_POST['save'])) {
    $first_save = $_POST['firstname'];
    $last_save = $_POST['lastname'];
    $username_save = $_POST['username'];
    $birthday_save = $_POST['birthday'];
    $gender_save = $_POST['gender'];
    $number_save = $_POST['number'];

    mysqli_query($con, "UPDATE user SET firstname ='$first_save', lastname ='$last_save', username ='$username_save', 
	birthday ='$birthday_save' , gender ='$gender_save', number ='$number_save' WHERE user_id = '$id'");
    echo "Saved!";

    header("Location: profile.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-store,max-age=0" />
    <title>Jaifaim, mettre à jour le profil</title>
    <link rel="stylesheet" type="text/css" href="css/edit_profile.css">
</head>

<body>
    <?php include('session.php'); ?>

    <div id="header">
        <div class="head-view">
            <ul>
                <li><a href="home.php" title="Jaifaim"><b>Jaifaim</b></a></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li><a href="#" title="<?php echo $username ?>"><label><?php echo $username ?></label></a></li>
                <li><a href="home.php" title="Home"><label>Page principale</label></a></li>
                <li><a href="profile.php" title="Profile"><label class="active">Profil</label></a></li>
                <li><a href="logout.php" title="Se déconnecter"><button class="btn-sign-in" value="Log out">Quitter</button></a></li>
            </ul>
        </div>
    </div>

    <div id="container">

        <div id="left-nav">

            <div class="clip1">
                <a href="updatephoto.php" title="Changer l'image de profil"><img src="<?php echo $row['profile_picture'] ?>"></a>
            </div>

            <div class="user-details">
                <h2><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></h2>
            </div>
        </div>



        <div id="right-nav">
            <h1>Changer votre nom...</h1>

            <div id="left-nav1">

                <fieldset>
                    <table cellpadding="5" cellspacing="5">

                        <form method="post">
                            <tr>
                                <td><label>Prénom</label></td>
                                <td><label>Nom</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="Vous êtes ..." class="form-1" title="écrire votre prénom" required /></td>
                                <td><input type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="Vous êtes ..." class="form-1" title="écrire votre nom" required /></td>
                            </tr>
                            <tr>
                                <td><label>Nom d'utilisateur</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="username" value="<?php echo $username; ?>" placeholder="Écrire un surnom..." class="form-1" title="Écrire votre nom d'utilisateur" required /></td>
                            </tr>
                    </table>
                </fieldset>
                <br />
                <fieldset>
                    <legend>
                        <h1>Infos croustillantes</h1>
                    </legend>
                    <table cellpadding="5" cellspacing="5">
                        <tr>
                            <td><label>Date d'anniversaire</label></td>
                            <td><input type="date" name="birthday" value="<?php echo $birthday; ?>" class="form-1" title="Sélectionnez votre date..." required /></td>

                        </tr>
                        <tr>
                            <td><label>Genre</label></td>
                            <td>
                                <select name="gender" class="form-1" value="<?php echo $gender; ?>">
                                    <option></option>
                                    <option>Homme</option>
                                    <option>Femme</option>
                                    <option>X</option>
                                    <option>Garçon</option>
                                    <option>Fille</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Numéro de téléphone</label></td>
                            <td><input type="text" name="number" value="<?php echo $number; ?>" placeholder="551 233 2254" maxlength="13" class="form-1" title="Entrez votre numéro de téléphone" required /></td>
                        </tr>
                    </table>
                </fieldset>
                <br />
                <button type="submit" name="save" class="">Valider</button>


            </div>

        </div>




    </div>

</body>

</html>