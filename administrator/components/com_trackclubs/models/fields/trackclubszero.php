<?php
/*------------------------------------------------------------------------
# trackclubszero.php - TrackClub Component
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
 * clubname Form Field class for the Trackclubs component
 */
class JFormFieldtrackclubszero extends JFormFieldList
{
	/**
	 * The clubname field type.
	 *
	 * @var		string
	 */
	protected $type = 'trackclubszero';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__trackclubs_trackclub.id as id, #__trackclubs_trackclub.clubname as clubname');
		$query->from('#__trackclubs_trackclub');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items){
			foreach($items as $item){
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->clubname));
			};
		};
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>