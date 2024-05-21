<?php

namespace minimalic\Essential\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Core\Convert;
// use SilverStripe\Core\ClassInfo;

/**
 * Extension for the "DataObject" class.
 * Provides new global DataObject functions.
 *
 * @extends DataExtension<DataObject>
 */
class EssentialObjectExtension extends DataExtension
{

    /**
     * Converts ArrayList to Array
     *
     * @param ArrayList
     *
     * @return Array
     */
    public static function ArrayListToArray($arrayList)
    {
        $array = [];
        foreach ($arrayList as $item) {
            $array[$item->Key] = $item->Value;
        }
        return $array;
    }

    public static function ConvertToSegment($title) {
        // $filter = URLSegmentFilter::create();
        // $filter->setReplacements(['/[\/]/' => '-']);
        // print_r($filter->getReplacements());
        // $segment = $filter->filter($title);
        $title = preg_replace('/\//', '-', $title);
        $segment = Convert::raw2url($title);

        return $segment;
    }

    // public static function ShortClassName($class)
    // {
    //     $shortName = ClassInfo::shortName($class);
    //     return $shortName;
    // }

    /**
     * Generates url-friendly class name
     *
     * @return String
     */
    public function getClassNameForTemplate()
    {
        $className = (new \ReflectionClass($this->owner))->getShortName();
        $className = $this->ConvertToSegment($className);
        return $className;
    }

    /**
     * Generates url-friendly class name with ID number
     *
     * @return String
     */
    public function getClassNameIDForTemplate()
    {
        $className = $this->getClassNameForTemplate() . '-' . $this->owner->ID;
        return $className;
    }

}
