<?php
/**
 * @package     ETDSolutions
 * @subpackage  mod_etd_article
 *
 * @copyright   ETD Solutions 2017. Tous droits réservés.
 * @license
 */

defined('_JEXEC') or die;
?>
<div class="mod-etd-article<?php if (!empty($moduleclass_sfx)) : echo htmlspecialchars($moduleclass_sfx, ENT_QUOTES, "UTF-8") endif; ?>">
<?php if ($params->get('show_article_title')) : ?>
    <h3><?php echo htmlspecialchars($result->title, ENT_QUOTES, "UTF-8") ?></h3>
<?php endif; ?>
<?php if ($params->get('show_intro')) : ?>
    <div class="content">
        <?php echo $result->introtext; ?>
        <?php if ($params->get('show_readmore') && $result->readmore) :
            $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
            echo JLayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link));
        endif; ?>
    </div>
<?php endif; ?>

</div>