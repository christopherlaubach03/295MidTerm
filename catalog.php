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
            <div class="logo"> 
                <a href="index.html"><img src="images/logo.png" alt="Detroit Pistons Logo"></a> 
            </div>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="catalog.php">CATALOG</a></li>
                <li><a href="roster.php">ROSTER</a></li>
                <li><a href="history.html">HISTORY</a></li>
            </ul>
        </nav>
    </header>

    <main class="content">
        <!-- Search Section -->
        <div class="search-section">
            <h2>Search for Game Info</h2>
            <form id="gameSearchForm" method="GET">
                <label for="searchDate">Enter Date:</label>
                <input type="date" id="searchDate" name="searchDate" required>
                <button type="submit">Search</button>
            </form>

            <!-- Search Result -->
            <?php
            require_once 'Calendar.php';

            // Create a new calendar instance for April 2025
            $year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
            $month = isset($_GET['month']) ? (int)$_GET['month'] : date('m');

            $calendar = new Calendar($year, $month);

            // Populate calendar with events for February, March, and April
            $calendar->addEvent('2025-02-07', 'vs PHI (W 125-112)');
            $calendar->addEvent('2025-02-09', 'vs CHA (W 112-102)');
            $calendar->addEvent('2025-02-11', '@ CHI (W 132-92)');
            $calendar->addEvent('2025-02-12', '@ CHI (W 128-110)');
            $calendar->addEvent('2025-02-21', '@ SAS (W 125-110)');
            $calendar->addEvent('2025-02-23', '@ ATL (W 148-143)');

            $calendar->addEvent('2025-03-01', 'vs BKN (W 115-94)');
            $calendar->addEvent('2025-03-03', '@ UTA (W 134-106)');
            $calendar->addEvent('2025-03-05', '@ LAC (L 115-123)');
            $calendar->addEvent('2025-03-08', '@ GSW (L 101–110)');
            $calendar->addEvent('2025-03-09', '@ POR (L 98–105)');
            $calendar->addEvent('2025-03-11', 'vs WAS (W 120–110)');
            $calendar->addEvent('2025-03-13', 'vs WAS (L 102–115)');
            $calendar->addEvent('2025-03-15', 'vs OKC (W 118–112)');
            $calendar->addEvent('2025-03-17', '@ NOP (L 99–107)');
            $calendar->addEvent('2025-03-19', '@ MIA (L 111–120)');
            $calendar->addEvent('2025-03-21', '@ DAL (W 113–108)');
            $calendar->addEvent('2025-03-23', 'vs NOP (W 125–122)');
            $calendar->addEvent('2025-03-25', 'vs SAS (W 127–104)');
            $calendar->addEvent('2025-03-28', 'vs CLE (W 120–117)');
            $calendar->addEvent('2025-03-30', '@ MIN (L 109–114)');

            $calendar->addEvent('2025-04-02', '@ OKC (L 103–119)');
            $calendar->addEvent('2025-04-04', '@ TOR (W 117–105)');
            $calendar->addEvent('2025-04-05', 'vs MEM (7:00 PM)');
            $calendar->addEvent('2025-04-07', 'vs SAC (7:00 PM)');
            $calendar->addEvent('2025-04-10', 'vs NYK (7:00 PM)');
            $calendar->addEvent('2025-04-11', 'vs MILW (7:00 PM)');
            $calendar->addEvent('2025-04-13', '@ MILW (1:00 PM)');


            // Check for search date
            if (isset($_GET['searchDate'])) {
                $searchDate = $_GET['searchDate'];
                if (isset($calendar->events[$searchDate])) {
                    echo '<div class="search-result">';
                    echo '<h3>Game Info for ' . htmlspecialchars($searchDate) . ':</h3>';
                    echo '<ul>';
                    foreach ($calendar->events[$searchDate] as $event) {
                        echo '<li>' . htmlspecialchars($event) . '</li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                } else {
                    echo '<div class="error-message">';
                    echo '<p>No game scheduled on ' . htmlspecialchars($searchDate) . '.</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <!-- Calendar Section -->
        <div class="calendar-section">
            <?php
            // Render the calendar
            echo $calendar->render();
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Detroit Pistons. All rights reserved.</p>
    </footer>

    <!-- JavaScript for Month Navigation -->
    <script>
        function navigateMonth(direction) {
            const urlParams = new URLSearchParams(window.location.search);
            let year = parseInt(urlParams.get('year')) || new Date().getFullYear();
            let month = parseInt(urlParams.get('month')) || new Date().getMonth() + 1;

            month += direction;
            if (month < 1) {
                month = 12;
                year -= 1;
            } else if (month > 12) {
                month = 1;
                year += 1;
            }

            window.location.href = `?year=${year}&month=${month}`;
        }
    </script>

</body>

</html>


