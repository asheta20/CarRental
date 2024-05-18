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
  <title>E-sports</title>
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="navigationBar.css">
  <link rel="stylesheet" href="E-sports.css">
  <style>
    body {
      background-image: url('images/background.png');
      background-repeat: no-repeat;
      background-size: cover;
      color: white;
      font-family: 'Roboto Condensed', sans-serif;
    }

    .event-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .event-container img {
      width: 500px;
      height: auto;
    }

    .countdown-container {
      font-size: 36px;
      margin-top: 20px;
    }

    .countdown-title {
      font-size: 24px;
      margin-top: 10px;
    }

    .event-description {
      width: 500px;
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
  </style>
</head>
<body>
  <div>
    <ul>
      <li class="left"><a href="index"><img src="images/icon3.0.png" width="70px" height="15px"></a></li>
      <li class="center"><a href="index">Home</a></li>
      <li class="center"><a href="news">News</a></li>
      <li class="center"><a href="E-Sports ">E-sports</a></li>
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
  </div>

  <div style="display: flex;">
    <div style="padding-left: 100px; padding-right: 100px;">
      <div>
        <h2>Latest news</h2>
        <hr>
        <div class="image-container">
          <a href="https://nerdstreet.com/news/2022/12/esports-awards-winners-2022"><img src="images/esports.png" width="100%" height="370"></a> 
          <div class="image-overlay">
            <h1>The Esports Awards 2022 winners</h1>
          </div>
        </div>
      </div>
      
      <div class="carousel-container" style="padding-top: 10px;">
        <div class="carousel-slide">
          <div class="carousel-item">
            <a href="https://dotesports.com/counter-strike/news/one-csgo-team-played-in-4-out-of-5-of-the-most-watched-major-matches-in-history"><img src="images/csgo.png" alt="Image 1"></a>
            <div class="carousel-text">One CS:GO team played in 4 out of 5 of the most-watched Major matches in history</div>
          </div>
          <div class="carousel-item">
            <a href="https://esportsinsider.com/2023/05/sportfive-with-saudi-esports-federation"><img src="images/sportfive.png"></a>
            <div class="carousel-text">SPORTFIVE partners with Saudi Esports Federation</div>
          </div>
          <div class="carousel-item">
            <a href="https://www.xfire.com/faze-lay-off-staff-stock-prices-plummet/"><img src="images/faze.png" alt="Image 3"></a>
            <div class="carousel-text">FaZe continues to lay off staff as stock prices plummet</div>
          </div>
        </div>
        <a class="carousel-arrow carousel-arrow-left">&#10094;</a>
        <a class="carousel-arrow carousel-arrow-right">&#10095;</a>
      </div>
    </div>

    <div style="padding-right: 100px; padding-left: 100px;">
      <h2>Editors choice</h2>
      <hr>
      <div class="carousel-item" style="height: 200px; width: 100%;">
        <a href="https://esportsinsider.com/2023/05/custom-esports-player-peripherals"><img src="images/editors.png" width="300px" height="200"></a>
        <div class="carousel-text">How custom player peripherals work in esports</div>
      </div>
    </div>
  </div>

  <div style="padding-left: 100px; padding-right: 100px;">
    <h2>Events</h2>
    <hr>
    <div class="event-container">
      <img src="images/singapore.png" width="500px" height="300px">
      <br>
      <img src="images/ESISG23.png" width="500px">
      <h1>20 Jun – 21 Jun 2023</h1>
      <div class="event-description">
        <p>Asian Civilisations Museum, Singapore</p>
        <p>Discover the future of esports, uncovered, as we deliver Grade A programming, excellent F&B plus ample (and fun) networking opportunities across 2 incredible days in the Lion City.</p>
      </div>
      <div class="countdown-container">
        <h2 class="countdown-title">Countdown till the event</h2>
        <div id="countdown"></div>
      </div>
    </div>
  </div>

  <script src="E-sports.js"></script>
  
</body>
</html>
