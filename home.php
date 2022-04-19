<?php
function time_stamp($session_time)
{

    $time_difference = time() - $session_time;
    $seconds = $time_difference;
    $minutes = round($time_difference / 60);
    $hours = round($time_difference / 3600);
    $days = round($time_difference / 86400);
    $weeks = round($time_difference / 604800);
    $months = round($time_difference / 2419200);
    $years = round($time_difference / 29030400);

    if ($seconds <= 60) {
        echo "il y a $seconds secondes";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            echo "il y a une minute";
        } else {
            echo "il y a $minutes minutes";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            echo "il y a une heure";
        } else {
            echo "il y a $hours heures";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            echo "il y a un jour";
        } else {
            echo "il y a $days jours";
        }
    } else if ($weeks <= 4) {
        if ($weeks == 1) {
            echo "il y a une semaine";
        } else {
            echo "il y a $weeks semaines";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            echo "il y a un mois";
        } else {
            echo "il y a $months mois";
        }
    } else {
        if ($years == 1) {
            echo "il y a un an";
        } else {
            echo "il y a $years ans";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-store,max-age=0" />
    <title>Jaifaim, partage cuisine, recettes</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
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
                <li><a href="home.php" title="Home"><label class="active">Page principale</label></a></li>
                <li><a href="profile.php" title="Profil"><label>Profil</label></a></li>
                <li><a href="logout.php" title="Se déconnecter"><button class="btn-sign-in" value="Log out">Quitter</button></a></li>
            </ul>
        </div>
    </div>

    <div id="container">

        <div id="left-nav">

            <div class="clip1">

                <a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $row['profile_picture'] ?>"></a>
            </div>

            <div class="user-details">
                <h2><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></h2>
            </div>
        </div>



        <div id="right-nav">
            <h1>Partagez vos trouvailles, trésors, fiertés !</h1>
            <div>
                <form method="post" action="post.php" enctype="multipart/form-data">
                    <textarea placeholder="Recettes, photos, fiertés? Joindre une image avec votre publication." name="content" class="post-text" required></textarea>
                    <input type="file" name="image">
                    <button class="btn-share" name="Submit" value="Log out">Publier</button>
                </form>
            </div>

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
                        <td><label>Nom d'utilisateur :</label></td>
                        <td width="20"></td>
                        <td><b><?php echo $row['username']; ?></b></td>
                    </tr>
                    <tr>
                        <td><label>Date d'anniversaire:</label></td>
                        <td width="20"></td>
                        <td><b><?php echo $row['birthday']; ?></b></td>
                    </tr>
                    <tr>
                        <td><label>Genre :</label></td>
                        <td width="20"></td>
                        <td><b><?php echo $row['gender']; ?></b></td>
                    </tr>
                    <tr>
                        <td><label>Me joindre :</label></td>
                        <td width="20"></td>
                        <td><b><?php echo $row['number']; ?></b></td>
                    </tr>
                    <tr>
                        <td><label>Courriel :</label></td>
                        <td width="20"></td>
                        <td><b><?php echo $row['email']; ?></b></td>
                    </tr>
                    <tr>
                        <td><label>Image</label></td>
                        <td width="20"></td>
                        <td><img src="<?php echo $row['profile_picture']; ?>"></td>
                    </tr>
                </table>
            </div>
        <?php
        }
        ?>


        <?php
        include("includes/database.php");
        $query = mySQLi_query($con, "SELECT * from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC");
        while ($row = mySQLi_fetch_array($query)) {
            $posted_by = $row['firstname'] . " " . $row['lastname'];
            $location = $row['post_image'];
            $profile_picture = $row['profile_picture'];
            $content = $row['content'];
            $post_id = $row['post_id'];
            $time = $row['created'];
        ?>
            <div id="right-nav1">
                <div class="profile-pics">
                    <img src="<?php echo $profile_picture ?>">
                    <b><?php echo $posted_by ?></b>
                    <strong><?php echo $time = time_stamp($time); ?></strong>
                </div>
                <br />
                <div class="post-content">
                    <div class="delete-post">
                        <a href="delete_post.php<?php echo '?id=' . $post_id; ?>" title="Supprimer votre publication"><button class="btn-delete">X</button></a>
                    </div>
                    <p><?php echo $row['content']; ?></p>
                    <center>
                        <img src="<?php echo $location ?>">
                    </center>
                </div>

                <?php
                include("includes/database.php");
                $comment = mySQLi_query($con, "SELECT * from comments where post_id='$post_id' order by post_id DESC");
                while ($row = mySQLi_fetch_array($comment)) {
                    $comment_id = $row['comment_id'];
                    $content_comment = $row['content_comment'];
                    $time = $row['created'];
                    $post_id = $row['post_id'];
                    $user = $_SESSION['id'];

                ?>
                    <div class="comment-display" <?php echo $comment_id ?>>
                        <div class="delete-post">
                            <a href="delete_comment.php<?php echo '?id=' . $comment_id; ?>" title="Supprimer le commentaire"><button class="btn-delete">X</button></a>
                        </div>
                        <div class="user-comment-name"><img src="<?php echo $row['image']; ?>">&nbsp;&nbsp;&nbsp;<?php echo $row['name']; ?><b class="time-comment"><?php echo $time = time_stamp($time); ?></b></div>
                        <div class="comment"><?php echo $row['content_comment']; ?></div>

                    </div>
                    <br />

                <?php
                }
                ?>


                <form method="POST" action="comment.php">
                    <div class="comment-area">

                        <?php $image = mysqli_query($con, "select * from user where user_id='$id'");
                        while ($row = mysqli_fetch_array($image)) {


                        ?>
                            <img src="<?php echo $row['profile_picture']; ?>" width="50" height="50">
                        <?php } ?>

                        <input type="text" name="content_comment" placeholder="Commenter..." class="comment-text">
                        <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                        <input type="hidden" name="user_id" value="<?php echo $firstname . ' ' . $lastname  ?>">
                        <input type="hidden" name="image" value="<?php echo $profile_picture  ?>">
                        <input type="submit" name="post_comment" value="Publier" class="btn-comment">

                    </div>
                </form>


            </div>
        <?php
        }
        ?>


    </div>

</body>

</html>