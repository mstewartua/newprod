<?php
/*------------------------------------------------------------------------
# trackclubstwo.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * athleteid Form Field class for the Trackclubs component
 */
class JFormFieldtrackclubstwo extends JFormFieldList
{
	/**
	 * The athleteid field type.
	 *
	 * @var		string
	 */
	protected $type = 'trackclubstwo';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__trackclubs_result.id as id, #__trackclubs_result.athleteid as athleteid');
		$query->from('#__trackclubs_result');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items){
			foreach($items as $item){
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->athleteid));
			};
		};
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>