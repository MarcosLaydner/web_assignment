<?php 

    if (isset($_SESSION['user'])){

        $info = array();
        $info['title'] = '';
        $info['rating'] = '';
        $info['review'] = '';

        if (isset($_POST['edit'])){
            $info['title'] = '';
            $info['rating'] = '';
            $info['review'] = '';
        }

        echo    "<form class='form' method='POST'>
                    <div class='form-row'>
                        <div class='form-group col-md-10'>
                            <label for='title'>Title</label>
                            <input name='title' type='text' class='form-control' value='".$info['title']."' placeholder='Enter title' required>
                        </div>
                        <div class='form-group col-md-2'>
                            <label for='rating'>Rating</label>
                            <input name='rating' type='number' max='100' class='form-control' placeholder='Enter rating' required>
                        </div>
                        <div class='form-group col-md-12'>
                            <label for='rating'>Review</label>
                            <textarea name='review' class='form-control' placeholder='Write your review' required></textarea>
                        </div>
                    </div>
                    <input type='hidden' name='game_id' value='".$game['id']."'>
                    <input type='hidden' name='user_id' value='".$_SESSION['user']['id']."'>
                    <input type='submit' class='btn btn-primary' value='Submit'>
                </form>";
    } else {
        echo "<h6 class='warning'>You must login to post reviews</h6>";
    }

    include('scripts/review_process.php');
?>