<!-- 1900187 -->

<?php

    echo    "<div class='card'>
                <img class='card-img-top' src='".$game['image']."' alt='Card image cap'>
                <div class='card-body'>
                    <h4>".$game['title']."</h4>
                    <h6>".$game['genre']."</h6>
                    <p>Rating: ".$game['rating']."</p>";

    if (isset($_SESSION['user'])) {
    include('scripts/bookmarks_process.php');

    if (game_is_bookmarked($link, $game['id'], $_SESSION['user']['id'])){
    echo    "<form method='POST'>
                <input type='hidden' name='removed_game_id' value='".$game['id']."'>
                <input type='submit' class='btn btn-danger' value='Remove Bookmark'/>
            </form>";

    } else {
    echo    "<form method='POST'>
                <input type='hidden' name='added_game_id' value='".$game['id']."'>
                <input type='submit' class='btn btn-primary' value='Add Bookmark'/>
            </form>";
    }
    }
        
    echo "</div></div>";


?>