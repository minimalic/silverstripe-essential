<?php

namespace minimalic\Essential\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\View\Parsers\URLSegmentFilter;
use SilverStripe\LinkField\Form\MultiLinkField;
use SilverStripe\LinkField\Models\Link;
use minimalic\Fundamental\Modules\ModuleSlideshow;

class LinkExtension extends DataExtension
{
    /**
     * Replaces default theme options
     *
     * @array
     */
    private static array $theme_options = [];

    /**
     * Adds more theme options to the default options
     *
     * @array
     */
    private static array $theme_options_additional = [];

    private static array $db = [
        'Theme' => 'Varchar',
    ];

    private static $defaults = [
        'Theme' => 'primary',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fieldTheme = DropdownField::create('Theme', _t(__CLASS__ . '.Theme', 'Theme'), $this->owner->getThemeOptions());
        $fields->push($fieldTheme);
    }

    /**
     * Returns theme options as combined array if any additional options set by custom config
     *
     * @return array
     */
    public function getThemeOptions()
    {
        $options = $this->owner->config()->get('theme_options');
        $optionsAdditional = $this->owner->config()->get('theme_options_additional');

        // Set default theme options
        if (!$options) {
            $options = [
                'primary' => 'Primary',
                'light' => 'Light',
                'secondary' => 'Secondary',
                'dark' => 'Dark',
            ];
        }

        // Merge additional theme options
        if ($optionsAdditional) {
            $options = array_merge($options, $optionsAdditional);
        }

        return $options;
    }

}
