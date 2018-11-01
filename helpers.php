<?php

if (!function_exists('optional2')) {
    /**
     * Optional better
     *
     * @param mixed $data
     * @return void \Laravelfy\Optional\Optional
     */
    function optional2($data)
    {
        return new \Laravelfy\Optional\Optional($data);
    }
}
