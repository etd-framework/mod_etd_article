<?php
/**
 * @package     ETDSolutions
 * @subpackage  mod_etd_article
 *
 * @copyright   ETD Solutions 2017. Tous droits réservés.
 * @license
 */

defined('_JEXEC') or die;

JLoader::register('ContentHelperRoute', JPATH_SITE . '/components/com_content/helpers/route.php');

/**
 * Helper for mod_etd_article
 *
 * @package     ETDSolutions
 * @subpackage  mod_etd_article
 * @since       1.0.0
 */
class ModEtdArticleHelper {

    public static function getArticle(&$params) {

        $id = $params->get('id');

        if (!empty($id)) {

            $db    = JFactory::getDbo();
            $query = $db->getQuery(true);

            $query->select('a.id, a.alias, a.title, a.introtext, a.state, a.catid, a.language, a.images, ' . $query->length('a.fulltext') . ' AS readmore')
                  ->from('#__content AS a')
                  ->where('a.id = ' . $id);

            $db->setQuery($query);
            $item = $db->loadObject();

            if (isset($item)) {
                $item->slug = $item->alias ? ($item->id . ':' . $item->alias) : $item->id;

                return $item;
            }

        }

        return false;
    }

}