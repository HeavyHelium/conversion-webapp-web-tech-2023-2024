<?php

class PropertiesParser
{
    public static function parseFile($filename)
    {
        $str = file_get_contents($filename);

        if(!file_exists($filename)) {
            throw new \InvalidArgumentException("File not found: $filename");
        }
        
        $str = file_get_contents($filename);

        // check if file content retrieval was successful
        if ($str === false) {
            throw new \RuntimeException("Failed to read file: $filename");
        }

        return PropertiesParser::parseString($str);
    }
    public static function parseString($data)
    {
        $lines = explode("\n", $data);
        $result = [];
        $current = null;

        foreach ($lines as $line) {
            $line = trim($line);

            // ignore comments
            if (empty($line) || $line[0] === '#') {
                continue;
            }

            list($key, $value) = explode('=', $line, 2) + [NULL, NULL];
            $key = trim($key);
            $value = trim($value);

            // nested properties
            $keys = explode('.', $key);
            $current = &$result;

            foreach ($keys as $nestedKey) {
                if (!isset($current[$nestedKey])) {
                    $current[$nestedKey] = [];
                }
                $current = &$current[$nestedKey];
            }

            // finally assign
            $current = $value;
        }

        return $result;
    }
}

// $str = file_get_contents("quiz.properties"); 

// $propertiesData = PropertiesParser::parseFile("quiz.properties");


// var_dump($propertiesData);

?>