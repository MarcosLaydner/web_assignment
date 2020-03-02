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

            echo " <div class='col-sm-3'> <div class='card'>
                        <img class='card-img-top' src='".$data['image']."' alt='Card image cap'>
                        <div class='card-body'>
                            <h5>".$data['title']."</h5>
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