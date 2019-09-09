<?php

function between_validator($number, array $array, bool $isStrict = true): bool {

    if (count($array) != 2)
        return false;

    foreach ($array as $num) {
        if (!is_numeric($num))
            return false;
    }

    sort($array);

    list($min, $max) = $array;

    if ($isStrict && ( $number == $min || $number == $max ))
        return true;

    if ( $number > $min && $number < $max)
        return true;
    else
        return false;
};

function digit_validator($number): bool {
    return is_numeric($number);
};

function email_validator($email, $host = null): bool {
    $email = trim($email);

    $isEmail = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isEmail = true;

        //domain validation
        if ($host) {
            $exploded_email = explode('@', $email);
            if (!strcmp($exploded_email[1], $host)) return true;
                else $isEmail = false;
        }
    }
    return $isEmail;
};

function string_length_validator($str, int $minlength, int $maxlength): bool {
    $length = strlen($str);
    if ( ($length >= $minlength) && ($length <= $maxlength) )
        return true;
    else
        return false;
};

function in_validator($value, array $array): bool {
     return in_array($value, $array);
};

function identical_validator($first_value, $second_value): bool {
    return !strcmp($first_value, $second_value);
};

function uri_validator($url): bool {
    return filter_var($url, FILTER_VALIDATE_URL);
};

function not_empty_validator($value): bool {
    return !empty($value);
}

function date_validator($date): bool {
    return strtotime($date);
}

?>




