<?php

/**
 * Melampaui limit time connection
 *
 * @return void
 */
if (!function_exists('bypass_time_limit')) {
    function bypass_time_limit()
    {
        ini_set('max_execution_time', '300');
        set_time_limit(300);
    }
}
