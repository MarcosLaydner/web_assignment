<!-- 1900187 -->
<?php

    echo "<h3 class='title'>User reviews</h3>";
    foreach($reviews as $entry) {
        echo    "<div class='card review-card'>
                    <div class='card-body'>
                        <h4>".$entry['title']."</h4>
                        <p>".$entry['review']."<p>
                        <p>Rating: ".$entry['rating']."</p>
                    </div>
                </div>";
    }

?>