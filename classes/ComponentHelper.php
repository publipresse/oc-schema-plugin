<?php namespace Publipresse\Schema\Classes;

/**
 * Provides helper methods for Schema components.
 *
 * @package publipresse\schema
 * @author Publipresse
 */
class ComponentHelper
{
    public static function getDynamicProperties($component, $page)
    {
        foreach($component->getProperties() as $fieldName => $property) {
            if(!empty($component->paramName($fieldName))) {
                $explode = explode('.', $component->paramName($fieldName));
                $chain = 'return $page';
                foreach($explode as $key => $item) {
                    $chain .= '->'.$item;
                }
                $chain .= ';';
                $dynamicProperties[$fieldName] = eval($chain);
            } else {
                $dynamicProperties[$fieldName] = $property;
            }
        }
        return $dynamicProperties;
    }

    public static function groupProperties($properties) {
        foreach($properties as $key => $property) {
            $parentKey = substr($key, -1);
            $childKey = substr($key, 0, -1);
            $groupedProperties[$parentKey][$childKey] = $property;
        }
        return $groupedProperties;
    }

    public static function convertToArray($field) {
        if(!is_iterable($field)) {
            $field = explode(PHP_EOL, strip_tags($field));
            // Find a way to filter most unwanted things.
            $field = array_filter($field, function($line) {
                $filtered = preg_replace( '/[\W]/', '', $line);
                if(!empty($filtered)) {
                    return true;
                }
            });
        }
        return $field;
    }

}
