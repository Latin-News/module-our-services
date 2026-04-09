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

$gapClass = 'uk-grid-' . $gridGap;
?>

<div class="mod-ourservices<?php echo $moduleclass_sfx; ?>">
    <?php if ($module->showtitle) : ?>
        <<?php echo $headerTag; ?><?php echo $headerClass ? ' class="' . $headerClass . '"' : ''; ?>>
            <span><?php echo $module->title; ?></span>
        </<?php echo $headerTag; ?>>
    <?php endif; ?>

    <div class="<?php echo $gapClass; ?>" uk-grid>
        <?php if (!empty($processedImage)) : ?>
            <div class="uk-width-1-1">
                <div class="uk-cover-container uk-height-large">
                    <img src="<?php echo htmlspecialchars($processedImage, ENT_QUOTES, 'UTF-8'); ?>"
                        alt="<?php echo Text::_('MOD_OURSERVICES_SERVICES_IMAGE'); ?>"
                        uk-cover>
                    <canvas width="600" height="600"></canvas>
                </div>
            </div>
        <?php endif; ?>

        <div class="uk-width-1-1">
            <div class="uk-grid-small uk-child-width-1-<?php echo $columns; ?>" uk-grid>
                <?php foreach ($processedServices as $service) : ?>
                    <div>
                        <div class="uk-card uk-card-default">
                            <?php if (!empty($service->image)) : ?>
                            <div class="uk-card-media-top uk-text-center uk-padding uk-padding-remove-bottom">
                                <img src="<?php echo htmlspecialchars($service->image, ENT_QUOTES, 'UTF-8'); ?>" class="uk-border-circle" width="120" height="120" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="uk-card-body uk-padding-remove-top">
                                <?php if (!empty($service->title)) : ?>
                                    <h3 class="uk-card-title uk-padding-remove-left uk-margin-remove-right uk-padding">
                                        <?php if (!empty($servicesMenuItemLink)) : ?>
                                            <a href="<?php echo htmlspecialchars($servicesMenuItemLink, ENT_QUOTES, 'UTF-8'); ?>">
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

                                <?php if (!empty($servicesMenuItemLink)) : ?>
                                    <p class="uk-margin-small-top">
                                        <a href="<?php echo htmlspecialchars($servicesMenuItemLink, ENT_QUOTES, 'UTF-8'); ?>"
                                            class="uk-button uk-button-text">
                                            <?php echo Text::_('MOD_OURSERVICES_READ_MORE'); ?>
                                        </a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>