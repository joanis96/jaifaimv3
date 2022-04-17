<!DOCTYPE html>
<html>

<head>
    <title>Jaifaim, photos, collection</title>
    <link rel="stylesheet" type="text/css" href="css/photos.css">
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
                <li><a href="profile.php" title="Profile"><label>Profil</label></a></li>
                <li><a href="photos.php" title="Settings"><label class="active">Photos</label></a></li>
                <li><a href="logout.php" title="se déconnecter"><button class="btn-sign-in" value="Log out">Quitter</button></a></li>
            </ul>
        </div>
    </div>

    <div id="container">

        <div id="left-nav">

            <div class="clip1">
                <a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $row['profile_picture'] ?>"></a>
            </div>

            <div class="user-details">
                <h3><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></h3>
                <h2><?php echo $username ?></h2>
            </div>

            <?php
            include("includes/database.php");
            $query = mySQLi_query($con, "SELECT * from user where user_id='$id' order by user_id DESC");
            while ($row = mySQLi_fetch_array($query)) {
                $id = $row['user_id'];
            ?>

                <div id="left-nav1">

                    <h2>Infos personnels</h2>
                    <table>
                        <tr>
                            <td><label>Nom d'utilisateur</label></td>
                            <td width="20"></td>
                            <td><b><?php echo $row['username']; ?></b></td>
                        </tr>
                        <tr>
                            <td><label>Date de naissance</label></td>
                            <td width="20"></td>
                            <td><b><?php echo $row['birthday']; ?></b></td>
                        </tr>
                        <tr>
                            <td><label>Genre</label></td>
                            <td width="20"></td>
                            <td><b><?php echo $row['gender']; ?></b></td>
                        </tr>
                        <tr>
                            <td><label>Me joindre</label></td>
                            <td width="20"></td>
                            <td><b><?php echo $row['number']; ?></b></td>
                        </tr>
                        <tr>
                            <td><label>Courriel</label></td>
                            <td width="20"></td>
                            <td><b><?php echo $row['email']; ?></b></td>
                        </tr>
                        <tr>
                            <td><label>Image</label></td>
                            <td width="20"></td>
                            <td><img src="<?php echo $row['profile_picture']; ?>"></td>
                        </tr>
                    </table>
                <?php
            }
                ?>
                </div>

        </div>

        <div id="right-nav">
            <h1>Mes Photos</h1>
            <div>
                <form method="post" action="add_photo.php" enctype="multipart/form-data">
                    <input type="file" name="image">
                    <button class="btn-submit-photo" name="Submit" value="Log out">Ajouter photo</button>
                </form>
                <hr />
            </div>


            <?php
            include("includes/database.php");
            $query = mySQLi_query($con, "SELECT * from photos where user_id='$id' ");
            while ($row = mySQLi_fetch_array($query)) {
                $id = $row['photo_id'];
            ?>

                <div class="photo-select">
                    <center>
                        <img src="<?php echo $row['location']; ?>">
                        <hr>
                        <a href="delete_photos.php<?php echo '?id=' . $id; ?>" class="btn-delete-photos">Supprimer</a>
                    </center>
                </div>

            <?php
            }
            ?>
        </div>


    </div>

</body>

</html>