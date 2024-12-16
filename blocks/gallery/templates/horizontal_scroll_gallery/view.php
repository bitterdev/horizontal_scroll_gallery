<?php

defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Block\Gallery\Controller;
use Concrete\Core\Entity\File\File;
use Concrete\Core\Entity\File\Version;
use Concrete\Core\Page\Page;
use Concrete\Core\Localization\Localization;
use Imagine\Image\BoxInterface;
use Imagine\Image\ImageInterface;

/** @var Controller $controller */
/** @var bool $includeDownloadLink */
/** @var int $bID */

$page = $controller->getCollectionObject();
$images = $images ?? [];

$c = Page::getCurrentPage();
?>

<?php if ($c instanceof Page && $c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item">
        <?php $loc = Localization::getInstance(); ?>
        <?php $loc->pushActiveContext(Localization::CONTEXT_UI); ?>
        <?php echo t('Gallery Block disabled in edit mode.') ?>
        <?php $loc->popActiveContext(); ?>
    </div>
<?php } else { ?>
    <div class="horizontal-scroll-gallery">
        <div class="section">
            <?php foreach ($images as $image) { ?>
                <?php /** @var File $image */ ?>

                <?php if ($image['file'] != null) { ?>
                    <?php $fileVersion = $image['file']->getApprovedVersion(); ?>
                    <?php if ($fileVersion instanceof Version) { ?>
                        <?php
                        $extraCss = null;

                        if ($fileVersion->getImagineImage() instanceof ImageInterface) {
                            $box = $fileVersion->getImagineImage()->getSize();

                            if ($box instanceof BoxInterface) {
                                $extraCss = "; aspect-ratio: " . $box->getWidth() . " / " . $box->getHeight() . " !important;";
                            }
                        }
                        ?>
                        <div class="panel"
                             style="background-image: url('<?php echo h($fileVersion->getURL()); ?>') <?php echo $extraCss; ?>"></div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
<?php } ?>