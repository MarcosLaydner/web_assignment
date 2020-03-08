<!-- 1900187 -->
<?php session_start(); ?>
<html>
    <header>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="scripts/utils.js"></script>

        <?php
            include('scripts/database.php');
            $link = connect();
            $game = get_game($link, $_GET['game_id']);
            
            echo "<title>".$game['title']."</title";
        ?>
    </header>
    <body>
    <?php include('components/navbar.php'); ?>


    <?php
        include('scripts/utils.php');
        include('components/info_card.php');
        
        $reviews = get_reviews($link, $game['id']);
        
        if (isset($_SESSION['user'])) {
            $user_review_id = find_review($reviews, $_SESSION['user']['id']);
        } else {
            $user_review_id = -1;
        }
    
        $link->close();
        include('components/review_form.php');

        if (sizeof($reviews) > 0) {
            echo "<div class='review-list'>";
            if ($user_review_id > -1) {
                $review = $reviews[$user_review_id];
                array_splice($reviews, $user_review_id, $user_review_id);
                
                include('components/user_review.php');
                
            } else {
                echo "<script> resetForm($('.show-form'))</script>";

            }
            include('components/review_list.php');
            echo "</div>";
        } else {
            echo "<h4 class='warning'>There aren't any reviews for this game yet. Be the first!</h4>";
            echo "<script> resetForm($('.show-form'))</script>";
        }
    ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>