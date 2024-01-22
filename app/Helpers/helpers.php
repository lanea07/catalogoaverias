<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('toCurrency')) {

    /**
     * Convert a number to its currency representation
     * 
     * @param string | number $value Value to be converted
     * @param string $currency
     * @param integer $fractionDigits Number of decimals to display
     * 
     * @return string Formatted number
     */
    function toCurrency($value, $currency, $fractionDigits = 0)
    {
        $acceptedCurencies = ["COP" => "es_CO"];

        if (!in_array($currency, array_keys($acceptedCurencies)))
            return $value;

        if (!is_numeric($value)) {
            try {
                $value = floatval(str_replace(",", ".", $value));
            } catch (\Throwable $th) {
                return $value;
            }
        }

        $formatter = new NumberFormatter($acceptedCurencies[$currency], NumberFormatter::CURRENCY);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $fractionDigits);
        $formattedNumber = $formatter->format($value);
        return $formattedNumber;
    };
}

if (!function_exists('setActive')) {

    /**
     * Set active class if route is active
     * 
     * @param string $routeName
     */
    function setActive($routeName)
    {
        return request()->routeIs($routeName) ? 'active' : '';
    }
}

if (!function_exists('getGoogleFirstImage')) {

    /**
     * Get first image from google drive
     * 
     * @param string $path
     * 
     * @return string
     */
    function getGooglefirstImage($path)
    {
        if ($path && Storage::disk('google')->exists($path)) {
            $files = Storage::disk('google')->files($path);
            return base64_encode(Storage::disk('google')->get($files[0]));
        }
        return url('/images/No_image_available.png');
    }
}

if (!function_exists('calculateDiscount')) {

    /**
     * Calculate discount based on days passed
     * 
     * @param integer $cost
     * @param integer $days_passed
     * 
     * @return string
     */
    function calculateDiscount($cost, $days_passed, $custom_discount): string
    {
        $discount = 0;
        if ($custom_discount) {
            return $discount = NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format($custom_discount / 100);
        }
        switch ($days_passed) {

            case ($days_passed >= 0 && $days_passed <= 30):
                $discount = NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(0);
                break;

            case ($days_passed > 30 && $days_passed <= 60):
                $discount = NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($cost * 0.3) / $cost);
                break;

            case ($days_passed > 60 && $days_passed <= 90):
                $discount = NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($cost * 0.5) / $cost);
                break;

            case ($days_passed >= 90):
                $discount = NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($cost * 0.8) / $cost);
                break;
        }
        return $discount;
    }
}

if (!function_exists('calculateCostWithDiscount')) {

    /**
     * Calculate cost with discount based on days passed
     * 
     * @param integer $cost
     * @param integer $days_passed
     * @param integer $custom_discount
     * 
     * @return string
     */
    function calculateCostWithDiscount($cost, $days_passed, $custom_discount)
    {
        $newCost = 0;
        if ($custom_discount) {
            return $newCost = toCurrency($cost * (1 - $custom_discount / 100), "COP");
        }
        switch ($days_passed) {
            case ($days_passed >= 0 && $days_passed <= 30):
                $newCost = toCurrency($cost, "COP");
                break;
            case ($days_passed > 30 && $days_passed <= 60):
                $newCost = toCurrency($cost * 0.7, "COP");
                break;
            case ($days_passed > 60 && $days_passed <= 90):
                $newCost = toCurrency($cost * 0.5, "COP");
                break;
            case ($days_passed >= 90):
                $newCost = toCurrency($cost * 0.2, "COP");
                break;
        }
        return $newCost;
    }
}
