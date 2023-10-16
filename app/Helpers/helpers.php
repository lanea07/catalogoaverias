<?php

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

    function setActive($routeName)
    {
        return request()->routeIs($routeName) ? 'active' : '';
    }
}
