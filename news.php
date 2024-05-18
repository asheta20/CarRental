<?php
session_start();

$log = "";

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    $log = date("Y-m-d H:i:s") . " - User logged in/Home page: " . htmlspecialchars($user["name"]) . " (ID: {$_SESSION["user_id"]})\n";
}

if (!empty($log)) {
    file_put_contents("logs.txt", $log, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="navigationBar.css">
    <style>
        body {
          background-image: url('images/background.png');
          background-repeat: no-repeat;
          background-size: cover;
          color: rgb(172, 164, 164);
          font-family: 'Roboto Condensed', sans-serif;
        }

        .dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
        .green-arrow {
          color: green;
          padding-right: 5px;
        }
        .red-arrow{
            color: brown;
            padding-right: 5px;
        }
       
      </style>
</head>
<body>
    <ul>
        <li class="left"><a href="index"><img src="images/icon3.0.png" width="70px" height="15px"></a></li>
        <li class="center"><a href="index">Home</a></li>
        <li class="center"><a href="news">News</a></li>
        <li class="center"><a href="E-Sports">E-sports</a></li>
      
        <li class="dropdown right">
          <?php if (isset($user)): ?>
            <div class="dropdown-container">
              <a class="dropbtn" href="#">
                <?= htmlspecialchars($user["name"]) ?>
              </a>
              <div class="dropdown-content">
                <a href="logout.php" class="logout-link">Log out</a>
              </div>
            </div>
          <?php else: ?>
            <a href="login">Log in</a>
          <?php endif; ?>
        </li>
      </ul>
     <div class="text-selection">
      <div style="padding-left: 120px; padding-right: 120px;">
        <h1 style="text-align: center;">Never miss an update on your favorite games and what happens around the gaming world </h1>
        <hr>
        <!--Images and text which is displayed in screen, iframes for the video-->
        <div>
            <h2>GTA VI possible release year</h2>
            <span style="display: flex; flex-direction:row;">
            <p style="padding-right: 20px;">Take-Two just had an earnings report out, and there is one particular section that appears to be quite attention-grabbing. Looking ahead to the future, Take-Two says that Fiscal 2025 is a “highly anticipated” year for the company. I think we know what that means, but see if you can figure it out:
               <br><br>
                <em>“In Fiscal 2025, we expect to enter this new era by launching several groundbreaking titles that we believe will set new standards in our industry and enable us to achieve over $8 billion in Net Bookings and over $1 billion in Adjusted Unrestricted Operating Cash Flow. We expect to sustain this momentum by delivering even higher levels of operating results in Fiscal 2026 and beyond.”
                $8 billion in Net Bookings? It’s Grand Theft Auto. It’s Grand Theft Auto 6.</em>
                <br><br>
                Rockstar has said practically nothing about GTA 6, just tiny teasers, while huge-scale leaks have revealed a project that looks vast and detailed and scope, and also quite good, even for being absurdly early in production when the footage was recorded.
                But what this new report means is that GTA 6 should in fact have a release year, which will fall in the Fiscal Year of 2025, the dates of that being between April 1, 2024 and March 31, 2025.

                Within that time period, holiday 2024 seems like the most likely option.
             To read more <a href="https://www.forbes.com/sites/paultassi/2023/05/21/gta-6-now-finally-has-a-releaseyear/?sh=64468e4b6051">click here.</a></p>
            <img src="images/GTA6.png" width="300px" height="200px">
        </span>
        </div>
        <hr>
        <div>
            <h2 style="display: flex; flex-direction: row-reverse">Latest balance changes in Mobile Legends</h2>
            <div style="display: flex; align-items: center;">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/BKkYL1hYV2k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                <div style="display: flex; flex-direction: column; margin-left: 20px;">
                    <h4>Hero changes</h4>
                    <div style="display: flex; align-items: center; padding-bottom: 5px;">
                        <img src="images/alpha.png" width="50px" height="50px" style="border-radius: 50%;">
                        <p style="margin-left: 10px;"><div class="green-arrow">&uarr;</div> Alpha passive rework:
                        If Alpha attack a target with 2 staks, Beta will follow up with true damage.</p>
                    </div>
                    <div style="display: flex; align-items: center;padding-bottom: 5px;">
                        <img src="images/bane.png" width="50px" height="50px" style="border-radius: 50%;">
                        <p style="margin-left: 10px;"><div class="green-arrow">&uarr;</div> Bane passive buff:
                        Now Bane's passive deal damage based on the targets base HP</p>
                    </div>
                    <div style="display: flex; align-items: center;padding-bottom: 5px;">
                        <img src="images/minotaur.png" width="50px" height="50px" style="border-radius: 50%;">
                        <p style="margin-left: 10px;"><div style="padding-right: 5px;"> ~</div> Minotaur adjustment:
                        Rage bar was removed, not Minotaur can enter raged mode automatically to balance they added additional CD on his first 
                    skill 8.5s-5.5s >> 12-9.5s</p>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <img src="images/kimmy.png" width="50px" height="50px" style="border-radius: 50%;">
                        <p style="margin-left: 10px;"><div class="red-arrow">&darr;</div> Kimmy nerf:
                        Base scaling damage lowered since she is overperforming with certain items. Base damage 30 + 20% Phy attack
                    >> 20 + 18% Phy attk </p>
                    </div>
        
                </div>
            </div>
        </div>
        <hr>
        <div>
            <h2>Ever wondered what a "2nd person" game would look like </h2>
            <span style="display: flex; flex-direction:row;">
                <p style="padding-right: 10px;">Driver: San Francisco is an action-adventure driving video game and the fifth installment in the Driver series.
                     Developed by Ubisoft Reflections and published by Ubisoft, it was released in September 2011 for the PlayStation 3, 
                     Wii, Xbox 360 and Microsoft Windows, with an edition for Mac OS X in March 2012. The game has players traverse a fictional 
                     representation of San Francisco and the Bay Area, conducting missions through the use of licensed real-world cars, with the 
                     ability to Shift into any car in the game's setting in most platform editions. The game's main story sees players controlling John Tanner, a police detective, who falls into a coma pursuing his nemesis
                      Charles Jericho following a prison breakout after the events of Driver 3 (Driv3r), and finds himself piecing together his plan 
                    in a dream world while it is happening in real life.</p>
        
                <img src="images/driverSanFrancisco.png" width="350px" height="200px">
            </span>
            <span style="display: flex; flex-direction:row-reverse;">
                <p style="padding-left: 10px;">Most 3D, character-driven video games can be pretty easily placed into one of two categories: either first person or third person. In a first-person game, you see the game world through the actual eyes of the player character as though you were that character, and in a third-person game, you see the player character from the outside… 
                    But the existence of these two perspectives begs a question: …what exactly would second-person look like?
                    <br><br>
                    Near the end of the game you as the player are presented with a misstion called 
                    “The Target” and it’s the final mission of chapter six of the game.You have switched to the body of a thug which is assisting an assasing on persuing and killing a targer. But the target is you.
                In this mission you find yourself in this thugs body persuing your real body but here is where the mechanics are introduced.
                  You press the throttle to accelarate but the car in fron of you moves, you steer into the left and into the right but the car 
                in front of you moves to the left and to the right and thats when you realise that you control the car in front of you.
            The perspective as the player is entirely different from what you control as the player. You are persuing you. </p>
        
                <img src="images/secondperson.png" width="350px" height="200px">
            </span>
        </div>
        <hr>
        <div>
            <h2>Devil May Cry 5 will have an DLC</h2>
            <span style="display: flex; flex-direction:row;">
            <p style="padding-right: 20px;">The Vergil DLC provides an important slice of content that was previously only available in Devil May Cry 5 Special Edition. While the Special Edition is great for those who own a next-gen console, the Vergil DLC is perfect for current-gen system owners and PC players who own DMC 5.
                <br><br>
                Vergil comes equipped with his signature devil arms: the Yamato, Mirage Edge and Beowulf. Each devil arm provides its own unique benefits. The Yamato provides speed, power and plenty of aerial combos to keep you in the air. The Mirage Edge promotes multiple hitting combos that provide great crowd control. The Beowulf also shines with its fast, staggering punches, but each strike can also be charged mid-combo to provide even more damage.
                
                While all of this may appear old hat at first, Capcom does a great job of adding a few new tricks to each of these weapons to keep them feeling fresh. 
                <br><br>For example, the Yamato receives a new attack called Void Slash where Vergil quickly slices the air around him, dealing not only significant damage, but also slowing any enemies who are caught within the strike. Each weapon comes with some insane, room-clearing moves, and their Sin Devil Trigger forms are even crazier. 
                One move called Hell on Earth is best described as a nuke punch and is a verifiable boss killer even on higher difficulties.</p>
            <img src="images/devilmaycry.jpg" width="350px" height="200px">
        </span>
        </div>
      </div>
    </div>
</body>
</html>
