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
    
        // Start rendering HTML
        $html = '<table border="1">';
        $html .= '<tr><th>' . implode('</th><th>', $daysOfWeek) . '</th></tr>';
        $html .= '<tr>';
    
        // Empty cells before first day
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
            $html .= '<td></td>';
        }
    
        // Days of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            if (($day + $firstDayOfWeek - 1) % 7 == 0 && $day != 1) {
                $html .= '</tr><tr>';
            }
    
            // Format date
            $date = sprintf('%04d-%02d-%02d', $this->year, $this->month, $day);
    
            // Check for events
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
    
        // Empty cells after last day
        while (($day + $firstDayOfWeek - 1) % 7 != 0) {
            $html .= '<td></td>';
            $day++;
        }
    
        // Close table
        $html .= '</tr></table>';
    
        return $html;
    }
    
}
?>
