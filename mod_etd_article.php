<?php
/**
 * @package     ETDSolutions
 * @subpackage  mod_etd_article
 *
 * @copyright   ETD Solutions 2017. Tous droits réservés.
 * @license
 */

defined('_JEXEC') or die;

// Include the archive functions only once
JLoader::register('ModEtdArticleHelper', __DIR__ . '/helper.php');

$params->def('count', 10);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$result            = ModEtdArticleHelper::getArticle($params);

require JModuleHelper::getLayoutPath('mod_etd_article', $params->get('layout', 'default'));