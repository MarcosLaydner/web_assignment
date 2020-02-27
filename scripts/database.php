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
$db['host'] = "cseemyweb.essex.ac.uk";
$db['user'] = "ms19238";
$db['pass'] = "secret";
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

    $results = $link->query("SELECT * FROM games");

    // didn't work? return no results
    if ( !$results ) {
        return records;
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

    $stmt = $link->prepare("select * from games where tile = ?");
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
    $user = $result->fetch_assoc();

    return $user;
}


function save_message($link, $data) {
    // prepared statemenets = no sql injection \o/

    // first we create the statement
    $stmt = $link->prepare("insert into message(name, email, reason, message) values (?,?,?,?)");
    if ( !$stmt ) {
        die("could not prepare statement: " . $link->errno . ", error: " . $link->error);
    }

    // then we bind the parameters
    // s = string, i = integer
    $result = $stmt->bind_param("ssis", $data['name'], $data['email'], $data['reason'], $data['message']);
    if ( !$result ) {
        die("could not bind params: " . $stmt->error);
    }

    // finally, execute
    if ( !$stmt->execute() ) {
        die("couldn't execute statement");
    }

    // you can also alter data and call execute again to send another message...
}
