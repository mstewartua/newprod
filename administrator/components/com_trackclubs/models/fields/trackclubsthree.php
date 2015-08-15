<?php
/*------------------------------------------------------------------------
# trackclubsthree.php - TrackClub Component
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
 * lastname Form Field class for the Trackclubs component
 */
class JFormFieldtrackclubsthree extends JFormFieldList
{
	/**
	 * The lastname field type.
	 *
	 * @var		string
	 */
	protected $type = 'trackclubsthree';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__trackclubs_member.id as id, #__trackclubs_member.lastname as lastname');
		$query->from('#__trackclubs_member');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items){
			foreach($items as $item){
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->lastname));
			};
		};
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>