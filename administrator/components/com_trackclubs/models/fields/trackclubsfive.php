<?php
/*------------------------------------------------------------------------
# trackclubsfive.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * Group Run
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * runname Form Field class for the Trackclubs component
 */
class JFormFieldtrackclubsfive extends JFormFieldList
{
	/**
	 * The runname field type.
	 *
	 * @var		string
	 */
	protected $type = 'trackclubsfive';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__trackclubs_grouprun.id as id, #__trackclubs_grouprun.runname as runname');
		$query->from('#__trackclubs_grouprun');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items){
			foreach($items as $item){
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->runname));
			};
		};
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>