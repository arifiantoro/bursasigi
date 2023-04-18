<?php
if (!function_exists('calculate_age')) {
    function calculate_age($date_of_birth)
    {
        $today = new DateTime();
        $diff = $today->diff(new DateTime($date_of_birth));
        return $diff->y . " Tahun";
    }
}
