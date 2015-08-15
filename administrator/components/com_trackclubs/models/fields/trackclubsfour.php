<?php
/*------------------------------------------------------------------------
# trackclubsfour.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * Athlete
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * firstname Form Field class for the Trackclubs component
 */
class JFormFieldtrackclubsfour extends JFormFieldList
{
	/**
	 * The firstname field type.
	 *
	 * @var		string
	 */
	protected $type = 'trackclubsfour';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__trackclubs_athlete.id as id, #__trackclubs_athlete.firstname as firstname');
		$query->from('#__trackclubs_athlete');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items){
			foreach($items as $item){
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->firstname));
			};
		};
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>