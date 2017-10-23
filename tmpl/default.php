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
    $images = json_decode($result->images);
?>
<div class="mod-etd-article<?php if (!empty($moduleclass_sfx)) : echo $moduleclass_sfx; endif; ?>">
<?php if ($params->get('show_article_title')) : ?>
    <h3><?php echo htmlspecialchars($result->title, ENT_QUOTES, "UTF-8") ?></h3>
<?php endif; ?>
<?php if ($params->get('show_intro_image') && isset($images->image_intro) && !empty($images->image_intro)) : ?>
    <div class="item-image"><img
            <?php if ($images->image_intro_caption) :
                echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"';
            endif; ?>
                src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_introt_alt); ?>" itemprop="image"></div>
<?php endif; ?>
<?php if ($params->get('show_intro')) : ?>
    <?php echo $result->introtext; ?>
<?php endif; ?>
<?php if ($params->get('show_fulltext_image') && isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
    <div class="item-image"><img
            <?php if ($images->image_fulltext_caption) :
                echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_fulltext_caption) . '"';
            endif; ?>
                src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" itemprop="image"></div>
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