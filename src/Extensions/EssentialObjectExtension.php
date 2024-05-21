<?php

namespace minimalic\Essential\Extensions;

use SilverStripe\ORM\DataExtension;

/**
 * Extension for the "DataObject" class.
 * Provides new global DataObject functions.
 *
 * @extends DataExtension<DataObject>
 */
class EssentialObjectExtension extends DataExtension
{

    public function GlobalFunction()
    {
        $className = (new \ReflectionClass($this->owner))->getShortName();
        return 'Hello, ' . $className;
    }

}
