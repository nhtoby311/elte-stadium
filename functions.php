<?php
require('data/data.php');

function getTeamName($idteam){
    global $teams;
    return $teams[$idteam]['name'];
}

function getTeamLogo($idteam){
    global $teams;
    return $teams[$idteam]['logo'];
}

function getTeamData($idteam){
    global $teams;
    return $teams[$idteam];
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function getTeamMatches($idteam){
    global $matches;
    $filtered = array_filter($matches,fn($e) => $e['home']['id'] == $idteam || $e['away']['id'] == $idteam);
    return  $filtered;
}

function isWon($idteam,$winner){
    global $matches;
    if ($winner === -1){
        return '#ddea20';
    }
    else if ($winner != $idteam){
        return '#d44343';
    }
    else {
        return '#30c330';
    }

}

function getTeamUpComingMatches($idteam){
    global $upcoming_matches;
    $filtered = array_filter($upcoming_matches,fn($e) => $e['home']['id'] == $idteam || $e['away']['id'] == $idteam);
    return  $filtered;
}

function getFirstFive($arr){
    $newArr = array_slice($arr, 0, 5, true);
    return $newArr;
}


function getPicFromUser($username){
    global $users;
    $res = array_search($username,$users);
    if($res){
        return $users[$res]["image"];
    }
    else {
        return $res;
    }
    
}

function getNameFromUser($userid){
    global $users;
    return $users[$userid]["username"];
}

function getTopTeams(){
    global $teams;
    $arr = $teams;
    usort($arr, fn($a, $b) => $a["score"] < $b["score"]);
    return $arr;  
}
?>