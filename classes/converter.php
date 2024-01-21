<?php

class ObjectConverter
{
    public static function toProperties($object, $prefix = '')
    {
        $properties = '';

        foreach ((array)$object as $key => $value) {
            $currentKey = $prefix . $key;

            if (is_array($value) || is_object($value)) {
                $properties .= self::toProperties($value, $currentKey . '.');
            } else {
                $properties .= "$currentKey=$value\n";
            }
        }

        return $properties;
    }

    public static function toJson($object)
    {
        return json_encode($object, JSON_PRETTY_PRINT);
    }
}


// $propertiesString = ObjectConverter::toProperties($sampleObject);
// echo "Properties:\n$propertiesString\n";


// $jsonString = ObjectConverter::toJson($sampleObject);
// echo "JSON:\n$jsonString\n";

// $json_str = file_get_contents("quiz.json");
// $decoded = json_decode($json_str, true);

// var_dump(ObjectConverter::toProperties($decoded));

?>