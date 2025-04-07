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
        $calendar = new Calendar(2025, 4);

        // Add events
        $calendar->addEvent('2025-02-05', 'vs CLE (L 115-118)');
        $calendar->addEvent('2025-02-07', 'vs PHL (W 125-112)');
        $calendar->addEvent('2025-02-08', 'vs CLT (W 112-102)');
        $calendar->addEvent('2025-02-11', '@ CHI (W 132-92)');
        $calendar->addEvent('2025-02-12', '@ CHI (W 128-110)');
        $calendar->addEvent('2025-02-21', '@ SATX (8:30 PM)');
        $calendar->addEvent('2025-02-23', '@ ATL (6:00 PM)');
        $calendar->addEvent('2025-02-24', 'vs LAC (7:00 PM)');
        $calendar->addEvent('2025-02-26', 'vs BOS (7:00 PM)');
        $calendar->addEvent('2025-02-28', 'vs DEN (7:00 PM)');

        // Render
        echo $calendar->render();
        ?>
    </main>

    <footer>
        <p>&copy; 2025 Detroit Pistons. All rights reserved.</p>
    </footer>
</body>

</html>
