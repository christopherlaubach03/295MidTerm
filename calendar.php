<?php

class Calendar {
    private $year;
    private $month;
    private $events = [];

    public function __construct($year = null, $month = null) {
        $this->year = $year ?: date('Y');
        $this->month = $month ?: date('m');
    }

    public function addEvent($date, $title) {
        $this->events[$date][] = $title;
    }

    public function render() {
        $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $daysInMonth = date('t', strtotime("$this->year-$this->month-01"));
        $firstDayOfWeek = date('w', strtotime("$this->year-$this->month-01"));

        // Start
        $html = '<table border="1">';
        $html .= '<tr><th>' . implode('</th><th>', $daysOfWeek) . '</th></tr>';

        // Add empty cells for days before the first day of the month
        $html .= '<tr>';
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
            $html .= '<td></td>';
        }

        // Add days of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            if (($day + $firstDayOfWeek - 1) % 7 == 0 && $day != 1) {
                $html .= '</tr><tr>';
            }

            // Check if there are events for this day
            $date = "$this->year-$this->month-" . str_pad($day, 2, '0', STR_PAD_LEFT);
            if (isset($this->events[$date])) {
                $eventHtml = '<ul>';
                foreach ($this->events[$date] as $event) {
                    $eventHtml .= "<li>$event</li>";
                }
                $eventHtml .= '</ul>';
                $html .= "<td>$day<br>$eventHtml</td>";
            } else {
                $html .= "<td>$day</td>";
            }
        }

        // Add empty cells for days after the last day of the month
        while (($day + $firstDayOfWeek - 1) % 7 != 0) {
            $html .= '<td></td>';
            $day++;
        }

        // Close the table
        $html .= '</tr></table>';

        return $html;
    }
}
?>
