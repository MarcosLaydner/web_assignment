<?php
    include('scripts/database.php');

    if (isset($_POST['title']) ||  isset($_POST['image']) ||  isset($_POST['rating'])) {

        if (isset($_POST['title']) &&  isset($_POST['image']) &&  isset($_POST['rating'])) {

            $link = connect();

            if (ctype_digit($_POST['rating'])) {
                $_POST['rating'] = (int)$_POST['rating'];
            } else {
                echo "<h6 class='form'>Rating must be a number</h6>";
            }
            
            if (create_game($link, $_POST['title'], $_POST['image'], $_POST['genre'], $_POST['rating'])) {
                header('location: index.php');
            } else {
                echo "<h6 class='form'>Error creating game</h4>";
                echo var_dump($_POST['genre']);
            }

            $link->close();
        } else {
            echo "<h6 class='form'>Please fill all the fields</h4>";
        }
    }
?>