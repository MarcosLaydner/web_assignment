<!-- 1900187 -->
<?php

    if (isset($_POST['title']) ||  isset($_POST['review']) ||  isset($_POST['rating'])) {

        if (isset($_POST['title']) &&  isset($_POST['review']) &&  isset($_POST['rating'])) {

            $link = connect();

            $_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
            $_POST['review'] = htmlspecialchars($_POST['review'], ENT_QUOTES);

            if (ctype_digit($_POST['rating']) && $_POST['rating'] >= 0 && $_POST['rating'] <= 100) {
                $_POST['rating'] = (int)$_POST['rating'];
            } else {
                echo "<h6 class='form'>Rating must be a number from 0 to 100</h6>";
            }

            if ($_POST['edit']) {
                if (edit_review($link, $_POST['user_id'], $_POST['game_id'] ,$_POST['title'], $_POST['rating'], $_POST['review'])) {
                    header("Refresh:0");
                } else {
                    echo "<h6 class='form'>Error posting review</h4>";
                }
            } else {
                if (post_review($link, $_POST['user_id'], $_POST['game_id'] ,$_POST['title'], $_POST['rating'], $_POST['review'])) {
                    header("Refresh:0");
                } else {
                    echo "<h6 class='form'>Error posting review</h4>";
                }
            }

            unset($_SESSION['review']);
            $link->close();
        } else {
            echo "<h6 class='form'>Please fill all the fields</h4>";
        }
        
    }

?>