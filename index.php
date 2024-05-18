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
            color: white;
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

        .form-container {
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            text-align: center;
        }

       
        .form-container input[type="submit"] {
            background-color: rgb(224, 70, 75);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: rgb(224, 70, 75);
        }
        .form-container textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: rgba(0, 0, 0, 0.2);
            color: white;
            font-size: 16px;
            resize: none;
            backdrop-filter: blur(5px);
        }

        
        .form-container .form-buttons {
            text-align: left;
            margin-top: 10px;
        }

        .form-container .form-buttons input[type="file"] {
            display: flex;
            justify-content: space-between;
            margin-right: 10px;
            padding-bottom: 5px;
        }
    </style>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var inquiry = document.getElementById("inquiry").value;
            var attachment = document.getElementById("attachment").value;
            
            if (email === "") {
                alert("Email is required.");
                return false;
            }

            if (inquiry === "") {
                alert("Inquiry is required.");
                return false;
            }

            return true;
        }
    </script>
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
                        <a href="logout" class="logout-link">Log out</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login">Log in</a>
            <?php endif; ?>
        </li>
    </ul>

    <div style="padding-top: 10px; padding-left:100px; margin-right: 100px"> 
        <h1>Welcome to Game Hub</h1>
        <hr>
        <h2>Check the latest news and events in the gaming world</h2>

        <div>
            <h3>Latest game releases</h3>
            <div style="display: flex; justify-content: space-around;">
                <img src="images/amnesia.jfif" width="200px" height="300px">
                <img src="images/Diablo_IV_cover_art.png" width="200px" height="300px">
                <img src="images/backrooms.png" width="200px" height="300px">
                <img src="images/assasin.png" width="200px" height="300px">
                <img src="images/Resident_Evil_4_remake_cover_art.png" width="200px" height="300px">
                <img src="images/Legend-of-Zelda-Tears-of-The-Kingdom-large-image.png" width="200px" height="300px">
            </div>
        </div>
        <hr>
        <div>
            <h3>Ongoing events</h3>
            <div style="display: flex; padding-bottom: 30px;">
                <img src="images/Apex-Legends-Global-Series-Year-3.png" width="550px" height="300px">
                <div style="padding-left: 30px;padding-top: 10px;">
                    <h4>Apex Legends Global Series Year 3</h4>
                    <p>Venue: Online and In-Person</p>
                    <p>Dates: Winter 2023 (Split 1 Playoffs)</p>
                    <p>March-May 2023 (Split 2 Pro League, Challenger Circuit #2)</p>
                    <p>Spring 2023 (Split 2 Playoffs)</p>
                    <p>June 2023 (Last Chance Qualifiers)</p>
                    <p>Summer 2023 (ALGS Championship)</p>
                </div>
            </div>
            <div style="display: flex; padding-bottom: 30px;">
                <img src="images/Dota-2-Esports.png" width="550px" height="300px">
                <div style="padding-left: 30px; padding-top: 50px;">
                    <h4>The International 2023 Dota Championship</h4>
                    <p>Venue: To be announced</p>
                    <p>Dates: Spring Major – March 13-22</p>
                    <p>Summer Major – May 15-24</p>
                    <p>The International – TBA (was October in 2022)</p>
                </div>
            </div>
            <div style="display: flex; padding-bottom: 30px; ">
                <img src="images/Intel-Extreme-Masters.png" width="550px" height="300px">
                <div style="padding-left: 30px; padding-top: 10px;">
                    <h4>Intel Extreme Masters 2023</h4>
                    <p>Venues: Katowice, Poland; Brazil; Dallas; Cologne</p>
                    <p>Dates: Katowice 2023 & Katowice SC2 2023 – Feb 10-12</p>
                    <p>Brazil 2023 – Apr 17-23/p>
                    <p>Dallas 2023 – Jun 2-4</p>
                    <p>Cologne 2023 – Aug 4-6</p>
                    <p>Fall 2023 (Venue TBA) – Oct 16-22</p>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <h3>Having issues? Contact us</h3>
            <div class="form-container">
                <form method="POST" enctype="multipart/form-data" action="submit_form.php" onsubmit="return validateForm()">
                    <input type="email" id="email" name="email" placeholder="Your email" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: none; border-radius: 4px; box-sizing: border-box; background-color: rgba(0, 0, 0, 0.2); color: white; font-size: 16px; backdrop-filter: blur(5px);">
                    <br>
                    <textarea id="inquiry" name="inquiry" rows="8" placeholder="Having issues or questions? Enter your inquiry here" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: none; border-radius: 4px; box-sizing: border-box; background-color: rgba(0, 0, 0, 0.2); color: white; font-size: 16px; resize: none; backdrop-filter: blur(5px);"></textarea>
                    <br>
                    <div class="form-buttons">
                    <input type="file" id="attachment" name="attachment" accept=".png">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
