<?php

    if (isset($_POST['removed_game_id'])) {
        $link = connect();

        if (!delete_bookmark($link, $_POST['removed_game_id'], $_SESSION['user']['id'])){
            
            echo "There was a problem deleting the bookmark";
        } 
        $link->close();
    } elseif (isset($_POST['added_game_id'])) {

    }

?>