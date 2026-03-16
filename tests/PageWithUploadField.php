<?php

namespace Symbiote\ContextAwareUpload\Tests;

use Override;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Dev\TestOnly;

class PageWithUploadField extends SiteTree implements TestOnly
{
    private static $table_name = 'PageWithUploadField';

    private static $has_one = [
        'MyUploadFieldTest' => Image::class,
    ];

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Images', UploadField::create('MyUploadFieldTest', 'MyUploadFieldTest'));
        return $fields;
    }
}
