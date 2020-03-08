<!-- 1900187 -->

<?php 

    if (isset($_SESSION['user'])){

        echo    "<form id='review_form' class='form show-form' method='POST'>
                    <div class='form-row'>
                        <div class='form-group col-md-10'>
                            <label for='title'>Title</label>
                            <input id='form_title' name='title' type='text' class='form-control' placeholder='Enter title' required>
                        </div>
                        <div class='form-group col-md-2'>
                            <label for='rating'>Rating</label>
                            <input id='form_rating' name='rating' type='number' max='100' class='form-control' placeholder='Enter rating' required>
                        </div>
                        <div class='form-group col-md-12'>
                            <label for='rating'>Review</label>
                            <textarea id='form_review' name='review' class='form-control' placeholder='Write your review' required></textarea>
                        </div>
                    </div>
                    <input id='is_edit' type='hidden' name='edit'>
                    <input type='hidden' name='game_id' value='".$game['id']."'>
                    <input type='hidden' name='user_id' value='".$_SESSION['user']['id']."'>
                    <input type='submit' class='btn btn-primary' value='Submit'>
                    <input type='button' id='cancel' class='btn btn-danger' value='Cancel'>
                </form>";
    } else {
        echo "<h6 class='warning'>You must login to post reviews</h6>";
    }
    include('scripts/review_process.php');
?>