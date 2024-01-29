<?php
include_once("../classes/writing_script_converter.php");

// var_dump(getcwd());


class Transformer {

    static function apply_transform($assoc_array, $key, 
                                    $transform_callback, 
                                    $key_apply=true, $value_apply=false) {

        if ($value_apply && (is_array($assoc_array[$key]) || is_object($assoc_array[$key]))) {
            $assoc_array[$key] = self::apply_transform_all($assoc_array[$key], $transform_callback);
        } else if ($value_apply) {
            $assoc_array[$key] = is_string($assoc_array[$key]) ? $transform_callback($assoc_array[$key]) : $assoc_array[$key];
        }
        if($key_apply) {
            $key1 = $transform_callback($key); // key is always string
            $assoc_array[$key1] = $assoc_array[$key];
            if($key1 != $key) { unset($assoc_array[$key]); };
        }
        

        return $assoc_array;
    }
    static function apply_transform_all($assoc_array, $transform_callback) {
        if (is_array($assoc_array) || is_object($assoc_array)) {
            foreach ($assoc_array as $k => $v) {
                $new_key = $transform_callback($k);
                $assoc_array[$new_key] = self::apply_transform_all($v, $transform_callback);
                if($new_key != $k) unset($assoc_array[$k]);
            }
        } else {
            $assoc_array = is_string($assoc_array) ? $transform_callback($assoc_array) : $assoc_array;
        }
        return $assoc_array;
        
    }
}

// transform.0.type = to_shlyokavica
// transform.0.all = true 
// vs
// transform.0.type = to_shlyokavica
// transform.0.key = име
// transform.0.key_apply = true
// transform.0.value_apply = true



function applyTransformations($data, $trans) {
    $trans_types = ['to_shlyokavica', 'to_cyrillics', 'to_uppercase', 'to_lowercase'];
    foreach ($trans as $t) {

        if (!isset($t['type'])) {
            throw new \InvalidArgumentException("Transformation type not set!");
        } else if (!isset($t['key']) && !isset($t['all'])) {
            throw new \InvalidArgumentException("Transformation key unknown!");
        } else if(!in_array($t['type'], $trans_types)) {
            throw new \InvalidArgumentException("Transformation type unknown!");
        }
        $trans_type = $t['type'];
        $key = $t['key'];

        if (isset($t['all']) && $t['all']) {
            $data = Transformer::apply_transform_all($data, $trans_type);
            continue;
        }

        if(!isset($t['key_apply']) && !isset($t['value_apply'])) {
            var_dump($data);
            $data = Transformer::apply_transform($data, $key, $trans_type, $key_apply=true, $value_apply=true);
        } else {
            $key_apply = isset($t['key_apply']) ? $t['key_apply'] == "true" : false;
            $value_apply = isset($t['value_apply']) ? $t['value_apply'] == "true" : false;
            $data = Transformer::apply_transform($data, $key, $trans_type, $key_apply, $value_apply);
        }
    }
    return $data;
}
// $data = array(
//     'име' => 'Иван Георгиев',
//     'възраст' => 30,
//     'град' => 'Кюстендил',
//     'адрес' => array(
//         'улица' => 'Цар Освободител 11',
//         'код' => '1111'
//     )
// );

// $transformations = array(
//     // array(
//     //     'type' => 'to_shlyokavica',
//     //     'key' => 'име',
//     //     'key_apply' => false,
//     //     'value_apply' => true
//     // ),
//     array(
//         'type' => 'to_shlyokavica',
//         'key' => 'адрес',
//         'key_apply' => true,
//         'value_apply' => true
//     ),
//     // array(
//     //     'type' => 'to_shlyokavica',
//     //     'key' => 'улица',
//     //     'key_apply' => true,
//     //     'value_apply' => true
//     // ),
//     // array(
//     //     'type' => 'to_shlyokavica',
//     //     'key' => 'код',
//     //     'key_apply' => true,
//     //     'value_apply' => true
//     // ),
//     // array(
//     //     'type' => 'to_shlyokavica',
//     //     'key' => 'град',
//     //     'key_apply' => true,
//     //     'value_apply' => true
//     // ),
//     // array(
//     //     'type' => 'to_shlyokavica',
//     //     'key' => 'възраст',
//     //     'key_apply' => true,
//     //     'value_apply' => true
//     // )
// );

// // var_dump(Transformer::apply_transform($data, 'име', 'to_shlyokavica', $key_apply=false, $value_apply=true));
// // var_dump(Transformer::apply_transform_all($data, 'to_shlyokavica'));
// // var_dump(Transformer::apply_transform_all(Transformer::apply_transform_all($data, 'to_shlyokavica'), 'to_cyrillics'));
// var_dump(applyTransformations($data, $transformations));


?>