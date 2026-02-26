<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ourservices
 *
 * @copyright   Copyright (C) 2026 Russell English. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

// No services to display
if (empty($processedServices)) {
    return;
}

// Get the first image from any service
$firstImage = '';
foreach ($processedServices as $service) {
    if (!empty($service->image)) {
        $firstImage = $service->image;
        break;
    }
}

$gapClass = 'uk-grid-' . $gridGap;
?>

<div class="mod-ourservices<?php echo $moduleclass_sfx; ?>">
    <div class="uk-grid uk-child-width-1-2@m uk-child-width-1-1 <?php echo $gapClass; ?>" uk-grid>
        <?php if (!empty($firstImage)) : ?>
            <div class="uk-flex-first uk-flex-last@s">
                <div class="uk-cover-container uk-height-large">
                    <img src="<?php echo htmlspecialchars($firstImage, ENT_QUOTES, 'UTF-8'); ?>"
                         alt="<?php echo Text::_('MOD_OURSERVICES_SERVICES_IMAGE'); ?>"
                         uk-cover>
                    <canvas width="600" height="600"></canvas>
                </div>
            </div>
        <?php endif; ?>

        <div>
            <div class="uk-grid-small uk-child-width-1-1" uk-grid>
                <?php foreach ($processedServices as $service) : ?>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <?php if (!empty($service->title)) : ?>
                                <h3 class="uk-card-title">
                                    <?php if (!empty($service->link)) : ?>
                                        <a href="<?php echo htmlspecialchars($service->link, ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php echo htmlspecialchars($service->title, ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo htmlspecialchars($service->title, ENT_QUOTES, 'UTF-8'); ?>
                                    <?php endif; ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($service->description)) : ?>
                                <div class="uk-text-muted">
                                    <?php echo $service->description; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($service->link)) : ?>
                                <p class="uk-margin-small-top">
                                    <a href="<?php echo htmlspecialchars($service->link, ENT_QUOTES, 'UTF-8'); ?>"
                                       class="uk-button uk-button-text">
                                        <?php echo Text::_('MOD_OURSERVICES_READ_MORE'); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
