<?php

    if (isset($_POST['title']) ||  isset($_POST['review']) ||  isset($_POST['rating'])) {

        if (isset($_POST['title']) &&  isset($_POST['review']) &&  isset($_POST['rating'])) {

            $link = connect();

            if (ctype_digit($_POST['rating']) && $_POST['rating'] >= 0 && $_POST['rating'] <= 100) {
                $_POST['rating'] = (int)$_POST['rating'];
            } else {
                echo "<h6 class='form'>Rating must be a number from 0 to 100</h6>";
            }
            
            if (post_review($link, $_POST['user_id'], $_POST['game_id'] ,$_POST['title'], $_POST['rating'], $_POST['review'])) {
                header("Refresh:0");
            } else {
                echo "<h6 class='form'>Error posting review</h4>";
            }

            $link->close();
        } else {
            echo "<h6 class='form'>Please fill all the fields</h4>";
        }
        
    }

?>