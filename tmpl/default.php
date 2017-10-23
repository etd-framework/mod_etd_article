<?php
/**
 * @package     ETDSolutions
 * @subpackage  mod_etd_article
 *
 * @copyright   ETD Solutions 2017. Tous droits réservés.
 * @license
 */

defined('_JEXEC') or die;

if ($result) :
?>
<div class="mod-etd-article<?php if (!empty($moduleclass_sfx)) : echo $moduleclass_sfx; endif; ?>">
<?php if ($params->get('show_article_title')) : ?>
    <h3><?php echo htmlspecialchars($result->title, ENT_QUOTES, "UTF-8") ?></h3>
<?php endif; ?>
<?php if ($params->get('show_intro')) : ?>
    <?php echo $result->introtext; ?>
<?php endif; ?>
<?php if ($params->get('show_readmore') && $result->readmore) : ?>
    <?php $direction = JFactory::getLanguage()->isRtl() ? 'left' : 'right'; ?>
    <p class="readmore">
    <?php if ($params->get('show_readmore_title', 0) == 0) : ?>
        <a class="btn" href="<?php echo $link; ?>" itemprop="url" aria-label="<?php echo JText::_('MOD_ETD_ARTICLE_READ_MORE'); ?> <?php echo htmlspecialchars($result->title, ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo '<span class="icon-chevron-' . $direction . '" aria-hidden="true"></span>'; ?>
            <?php echo JText::sprintf('MOD_ETD_ARTICLE_READ_MORE_TITLE'); ?>
        </a>
    <?php else : ?>
        <a class="btn" href="<?php echo $link; ?>" itemprop="url" aria-label="<?php echo JText::_('MOD_ETD_ARTICLE_READ_MORE'); ?> <?php echo htmlspecialchars($result->title, ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo '<span class="icon-chevron-' . $direction . '" aria-hidden="true"></span>'; ?>
            <?php echo JText::_('MOD_ETD_ARTICLE_READ_MORE'); ?>
            <?php echo JHtml::_('string.truncate', $result->title, JComponentHelper::getParams('com_content')->get('readmore_limit', 100)); ?>
        </a>
    <?php endif; ?>
    </p>
    <?php endif; ?>
</div>
<?php endif; ?>