<?php
    require('data/data.php');
    require('functions.php');
    session_start();
    include_once("userstorage.php");
    include_once("auth.php");
    include_once("helper.php");
    $userStorage = new UserStorage();
    $auth = new Auth($userStorage);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELTE Stadium</title>
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
            <!-- 1st COL -->
            <section>
                <!-- Top Teams -->
                <div class="block-cont">
                    <div style="display: flex; justify-content: space-between;">
                        <h3 class="block-title">Top Teams</h3>
                        <a href="./" style="text-decoration: none;">
                            <div style="display: flex; align-items: center; gap: 10px; margin-right: 20px;">
                                <p class="see more">See More</p>
                                <img src="./assets/arrow.svg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="block">

                        <?php foreach(getTopTeams() as $team) {
                            $id = $team["id"];
                            $name = $team["name"];
                            $city = $team["city"];
                            $score = $team["score"];
                            $logo = $team["logo"];
                        ?>

                        <a href="<?php printf('%s?teamid=%s','teams.php',$id)?>" style="text-decoration:none;">
                            <div class="row-top-data">
                                <img class="row-icon-image" src="<?php printf($logo);?>" alt="">
                                <div>
                                    <h3><?php echo $name?></h3>
                                    <p><?php echo $city?></p>
                                </div>
                                <h2><?php echo $score?></h2>
                            </div>
                        </a>

                        <?php } //closing foreach?>

                        
                    </div>
                </div>

                <!-- Top Player -->
                <div class="block-cont">
                    <div style="display: flex; justify-content: space-between;">
                        <h3 class="block-title">Top Players</h3>
                        <a href="./" style="text-decoration: none;">
                            <div style="display: flex; align-items: center; gap: 10px; margin-right: 20px;">
                                <p class="see more">See More</p>
                                <img src="./assets/arrow.svg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="block">
                        <div class="row-top-data">
                            <img class="row-icon-image" src="./assets/Navi/simple.png" alt="">
                            <div>
                                <h3>Simple</h3>
                                <p>Natus Vincere</p>
                            </div>
                            <h2>152</h2>
                        </div>

                        <div class="row-top-data">
                            <img class="row-icon-image" src="./assets/Navi/dendi.png" alt="">
                            <div>
                                <h3>Dendi</h3>
                                <p>Natus Vincere</p>
                            </div>
                            <h2>144</h2>
                        </div>

                        <div class="row-top-data">
                            <img class="row-icon-image" src="./assets/MU/1.png" alt="">
                            <div>
                                <h3>Wayne Rooney</h3>
                                <p>Manchester United</p>
                            </div>
                            <h2>124</h2>
                        </div>
                    </div>
                </div>

            </section>

            <!-- 2nd COL -->
            <section>

                <div class="block-cont">
                    <img style="width: 100%;" src="./assets/news.png" alt="">
                </div>

                <!-- Upcoming Match Block -->
                <div class="block-cont">
                    <h3 class="block-title">Upcoming Matches</h3>
                    <div class="block">

                        <?php foreach($upcoming_matches as $match) {
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
                        <div id="see-more-latest-match-main" style="display: flex; align-items: center; gap: 10px; margin-right: 20px; cursor:pointer;">
                            <p>See More</p>
                            <img src="./assets/arrow.svg" alt="">
                        </div>
                    </div>


                    <div class="block">

                        <?php foreach(getFirstFive($matches) as $match) {
                            $league = $match["leauge"];

                            $locationH = $match["home"]["location"];
                            $scoreH = $match["home"]["score"];
                            $idteamH =  $match["home"]["id"];
                            $vsteamH = $match["home"]["vs"];

                            $locationA = $match["away"]["location"];
                            $scoreA = $match["away"]["score"];
                            $idteamA =  $match["away"]["id"];
                            $vsteamA = $match["away"]["vs"]; 
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
                                </div>
                            </div>
                        <?php } //closing foreach?>



                    </div>
                </div>


                <!-- ALL MATCHES -->
                <div id="all-matches" class="block-cont">
                    <div style="display: flex; justify-content: space-between;">
                        <h3 class="block-title">All Matches</h3>
                        
                    </div>


                    <div class="block">

                        <?php foreach($matches as $match) {
                            $league = $match["leauge"];

                            $locationH = $match["home"]["location"];
                            $scoreH = $match["home"]["score"];
                            $idteamH =  $match["home"]["id"];
                            $vsteamH = $match["home"]["vs"];

                            $locationA = $match["away"]["location"];
                            $scoreA = $match["away"]["score"];
                            $idteamA =  $match["away"]["id"];
                            $vsteamA = $match["away"]["vs"]; 
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
                                </div>
                            </div>
                        <?php } //closing foreach?>



                    </div>
                </div>

            </section>

            <!-- 3rd COL -->
            <section>

                <div class="block-cont">
                    <img style="width: 100%;" src="./assets/livesection.png"/>
                </div>


                <div class="block-cont">
                    <h3 class="block-title">Favorites Teams</h3>
                    <div class="block" style="justify-content: center;">
                            <button class="btn-comment">LOG IN TO USE THIS FEATURE</button>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script src="index.js"></script>
</body>
</html>