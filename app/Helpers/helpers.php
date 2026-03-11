<?php

if (! function_exists('format_number')) {
    /**
     * تنسيق الأرقام المالية مع فاصلة الآلاف والعملة.
     *
     * @param float|int $number
     * @param int $decimals
     * @return string
     */
    function format_number($number, $decimals = 2)
    {
        return number_format($number, $decimals, '.', ',');
    }
}
