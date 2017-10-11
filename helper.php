<?php
/**
 * @package     ETDSolutions
 * @subpackage  mod_etd_article
 *
 * @copyright   ETD Solutions 2017. Tous droits réservés.
 * @license
 */

defined('_JEXEC') or die;

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

            $query->select('a.id, a.title, a.introtext, ' . $query->length('a.fulltext') . ' AS readmore')
                  ->from('#__content AS a')
                  ->where('a.id = ' . $id);

            $db->setQuery($query);
            return $db->loadObject();


        }

        return false;
    }

}
