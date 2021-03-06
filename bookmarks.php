<!-- 1900187 -->
<?php session_start(); ?>
<html>
    <header>
        
        <title>Your Bookmarks</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </header>
    <body>
    <?php include('components/navbar.php');?>
    <?php include('scripts/database.php');?>

    <?php
        if (!isset($_SESSION['user'])) {
            header('location: login.php');
        }

        $link = connect();

        $bookmarks = get_bookmarks($link, $_SESSION['user']['id']);

        if (sizeof($bookmarks) > 0) {
            include('scripts/bookmarks_process.php');
            echo "<div class='row'>";
    
            foreach ($bookmarks as $bookmark => $data) {
    
                echo " <div class='col-sm-12 bookmark '> <div class='card bookmark'>
                            <img class='card-img-top' src='".$data['image']."' alt='Card image cap'>
                            <div class='card-body bkmk-card'>
                                <form action='game_info.php' method='GET'>
                                    <input type='hidden' name='game_id' value=\"". $data['id'] ."\">
                                    <input class='game-redirect bkmk' type='submit' value=\"".$data['title']."\">
                                </form>
                                <h6>".$data['genre']."</h6>
                                <p>Rating: ".$data['rating']."</p>
                                <form class='removeBookmark' method='POST'>
                                    <input type='hidden' name='removed_game_id' value='".$data['id']."'>
                                    <input type='submit' class='btn btn-danger removeBookmark' value='Remove Bookmark'/>
                                </form>
                            </div>
                            
                        </div> </div>";
            }
            echo "</div>";
        } else {
            echo "<h4 class='warning'>You have no bookmarks yet. 
            Look at our <a href='index.php'>catalogue</a> and find a game that you like!</h4>";
        }
        $link->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>