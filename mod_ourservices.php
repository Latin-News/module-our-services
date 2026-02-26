<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ourservices
 *
 * @copyright   Copyright (C) 2026 Russell English. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\Ourservices\Site\Helper\OurservicesHelper;

// Get module parameters
$services = $params->get('services', []);
$columns = $params->get('columns', 3);
$gridGap = $params->get('grid_gap', 'medium');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', ''), ENT_COMPAT, 'UTF-8');

// Process services data
$processedServices = OurservicesHelper::getServices($services);

// Require the template
require ModuleHelper::getLayoutPath('mod_ourservices', $params->get('layout', 'default'));
