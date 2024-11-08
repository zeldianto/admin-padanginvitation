<?php
if (!function_exists('get_json_config')) {
    function get_json_config($key = null) {
        $filePath = FCPATH . 'config.json';

        if (!file_exists($filePath)) {
            log_message('error', 'config.json file not found at ' . $filePath);
            return null;
        }

        $json = file_get_contents($filePath);
        $config = json_decode($json, true);

        if ($key) {
            return isset($config[$key]) ? $config[$key] : null;
        }

        return $config;
    }
}
