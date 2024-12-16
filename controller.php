<?php

namespace Concrete\Package\HorizontalScrollGallery;

use Concrete\Core\Package\Package;

class Controller extends Package
{
    protected string $pkgHandle = 'horizontal_scroll_gallery';
    protected string $pkgVersion = '0.0.1';
    protected $appVersionRequired = '9.0.0';

    public function getPackageDescription(): string
    {
        return t('A horizontal image scroller gallery template for Concrete CMS.');
    }

    public function getPackageName(): string
    {
        return t('Horizontal Scroll Gallery');
    }
}
