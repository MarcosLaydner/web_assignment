<?php session_start(); ?>

<html>
    <header>
        
        <title>OGC</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </header>
    <body>
    <?php include('components/navbar.php'); ?>
    <?php include('scripts/database.php'); ?>

    <div class="row">
            <?php
                $link = connect();
                $games = get_games($link);
        
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
                $link->close();
            ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
