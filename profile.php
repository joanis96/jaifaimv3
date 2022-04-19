<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-store,max-age=0" />
    <title>Jaifaim, profil </title>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
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
                <li><a href="timeline.php" title="<?php echo 'page de ' . $username ?>"><label><?php echo $username ?></label></a></li>
                <li><a href="home.php" title="Home"><label>Page principale</label></a></li>
                <li><a href="profile.php" title="Profile"><label class="active">Profil</label></a></li>
                <li><a href="logout.php" title="Se déconnecter"><button class="btn-sign-in" value="Log out">Quitter</button></a></li>
            </ul>
        </div>
    </div>

    <div id="container">

        <div id="left-nav">

            <div class="clip1">
                <a href="updatephoto.php" title="Changer l'image de profil."><img src="<?php echo $row['profile_picture'] ?>"><button>Changer l'image</button></a>

            </div>

            <div class="user-details">
                <h2><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></h2>
            </div>
        </div>



        <div id="right-nav">
            <h1>Qui suis-je? </h1>
            <hr />
            <br />
            <?php
            include('includes/database.php');

            $result = mysqli_query($con, "SELECT * FROM user where user_id='$id' ");

            while ($test = mysqli_fetch_array($result)) {
                $id = $test['user_id'];
                echo " <div class='info-user'>";
                echo " <div>";
                echo " <label>Prénom</label>&nbsp;&nbsp;&nbsp;<b>" . $test['firstname'] . "</b>";
                echo "</div> ";
                echo "<hr /> ";
                echo "<br /> ";
                echo " <div>";
                echo " <label>Nom</label>&nbsp;&nbsp;&nbsp;&nbsp;<b>" . $test['lastname'] . "</b>";
                echo "</div> ";
                echo "<hr /> ";
                echo "<br /> ";
                echo " <div>";
                echo " <label>Nom d'utilisateur</label>&nbsp;&nbsp;&nbsp;<b>" . $test['username'] . "</b>";
                echo "</div> ";
                echo "<hr /> ";
                echo "<br /> ";
                echo " <div>";
                echo " <label>Date anniversaire</label>&nbsp;&nbsp;<b>" . $test['birthday'] . "</b>";
                echo "</div> ";
                echo "<hr /> ";
                echo "<br /> ";
                echo " <div>";
                echo " <label>Genre</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>" . $test['gender'] . "</b>";
                echo "</div> ";
                echo "<hr /> ";
                echo "<br /> ";
                echo " <div>";
                echo " <label>Me joindre</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>" . $test['number'] . "</b>";
                echo "</div> ";
                echo "<hr /> ";
                echo "<br /> ";
                echo "</div> ";
                echo "<br /> ";
                echo " <div class='edit-info'>";
                echo " <a href ='edit_profile.php?user_id=$id'><button>Mettre à jour</button></a>";
                echo "</div> ";
                echo "<br /> ";
                echo "<br /> ";
            }
            ?>

        </div>


    </div>




    </div>

</body>

</html>