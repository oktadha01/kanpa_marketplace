<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_properti_populer')) {
    function get_properti_populer()
    {
        // API URL
        $api_url = 'https://admin.kanpa.co.id/Api/properti';

        // Initialize cURL session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $api_url);

        // Return the transfer as a string instead of outputting it directly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Initialize an empty string for HTML
        $populer_html = '';

        // Check for errors
        if (curl_errno($ch)) {
            // Handle error
            $error_msg = curl_error($ch);
            echo "cURL Error: $error_msg";
            return false;
        } else {
            // Decode the JSON response into an associative array
            $properti_populer = json_decode($response, true);

            // Close cURL session
            curl_close($ch);

            return $properti_populer;
        }
    }
}
