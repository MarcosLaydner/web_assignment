<!-- 1900187 -->
<?php
    
    if (isset($_POST['removed_game_id'])) {

        if (!delete_bookmark($link, $_POST['removed_game_id'], $_SESSION['user']['id'])){
            
            echo "There was a problem deleting the bookmark";
        } 
        
        header("Refresh:0");
    } elseif (isset($_POST['added_game_id'])) {
        if (!add_bookmark($link, $_POST['added_game_id'], $_SESSION['user']['id'])){
            
            echo "There was a problem adding the bookmark";
        } 
    }

?>