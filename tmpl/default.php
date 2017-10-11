<?php
/**
 * @package     ETDSolutions
 * @subpackage  mod_etd_article
 *
 * @copyright   ETD Solutions 2017. Tous droits réservés.
 * @license
 */

defined('_JEXEC') or die;

$component_params = JComponentHelper::getParams('com_content');

$params->set('access-view', true);
$params->set('readmore_limit', $component_params->get('readmore_limit', 100));

if ($result && $result->state == "1") :
?>
<div class="mod-etd-article<?php if (!empty($moduleclass_sfx)) : echo $moduleclass_sfx; endif; ?>">
<?php if ($params->get('show_article_title')) : ?>
    <h3><?php echo htmlspecialchars($result->title, ENT_QUOTES, "UTF-8") ?></h3>
<?php endif; ?>
<?php if ($params->get('show_intro')) : ?>
    <?php echo $result->introtext; ?>
<?php endif; ?>
<?php if ($params->get('show_readmore') && $result->readmore) :
    $link = JRoute::_(ContentHelperRoute::getArticleRoute($result->slug, $result->catid, $result->language));
    echo JLayoutHelper::render('joomla.content.readmore', array('item' => $result, 'params' => $params, 'link' => $link));
endif; ?>
</div>
<?php endif; ?>