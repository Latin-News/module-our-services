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

// Calculate grid width class based on columns
$widthClass = 'uk-child-width-1-' . $columns . '@m';
$gapClass = 'uk-grid-' . $gridGap;
?>

<div class="mod-ourservices<?php echo $moduleclass_sfx; ?>">
    <div class="uk-grid <?php echo $widthClass; ?> <?php echo $gapClass; ?> uk-child-width-1-1" uk-grid>
        <?php foreach ($processedServices as $service) : ?>
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-grid-small uk-child-width-expand@s uk-flex-middle" uk-grid>
                        <?php if (!empty($service->image)) : ?>
                            <div class="uk-width-auto@s uk-flex-first">
                                <div class="uk-card-media-left uk-cover-container">
                                    <img src="<?php echo htmlspecialchars($service->image, ENT_QUOTES, 'UTF-8'); ?>"
                                         alt="<?php echo htmlspecialchars($service->title, ENT_QUOTES, 'UTF-8'); ?>"
                                         uk-cover>
                                    <canvas width="300" height="300"></canvas>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div>
                            <div class="uk-card-body">
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
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
