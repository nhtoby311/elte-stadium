<?php
    require('data/data.php');
    require('functions.php');

    $id = intval($_GET['teamid']);
    $data = getTeamData($id);
    session_start();
    include_once("userstorage.php");
    include_once("auth.php");
    include_once("helper.php");
    $errors = [];
    $commentStorage = new Storage(new JsonIO("./data/comments.json"));
    //$matchStorage = new Storage(new JsonIO("matches.json"));
    $userStorage = new UserStorage();
    $auth = new Auth($userStorage);


function validateComment($c)
{
    global $errors;
    if (trim($c) == "")
        $errors["comment"] = "Comment can not be empty";
}

console_log($_POST);

if (count($_POST) > 0) {
    if (isset($_POST["comment-form"])){
        global $errors;
        $comment = $_POST["comment"];
        validateComment($comment);
        if (count($errors) == 0) {
             $commentStorage->add([
                 "teamid" => $id,
                //"time" => date("Y-m-d H:i:s", time()),
                "time" => "1h",
                "username" => $_SESSION["user"]["username"],
                "descrip" => $comment,
                "vote" => 20,
            ]);
            
        }
    }
    else if (isset($_POST["delete-form"])) {
        $idDelCmt = $_POST["delcmt"];
        $commentStorage->delete($idDelCmt);
    }

    //redirect("./teams.php?teamid=" . $id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name']?> - ELTE Stadium</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <nav>
        <a href="./">
            <img style="width:10vw;" src="./assets/applogo.png" alt="">
        </a>
        <div style="display: flex; gap: 20px;">
            <a href="./">Dashboard</a>
            <a href="./teams.php?teamid=1">Teams</a>
            <a href="./">Articles</a>
            <a href="./">Results</a>
            <a href="./">Tournaments</a>
            <?php if (isset($_SESSION["user"])) {
                $user = $_SESSION["user"]; 
                $image = $user["image"];
                ?>
                <img style="width:30px;height:30px;" src="<?php printf($image);?>" alt="">
                <h3  style="font-weight: 700; font-size:16px;align-self:center"><?= $auth->authenticated_user()['username'] ?></h3>
                <a style="color: var(--sec-color);font-weight: 700;" href="logout.php">Log out</a>
            <?php } else { ?>
                <a href="./login.php" style="margin-left: 50px; color: var(--sec-color);font-weight: 700;">Login</a>
            <?php } ?>
        </div>
    </nav>

    <main>
        <div class="grid-cont">
            <!-- 1 COL -->
            <section>
                <div class="block-cont">
                    <h3 class="block-title">Recent Activities</h3>
                    <div class="block">

                        <?php foreach($data['recent_activities'] as $activity) {
                            $idActivity = $activity["id"];
                            $descrip = $activity["description"];
                            $image = $activity["image"];
                            $time = $activity["time"];
                        ?>
                        
                            <div class="row-activities">
                                <img class="row-icon-image" src="<?php printf($image);?>" alt="">
                                <p><?php echo $descrip?></p>
                                <h3><?php echo $time?></h3>
                            </div>
                        
                        <?php } //closing foreach?>


                    </div>

                </div>
                
                <!-- Comments -->
                <div class="block-cont">
                    <h3 class="block-title">Comments</h3>
                    <div class="block">
                        <?php foreach($commentStorage->findAll(["teamid" => $id]) as $key => $cmt) {
                            $idCmt = $cmt["id"];
                            $descrip = $cmt["descrip"];
                            $username = $cmt["username"];
                            $time = $cmt["time"];
                            $vote = $cmt["vote"];
                            $image = $userStorage->findOne(["username" => $username])["image"];
                        ?>

                            <div class="row-comment-cont">
                                <img class="row-icon-image" src="<?php printf($image);?>" alt="">
                                <div class="row-comment-content">
                                    <h4><?php echo $username?></h4>
                                    <p>
                                        <?php echo $descrip?>
                                    </p>
                                    <div class="row-comment-tools">
                                        <div style="display: flex; gap: 10px;">
                                            <img src="./assets/up.svg" alt="">
                                            <h5><?php echo $vote?></h5>
                                            <img src="./assets/down.svg" alt="">
                                        </div>
                                        <div style="display: flex; gap: 10px;">
                                            <img src="./assets/sharebtn.svg" alt="">
                                            <?php if ($auth->authorize(["admin"])) : ?>
                                                

                                            <form action="" method="post">
                                                <input style="display:none" type="text" name="delcmt" value="<?php echo $idCmt;?>" >
                                                <button style="background:transparent; border:none; cursor:pointer;" type="submit" name="delete-form" >
                                                    <img src="./assets/close.svg" alt="">
                                                </button>
                                            </form>
                                               
                                            <?php endif ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <h3><?php echo $time?></h3>
                            </div>

                        <?php } //closing foreach?>

                        <?php if (isset($_SESSION["user"])) { ?>

                            <button id="comment-btn" class="btn-comment">
                                Leave a comment
                            </button>

                            <?php if (isset($errors["comment"])) : ?>
                                <span class="error"><?= $errors["comment"] ?></span> <br>
                            <?php endif ?>

                            <form id="comment-form" action="" method="post" novalidate>
                                Your comment:
                                <br>
                                <textarea style="color:black;" name="comment" id="" height="100px"></textarea>
                                <button type="submit" name="comment-form" class="btn-comment"> Submit</button>
                            </form>



                            <?php } else { ?>

                            <a href="./login.php" style="width:100%;">
                                <button style="width:100%;" class="btn-comment">
                                    Log in to comment
                                </button>
                            </a>

                        <?php } //closing else?>
                    </div>
                </div>
            </section>

            <!-- 2 COL -->
            <section>
                <div class="block-cont">
                    <img style="width: 100%;" src="<?php printf($data['banner']);?>" alt="">
                </div>


                  <!-- Upcoming Match Block -->
                <div class="block-cont">
                    <h3 class="block-title">Upcoming Matches</h3>
                    <div class="block">

                        <?php
                        foreach(getTeamUpComingMatches($id) as $match) {
                            $league = $match["leauge"];
                            
                            $locationH = $match["home"]["location"];
                            $dateH = $match["home"]["date"];
                            $timeH = $match["home"]["time"];
                            $idteamH =  $match["home"]["id"];
                            $vsteamH = $match["home"]["vs"];

                            $locationA = $match["away"]["location"];
                            $dateA = $match["away"]["date"];
                            $timeA = $match["away"]["time"];
                            $idteamA =  $match["away"]["id"];
                            $vsteamA = $match["away"]["vs"];
                        ?>
                            <!-- HOME MATCH -->
                            <div class="row">
                                <div class="col-info1">
                                    <h4><?php echo $league?></h4>
                                    <p><?php echo $locationH?></p>
                                </div>

                                <div class="col-info2">
                                    <div class="col-info2-left">
                                        <h5><?php echo getTeamName($idteamH)?></h5>
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($idteamH));?>" alt="">
                                    </div>
                                    <div class="col-info2-middle">
                                        <h5><?php echo $dateH?></h5>
                                        <p><?php echo $timeH?></p>
                                    </div>
                                    <div class="col-info2-right">
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($vsteamH));?>" alt="">
                                        <h5><?php echo getTeamName($vsteamH)?></h5>
                                    </div>
                                </div>

                                <div class="col-info3">
                                    <button>Get ticket</button>
                                </div>
                            </div>

                            <!-- AWAY MATCH -->
                            <div class="row">
                                <div class="col-info1">
                                    <h4><?php echo $league?></h4>
                                    <p><?php echo $locationA?></p>
                                </div>

                                <div class="col-info2">
                                    <div class="col-info2-left">
                                        <h5><?php echo getTeamName($idteamA)?></h5>
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($idteamA));?>" alt="">
                                    </div>
                                    <div class="col-info2-middle">
                                        <h5><?php echo $dateA?></h5>
                                        <p><?php echo $timeA?></p>
                                    </div>
                                    <div class="col-info2-right">
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($vsteamA));?>" alt="">
                                        <h5><?php echo getTeamName($vsteamA)?></h5>
                                    </div>
                                </div>

                                <div class="col-info3">
                                    <button>Get ticket</button>
                                </div>
                            </div>

                        <?php } //closing foreach?>


                       


                    </div>
                </div>


                <!-- Latest Match Block -->
                <div class="block-cont">
                    <div style="display: flex; justify-content: space-between;">
                        <h3 class="block-title">Latest Matches</h3>
                        <div style="display: flex; align-items: center; gap: 10px; margin-right: 20px;">
                            <p>See More</p>
                            <img src="./assets/arrow.svg" alt="">
                        </div>
                    </div>


                    <div class="block">

                        <?php foreach(getFirstFive(getTeamMatches($id)) as $match) {
                            $league = $match["leauge"];

                            $locationH = $match["home"]["location"];
                            $scoreH = $match["home"]["score"];
                            $idteamH =  $match["home"]["id"];
                            $vsteamH = $match["home"]["vs"];
                            $winnerH = $match["home"]["winner"];

                            $locationA = $match["away"]["location"];
                            $scoreA = $match["away"]["score"];
                            $idteamA =  $match["away"]["id"];
                            $vsteamA = $match["away"]["vs"]; 
                            $winnerA = $match["away"]["winner"];
                        ?>
                            <!-- HOME MATCH -->
                            <div class="row">
                                <div class="col-info1">
                                    <h4><?php echo $league;?></h4>
                                    <p><?php echo $locationH;?></p>
                                </div>

                                <div class="col-info2">
                                    <div class="col-info2-left">
                                        <h5><?php echo getTeamName($idteamH)?></h5>
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($idteamH));?>" alt="">
                                    </div>
                                    <div class="col-info2-middle">
                                        <div style="position:relative;">
                                            <?php if ($auth->authorize(["admin"])) : ?>
                                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.1833 2.27271L13.6889 4.7396C13.7944 4.84352 13.7944 5.01309 13.6889 5.11701L7.62222 11.0901L5.04444 11.3718C4.7 11.41 4.40833 11.1229 4.44722 10.7837L4.73333 8.24575L10.8 2.27271C10.9056 2.16878 11.0778 2.16878 11.1833 2.27271ZM15.6833 1.64642L14.3278 0.31178C13.9056 -0.103927 13.2194 -0.103927 12.7944 0.31178L11.8111 1.27994C11.7056 1.38386 11.7056 1.55343 11.8111 1.65736L14.3167 4.12424C14.4222 4.22817 14.5944 4.22817 14.7 4.12424L15.6833 3.15609C16.1056 2.73764 16.1056 2.06212 15.6833 1.64642V1.64642ZM10.6667 9.46552V12.2497H1.77778V3.49795H8.16111C8.25 3.49795 8.33333 3.4624 8.39722 3.40223L9.50833 2.30826C9.71944 2.10041 9.56944 1.74761 9.27222 1.74761H1.33333C0.597222 1.74761 0 2.33561 0 3.06036V12.6872C0 13.412 0.597222 14 1.33333 14H11.1111C11.8472 14 12.4444 13.412 12.4444 12.6872V8.37156C12.4444 8.07892 12.0861 7.93397 11.875 8.13909L10.7639 9.23305C10.7028 9.29596 10.6667 9.378 10.6667 9.46552Z" fill="white"/>
                                            </svg>
                                            <?php endif ?>
                                            <p><?php echo $scoreH;?></p>
                                        </div>
                                    </div>
                                    <div class="col-info2-right">
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($vsteamH));?>" alt="">
                                        <h5><?php echo getTeamName($vsteamH)?></h5>
                                    </div>
                                </div>

                                <div class="col-info3">
                                    <img src="./assets/comment.svg"></img>
                                    <img src="./assets/chart.svg"></img>
                                    <div style="background: <?php printf(isWon($id,$winnerH));?>" class="result-color"></div>
                                </div>
                            </div>

                            <!-- AWAY MATCH -->
                            <div class="row">
                                <div class="col-info1">
                                    <h4><?php echo $league;?></h4>
                                    <p><?php echo $locationA;?></p>
                                </div>

                                <div class="col-info2">
                                    <div class="col-info2-left">
                                        <h5><?php echo getTeamName($idteamA)?></h5>
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($idteamA));?>" alt="">
                                    </div>
                                    <div class="col-info2-middle">
                                        <div style="position:relative;">
                                            <?php if ($auth->authorize(["admin"])) : ?>
                                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.1833 2.27271L13.6889 4.7396C13.7944 4.84352 13.7944 5.01309 13.6889 5.11701L7.62222 11.0901L5.04444 11.3718C4.7 11.41 4.40833 11.1229 4.44722 10.7837L4.73333 8.24575L10.8 2.27271C10.9056 2.16878 11.0778 2.16878 11.1833 2.27271ZM15.6833 1.64642L14.3278 0.31178C13.9056 -0.103927 13.2194 -0.103927 12.7944 0.31178L11.8111 1.27994C11.7056 1.38386 11.7056 1.55343 11.8111 1.65736L14.3167 4.12424C14.4222 4.22817 14.5944 4.22817 14.7 4.12424L15.6833 3.15609C16.1056 2.73764 16.1056 2.06212 15.6833 1.64642V1.64642ZM10.6667 9.46552V12.2497H1.77778V3.49795H8.16111C8.25 3.49795 8.33333 3.4624 8.39722 3.40223L9.50833 2.30826C9.71944 2.10041 9.56944 1.74761 9.27222 1.74761H1.33333C0.597222 1.74761 0 2.33561 0 3.06036V12.6872C0 13.412 0.597222 14 1.33333 14H11.1111C11.8472 14 12.4444 13.412 12.4444 12.6872V8.37156C12.4444 8.07892 12.0861 7.93397 11.875 8.13909L10.7639 9.23305C10.7028 9.29596 10.6667 9.378 10.6667 9.46552Z" fill="white"/>
                                            </svg>
                                            <?php endif ?>
                                            <p><?php echo $scoreA;?></p>
                                        </div>
                                    </div>
                                    <div class="col-info2-right">
                                        <img class="row-icon-image" src="<?php printf(getTeamLogo($vsteamA));?>" alt="">
                                        <h5><?php echo getTeamName($vsteamA)?></h5>
                                    </div>
                                </div>

                                <div class="col-info3">
                                    <img src="./assets/comment.svg"></img>
                                    <img src="./assets/chart.svg"></img>
                                    <div style="background: <?php printf(isWon($id,$winnerA));?>" class="result-color"></div>
                                </div>
                            </div>
                        <?php } //closing foreach?>



                    </div>
                </div>

            </section>

            <!-- 3 COL -->
            <section>
                <div class="block-cont">
                    <div class="block">
                        <div class="team-profile-cont">
                            <img src="<?php printf($data["logo"]);?>" alt="">
                            <span>Team Name</span>
                            <p><?php echo $data["name"]?></p>
                            <span>Short name</span>
                            <p><?php echo $data["short_name"]?></p>
                            <span>City</span>
                            <p><?php echo $data["city"]?></p>
                            <span>Founded</span>
                            <p><?php echo $data["founded"]?></p>
                            <span>Owner</span>
                            <p><?php echo $data["owner"]?></p>
                            <span>Head Coach</span>
                            <p><?php echo $data["coach"]?></p>
                            <span>Website</span>
                            <p><?php echo $data["website"]?></p>
                        </div>
                    </div>
                </div>


                <!-- PLAYERS -->

                <div class="block-cont">
                    <h3 class="block-title">Players</h3>
                    <div class="block">
                        <?php foreach($data['players'] as $player) {
                                $idPlayer = $player["id"];
                                $name = $player["name"];
                                $age = $player["age"];
                                $position = $player['position'];
                                $city = $player["city"];
                                $number = $player["number"];
                                $image = $player['image'];
                        ?>

                            <div class="row-player">
                                <img class="row-icon-image" src="<?php printf($image);?>" alt="">
                                <div style="display: flex; flex-direction: column;">
                                    <h5><?php echo $name?></h5>
                                    <p><?php echo $age?> years old</p>
                                </div>
                                <div style="display: flex; flex-direction: column;">
                                    <h5><?php echo $position?></h5>
                                    <p><?php echo $city?></p>
                                </div>
                                <h4 style="justify-self: center;font-size: 20px;"><?php echo $number?></h4>
                            </div>

                        <?php } //closing foreach?>

                    </div>
                </div>

            </section>
        </div>
    </main>
    <script src="teams.js"></script>
</body>
</html>