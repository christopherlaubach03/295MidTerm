<?php

 $dbHost = 'localhost';
 $dbUser = 'root';
 $dbPass = '';
 $dbName = 'pistons_roster';

 $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

 if (!$conn) {
     die("Error: Unable to connect to the player database. Please try again later.");
 }

 mysqli_set_charset($conn, "utf8mb4");

 $players = [];
 $sql = "SELECT id, stats_target_id, image_src, image_alt, position_info, player_number_name, pro_info, stats_games, stats_ppg, stats_rpg, stats_apg FROM players ORDER BY player_number_name ASC";

 $result = mysqli_query($conn, $sql);

 if ($result && mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
         $players[] = [
             "id" => $row['id'],
             "statsTargetId" => $row['stats_target_id'],
             "imageSrc" => $row['image_src'],
             "imageAlt" => $row['image_alt'],
             "positionInfo" => $row['position_info'],
             "playerNumberName" => $row['player_number_name'],
             "proInfo" => $row['pro_info'],
             "stats" => [
                 "games" => $row['stats_games'],
                 "ppg" => $row['stats_ppg'],
                 "rpg" => $row['stats_rpg'],
                 "apg" => $row['stats_apg']
             ]
         ];
     }
 } elseif (!$result) {

 }

 mysqli_close($conn);

 function e($string) {
     return htmlspecialchars((string)$string, ENT_QUOTES, 'UTF-8');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detroit Pistons Roster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="rosterStyles.css">
    <script>
        const rosterData = <?php echo json_encode($players); ?>;
    </script>
</head>
<body>
    <header>
        <nav id="topbar">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="Detroit Pistons Logo"></a>
            </div>
            <ul>
                <li><a href="index.html">HOME</a></li>    
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="catalog.html">CATALOG</a></li>
                <li><a href="roster.php">ROSTER</a></li>
                <li><a href="history.html">HISTORY</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>2024-25 Men's Basketball Roster</h1>
        <div class="roster-container">
            <table>
                <tbody>
                    <?php if (!empty($players)): ?>
                        <?php foreach ($players as $player): ?>
                            <tr class="player-info-row">
                                <td class="player-image-cell">
                                    <img class="player-image" src="<?php echo e($player['imageSrc']); ?>" alt="<?php echo e($player['imageAlt']); ?>">
                                </td>
                                <td class="player-details-cell">
                                    <div class="player-text-info">
                                        <p><?php echo e($player['positionInfo']); ?></p>
                                        <h2><?php echo e($player['playerNumberName']); ?></h2>
                                        <p><?php echo e($player['proInfo']); ?></p>
                                    </div>
                                    <div class="stats-overlay" id="<?php echo e($player['statsTargetId']); ?>">
                                    </div>
                                    <button class="stats-button" data-player-id="<?php echo e($player['statsTargetId']); ?>">
                                        <img src="images/White Statistics Icon (2).png" alt="Show Stats">
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="2" style="text-align: center; padding: 20px;">No players found in the roster database.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="roster.js"></script>
</body>
</html>