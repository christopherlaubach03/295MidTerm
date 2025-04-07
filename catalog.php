<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detroit Pistons</title>
    <link rel="stylesheet" href="catalogStyles.css">
</head>

<body>
    <header>
        <nav id="topbar">
            <div class="logo"> <a href="index.html"><img src="images/logo.png" alt="Detroit Pistons Logo"></a> </div>
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
        <?php
        include 'Calendar.php';

        // Create a new calendar instance for April 2025
        $calendar = new Calendar(2025, 4);

        // March games
        $calendar->addEvent('2025-03-01', 'vs BKN (W 115-94)');
        $calendar->addEvent('2025-03-03', '@ UTA (W 134-106)');
        $calendar->addEvent('2025-03-05', '@ LAC (L 115-123)');
        $calendar->addEvent('2025-03-08', '@ GSW (L 110-115)');
        $calendar->addEvent('2025-03-09', '@ POR (W 119-112)');
        $calendar->addEvent('2025-03-11', 'vs WAS (W 123-103)');
        $calendar->addEvent('2025-03-13', 'vs WAS (L 125-129)');
        $calendar->addEvent('2025-03-15', 'vs OKC (L 107-113)');
        $calendar->addEvent('2025-03-17', '@ NOP (W 127-81)');
        $calendar->addEvent('2025-03-19', '@ MIA (W 116-113)');
        $calendar->addEvent('2025-03-21', '@ DAL (L 117–123)');
        $calendar->addEvent('2025-03-23', 'vs NOP (W 136–130)');
        $calendar->addEvent('2025-03-25', 'vs SATX (W 122–96)');
        $calendar->addEvent('2025-03-28', 'vs CLE (W 133–122)');
        $calendar->addEvent('2025-03-30', '@ MINN (L 104–123)');

        // April games
        $calendar->addEvent('2025-04-02', '@ OKC (L 103-119)');
        $calendar->addEvent('2025-04-04', '@ TOR (W 117-105)');
        $calendar->addEvent('2025-04-05', 'vs MEM (7:00 PM)');
        $calendar->addEvent('2025-04-07', 'vs SAC (7:00 PM)');
        $calendar->addEvent('2025-04-10', 'vs NYK (7:00 PM)');
        $calendar->addEvent('2025-04-11', 'vs MILW (7:00 PM)');
        $calendar->addEvent('2025-04-13', '@ MILW (1:00 PM)');

        // Render the calendar
        echo $calendar->render();
        ?>
    </main>

    <footer>
        <p>&copy; 2025 Detroit Pistons. All rights reserved.</p>
    </footer>
</body>

</html>
