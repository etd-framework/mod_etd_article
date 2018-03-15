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

$moduleclass_sfx   = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$result            = ModEtdArticleHelper::getArticle($params);
$dispatcher        = JEventDispatcher::getInstance();

if ($result) {

    if ($params->def('prepare_content', 1)) {
        JPluginHelper::importPlugin('content');
        $dispatcher->trigger('onContentPrepare', array ('com_content.article', &$result, &$params));
        $result->introtext = JHtml::_('content.prepare', $result->introtext, '', 'mod_etd_article.introtext');
    }

    if ($params->def('seo_etd', 1)) {
        $result->title = str_replace(['[SEO]', '[/SEO]', '[BR]'], ['<span class="sr-only">', '</span>', ''], $result->title);
    }
}

require JModuleHelper::getLayoutPath('mod_etd_article', $params->get('layout', 'default'));
