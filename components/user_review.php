<!-- 1900187 -->
<?php

    echo    "<div class='your-review'> 
                <h3 class='title'>Your review</h3>
                <div class='card review-card'>
                    <div class='card-body bkmk-card'>
                        <h4 id='review_title'>".$review['title']."</h4>
                        <p id='review_review'>".$review['review']."<p>
                        <p >Rating: <span id='review_rating'>".$review['rating']."</span></p>
                        <input type='submit' id='edit' name='edit' class='btn btn-primary removeBookmark' value='Edit review'/>
                    </div>
                </div> 
            </div>";

?>