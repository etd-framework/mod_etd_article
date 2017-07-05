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


    public static function getArticle(&$params)
    {
        $id = $params->get('id');
        if(isset($id) && $id!= null)
        // Get the dbo
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*')
              ->from('#__content AS c')
              ->where('c.id = ' . $id);

        $db->setQuery($query);
        $result = $db->loadObject();

        return $result;
    }

}
