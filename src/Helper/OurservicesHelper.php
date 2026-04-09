<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ourservices
 *
 * @copyright   Copyright (C) 2026 Russell English. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\Ourservices\Site\Helper;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Helper for mod_ourservices
 *
 * @since  1.0.0
 */
class OurservicesHelper
{
    /**
     * Process and prepare services data
     *
     * @param   array  $services  Raw services data from module parameters
     *
     * @return  array  Processed services data
     *
     * @since   1.0.0
     */
    public static function getServices($services)
    {
        if (empty($services)) {
            return [];
        }

        $processedServices = [];
        $app = Factory::getApplication();

        foreach ($services as $service) {
            // Skip if no title
            if (empty($service->title)) {
                continue;
            }

            $item = new \stdClass();
            $item->title = $service->title;
            $item->description = $service->description ?? '';
            $item->image = self::processImage($service->image ?? '');

            $processedServices[] = $item;
        }

        return $processedServices;
    }

    /**
     * Process image path
     *
     * @param   string  $imagePath  Image path from media field
     *
     * @return  string  Full image URL
     *
     * @since   1.0.0
     */
    public static function processImage($imagePath)
    {
        if (empty($imagePath)) {
            return '';
        }

        // Joomla 5 media fields in subforms store a JSON object — extract imagefile
        if (is_string($imagePath) && str_starts_with(ltrim($imagePath), '{')) {
            $decoded = json_decode($imagePath);
            $imagePath = $decoded->imagefile ?? '';
        } elseif (is_object($imagePath)) {
            $imagePath = $imagePath->imagefile ?? '';
        }

        if (empty($imagePath)) {
            return '';
        }

        // Remove leading slash if present
        $imagePath = ltrim($imagePath, '/');

        // If it's already a full URL, return it
        if (preg_match('#^https?://#', $imagePath)) {
            return $imagePath;
        }

        // Build full URL
        return Uri::root() . $imagePath;
    }

    /**
     * Get menu item link
     *
     * @param   string  $menuItemId  Menu item ID
     *
     * @return  string  Routed menu item URL
     *
     * @since   1.0.0
     */
    public static function getMenuItemLink($menuItemId)
    {
        if (empty($menuItemId)) {
            return '';
        }

        // Build the menu item link
        $link = 'index.php?Itemid=' . (int) $menuItemId;

        return Route::_($link);
    }
}
