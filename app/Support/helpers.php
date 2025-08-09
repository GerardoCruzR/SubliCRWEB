<?php

if (! function_exists('money_mx')) {
    function money_mx($n) {
        return '$' . number_format((float)$n, 2, '.', ',');
    }
}
