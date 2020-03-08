<!-- 1900187 -->
<?php
    include('scripts/database.php'); 
    $link = connect();

    if (isset($_GET['search']) ) {
        $games = get_games_filtered($link, $_GET['search']);
    } else {
        $games = get_games($link);
    }

    $link->close();

    if (sizeof($games) > 0) {
        echo "<div class='row'>";

        foreach ($games as $game => $data) {

            echo " <div class='col-sm-3 main-cards'> <div class='card h-100'>
                        <img class='card-img-top' src='".$data['image']."' alt='Card image cap'>
                        <div class='card-body'>
                            <form action='game_info.php' method='GET'>
                                <input type='hidden' name='game_id' value=\"". $data['id'] ."\">
                                <input class='game-redirect' type='submit' value=\"".$data['title']."\">
                            </form>
                            <h6>".$data['genre']."</h6>
                            <p>Rating: ".$data['rating']."</p>
                        </div>
                    </div> </div>";
        }
        echo "</div>";
    } else {
        echo "<h4 class='warning'>No game matched your search</h4>";
    }
?>