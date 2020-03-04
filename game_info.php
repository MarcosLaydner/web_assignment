<?php session_start(); ?>
<html>
    <header>
        
        <title>Original Game Catalogue</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </header>
    <body>
    <?php include('components/navbar.php'); ?>

    <?php
        include('scripts/database.php');

        $link = connect();

        $game = get_game($link, $_GET['game_id']);
        echo    "<div class='card'>
                    <img class='card-img-top' src='".$game['image']."' alt='Card image cap'>
                    <div class='card-body'>
                        <h4>".$game['title']."</h4>
                        <h6>".$game['genre']."</h6>
                        <p>Rating: ".$game['rating']."</p>
                    </div>
                </div>";

        $reviews = get_reviews($link, $_GET['game_id']);

        if (sizeof($reviews) > 0) {
            echo var_dump($reviews);
        } else {
            echo "<h4 class='warning'>There aren't any reviews for this game yet. Be the first!</h4>";
        }

        $link->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>