<?php

    function find_review($reviews, $user_id) {

        $index = 0;

        foreach($reviews as $review) {
            if ($review['user_id'] == $user_id) {
                return $index;
            } else {
                $index++;
            }
        }
        return -1;
    }
?>