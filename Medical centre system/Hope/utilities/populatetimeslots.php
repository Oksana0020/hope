<?php
function populateTimeSlots($startHour, $endHour) {
    $options = '';

    for ($hour = $startHour; $hour < $endHour; $hour++) {
        for ($minute = 0; $minute < 60; $minute += 30) {
            $hourStr = ($hour < 10) ? '0' . $hour : $hour;
            $minuteStr = ($minute < 10) ? '0' . $minute : $minute;
            $time = $hourStr . ':' . $minuteStr;
            $options .= "<option value=\"$time\">$time</option>";
        }
    }

    return $options;
}

// from 9:00 to 13:00 every 30 minutes
echo populateTimeSlots(9, 13);
// time slots from 14:00 till 18:00
echo populateTimeSlots(14, 18);
?>