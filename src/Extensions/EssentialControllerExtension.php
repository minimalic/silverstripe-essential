<?php

namespace minimalic\Essential\Extensions;

use SilverStripe\Core\Extension;

// use SilverStripe\ORM\DataExtension;
// use SilverStripe\ORM\ArrayList;
// use SilverStripe\CMS\Model\SiteTree;
// use SilverStripe\Forms\FieldList;
// use SilverStripe\Forms\CheckboxField;

/**
 * Extension for the "ContentController" class.
 * Provides new Controller functions.
 *
 * @extends Extension<ContentController>
 */
class EssentialControllerExtension extends Extension
{

    public function PageFunction()
    {
        $className = (new \ReflectionClass($this->owner))->getShortName();
        return 'Hi, ' . $className;
    }

}
