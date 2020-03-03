<?php session_start(); ?>
<html>
    <header>
        <title>Create Game</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </header>
    <body>
    <?php include('components/navbar.php'); ?>

    <form class='form' method='POST'>
        <div class="form-group">
            <label for="title">Title</label>
            <input name='title' type="text" class="form-control" placeholder="Enter title" required>
        </div>
        <div class="form-group">
            <label for="image">Image url</label>
            <input name='image' type="text" class="form-control" placeholder="Enter image url" required>
        </div>
        <div class="form-group">
            <label for="genre">State</label>
            <select name="genre" class="form-control">
                <option>rpg</option>
                <option>sim</option>
                <option>str</option>
                <option>fps</option>
                <option>???</option>
            </select>
        </div>
        <div class="form-group">
            <label for="rating">Metacritic Score</label>
            <input name='rating' type="number" class="form-control" placeholder="Enter Metacritic Score" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Submit">
    </form>

    <?php include('scripts/create_game_process.php'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>