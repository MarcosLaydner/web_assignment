<!-- 1900187 -->
<?php
// Provided by Joseph Walton-Rivers for ce154

/**
 * This script is used for connecting to databases
 */

// there are oo and procdural interfaces, we're using the OO interface.
// oh yeah... PHP supports classes.

// could use seperate variables here to.
$db = array();

// CHANGE THESE TO MATCH YOUR SETUP!
$db['host'] = "localhost";
$db['user'] = "root";
$db['pass'] = "root";
$db['name'] = "ce154_ms19238";

/**
 * Function to connect to the database
 */
function connect(){
    global $db;
    $link = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
    if  ($link->connect_errno) {
        die("Failed to connect to MySQL: " . $link->connect_error);
    }

    return $link;
}

function get_games($link) {
    $records = array();

    $results = $link->query("SELECT games.id id, games.title title, games.image image, genres.title genre, 
    games.rating rating  from games JOIN genres ON games.genre = genres.id ORDER BY games.id");

    // didn't work? return no results
    if ( !$results ) {
        return $records;
    }

    while ( $row = $results->fetch_assoc() ) {
        $records[] = $row;
    }
    
    return $records;
}

function get_user($link, $uname) {

    $stmt = $link->prepare("select * from users where uname = ?");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $bind = $stmt->bind_param("s", $uname);
    if ( !$bind ) {
        die("could not bind params: " . $stmt->error);
    }

    if ( !$stmt->execute() ) {
        die("couldn't execute statement");
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    return $user;
}

function get_game($link, $game) {

    $stmt = $link->prepare("SELECT games.id id, games.title title, games.image image, 
    genres.title genre, games.rating rating  from games JOIN genres ON games.genre = genres.id 
    WHERE games.id = ?");

    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $bind = $stmt->bind_param("i", $game);
    if ( !$bind ) {
        die("could not bind params: " . $stmt->error);
    }

    if ( !$stmt->execute() ) {
        die("couldn't execute statement");
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    return $user;
}

function get_reviews($link, $game) {

    $stmt = $link->prepare("select * from reviews where game_id = ?");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $bind = $stmt->bind_param("s", $game);
    if ( !$bind ) {
        die("could not bind params: " . $stmt->error);
    }

    if ( !$stmt->execute() ) {
        die("couldn't execute statement");
    }

    $result = $stmt->get_result();
    while ( $row = $result->fetch_assoc() ) {
        $reviews[] = $row;
    }

    if (isset($reviews)) {
        return $reviews;
    } else {
        return array();
    }
}

function get_games_filtered($link, $filter) {

    $stmt = $link->prepare("SELECT games.id id, games.title title, games.image image, 
    genres.title genre, games.rating rating  from games JOIN genres ON games.genre = genres.id 
    WHERE games.title LIKE ? OR games.genre LIKE ? OR genres.title LIKE ? ORDER BY games.id");

    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $filter = "%" . $filter . "%";

    $bind = $stmt->bind_param("sss", $filter, $filter, $filter);
    if ( !$bind ) {
        die("could not bind params: " . $stmt->error);
    }

    if ( !$stmt->execute() ) {
        die("couldn't execute statement");
    }

    $result = $stmt->get_result();
    while ( $row = $result->fetch_assoc() ) {
        $games[] = $row;
    }

    if (isset($games)) {
        return $games;
    } else {
        return array();
    }
}

function game_is_bookmarked($link, $game_id, $user_id){
    $stmt = $link->prepare("SELECT * from bookmarks where game_id = ? AND user_id = ?");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $bind = $stmt->bind_param("ii", $game_id, $user_id);
    if ( !$bind ) {
        die("could not bind params: " . $stmt->error);
    }

    if ( !$stmt->execute() ) {
        die("couldn't execute statement");
    }

    $result = $stmt->get_result();
    while ( $row = $result->fetch_assoc() ) {
        $reviews[] = $row;
    }

    if (isset($reviews)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function get_bookmarks($link, $user_id) {

    $results = $link->query("SELECT games.id id, games.title title, games.image image, 
    genres.title genre, games.rating rating FROM games JOIN genres ON games.genre = genres.id 
    JOIN bookmarks ON 
    games.id = bookmarks.game_id WHERE user_id = ". $user_id. ";");

    if ( !$results ) {
        return array();
    }

    while ( $row = $results->fetch_assoc() ) {
        $bookmarks[] = $row;
    }
    
    if (isset($bookmarks)) {
        return $bookmarks;
    } else {
        return array();
    }
}

function add_bookmark($link, $game_id, $user_id) {

    $stmt = $link->prepare("insert into bookmarks values (?,?)");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $result = $stmt->bind_param("si", $user_id, $game_id);
    if ( !$result ) {
        die("could not bind params: " . $stmt->error);
    }

    if ($stmt->execute()){
        return true;
    } else {
        die("Deu ruim: " . $stmt->error);
    }
        
}

function delete_bookmark($link, $game_id, $user_id) {

    return $link->query("DELETE FROM bookmarks WHERE game_id = ". $game_id . " AND user_id = ". $user_id. ";");
}

function post_review($link, $user_id, $game_id, $title, $rating, $review) {

    $stmt = $link->prepare("insert into reviews values (NULL,?,?,?,?,?)");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $result = $stmt->bind_param("iiiss", $user_id, $game_id, $rating, $title, $review);
    if ( !$result ) {
        die("could not bind params: " . $stmt->error);
    }

    if ($stmt->execute()){
        return true;
    } else {
        die("Deu ruim: " . $stmt->error);
    }  
}

function edit_review($link, $user_id, $game_id, $title, $rating, $review) {

    $stmt = $link->prepare("UPDATE reviews SET title = ?, rating = ?, review = ? WHERE game_id = ? AND user_id = ?");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $result = $stmt->bind_param("sisii", $title, $rating, $review, $game_id, $user_id);
    if ( !$result ) {
        die("could not bind params: " . $stmt->error);
    }

    if ($stmt->execute()){
        return true;
    } else {
        die("Deu ruim: " . $stmt->error);
    }
        
}

function create_game($link, $title, $image, $genre, $rating) {

    $stmt = $link->prepare("insert into games values (NULL,?,?,?,?)");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    $result = $stmt->bind_param("sssi", $title, $image, $genre, $rating);
    if ( !$result ) {
        die("could not bind params: " . $stmt->error);
    }

    if ($stmt->execute()){
        return true;
    } else {
        die("Deu ruim: " . $stmt->error);
    }
        
}

