<?php

$cyrillics = "абвгдежзийклмнопрстуфхцчшщьъюя";
$cyrillics .= mb_strtoupper($cyrillics);
$almost_shl = "abvgdejziyklmnoprstufhc46-uy-q";
$almost_shl .= mb_strtoupper($almost_shl);

assert(mb_strlen($cyrillics) == mb_strlen($almost_shl));

$sh_dict = array_combine(mb_str_split($cyrillics), str_split($almost_shl));

$sh_dict["щ"] = "6t";
$sh_dict["Щ"] = "6t";
$sh_dict["ю"] = "yu";
$sh_dict["Ю"] = "Yu";
$sh_dict["ц"] = "ts";
$sh_dict["Ц"] = "Ts";

function to_uppercase($string) {
    return mb_strtoupper($string);
}

function to_lowercase($string) {
    return mb_strtolower($string);
}

function to_shlyokavica($string) {
    global $sh_dict;
    $shlyokavica = "";
    foreach(mb_str_split($string) as $char) {
        if(array_key_exists($char, $sh_dict)) {
            $shlyokavica .= $sh_dict[$char];
        } else {
            $shlyokavica .= $char;
        }
    }
    return $shlyokavica;
}


function to_cyrillics($text) {
    $shlyokavista_to_cyrillic_mapping = [
        'sht' => 'щ',
        'Sht' => 'щ',
        '6t' => 'щ',
        'sh' => 'ш',
        'Sh' => 'Ш',
        'ts' => 'ц',
        'Ts' => 'Ц',
        'ch' => 'ч',
        'Ch' => 'Ч',
        'yu' => 'ю',
        'Yu' => 'Ю',
        'ya' => 'я',
        'Ya' => 'Я',
        'zh' => 'ж',
        'Zh' => 'Ж'
    ];

    $literal_translation_mapping = [
        'a' => 'а', 'b' => 'б', 'c' => 'ц',
        'd' => 'д', 'e' => 'е', 'f' => 'ф',
        'g' => 'г', 'h' => 'х', 'i' => 'и',
        'j' => 'й', 'k' => 'к', 'l' => 'л',
        'm' => 'м', 'n' => 'н', 'o' => 'о',
        'p' => 'п', 'q' => 'я', 'r' => 'р',
        's' => 'с', 't' => 'т', 'u' => 'у',
        'v' => 'в', 'w' => 'в', 'x' => 'кс',
        'z' => 'з', 'y' => 'й',
        'A' => 'А', 'B' => 'Б', 'C' => 'Ц',
        'D' => 'Д', 'E' => 'Е', 'F' => 'Ф',
        'G' => 'Г', 'H' => 'Х', 'I' => 'И',
        'J' => 'Й', 'K' => 'К', 'L' => 'Л',
        'M' => 'М', 'N' => 'Н', 'O' => 'О',
        'P' => 'П', 'Q' => 'Я', 'R' => 'Р',
        'S' => 'С', 'T' => 'Т', 'U' => 'У',
        'V' => 'В', 'W' => 'В', 'X' => 'КС',
        'Y' => 'Й', 'Z' => 'З',
    ];


    foreach ($shlyokavista_to_cyrillic_mapping as $pattern => $replacement) {
        $text = str_replace($pattern, $replacement, $text);
    }

    $translated_text = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (isset($literal_translation_mapping[$char])) {
            $translated_text .= $literal_translation_mapping[$char];
        } else {
            $translated_text .= isset($shlyokavista_to_cyrillic_mapping[$char]) ? $shlyokavista_to_cyrillic_mapping[$char] : $char;
        }
    }


    return $translated_text;
}

// echo to_shlyokavica("мда, за големи букви още не работи този скрипт. Глупости, бачка си! 42");

?>
