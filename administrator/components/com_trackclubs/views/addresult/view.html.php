<?php
/*------------------------------------------------------------------------
# view.html.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * add result
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * add result View
 */
class TrackclubsViewaddresult extends JViewLegacy
{
	/**
	 * display method of add result view
	 * @return void
	 */
	public function display($tpl = null)
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');

		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		};

		// Assign the variables
		$this->form = $form;
		$this->item = $item;
		$this->script = $script;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}


	/**
	 * Setting the toolbar
	 */
	protected function addToolBar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);
		$user = JFactory::getUser();
		$userId	= $user->id;
		$isNew = $this->item->id == 0;
		$canDo = TrackclubsHelper::getActions($this->item->id);
//		JToolBarHelper::title($isNew ? JText::_('Race :: New') : JText::_('Race :: Edit'), 'race');
		JToolBarHelper::title($isNew ? JText::_('Add Result :: New') : JText::_('Add Results File'), 'addresult');
		// Built the actions for new and existing records.
		if ($isNew){
			// For new records, check the create permission.
//			if ($canDo->get('core.create')){
//				JToolBarHelper::apply('race.apply', 'JTOOLBAR_APPLY');
//				JToolBarHelper::save('race.save', 'JTOOLBAR_SAVE');
//				JToolBarHelper::custom('race.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
//			};
			if ($canDo->get('core.create')){
//				JToolBarHelper::apply('race.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::apply('addresult.apply', 'JTOOLBAR_APPLY');
//				JToolBarHelper::save('race.save', 'JTOOLBAR_SAVE');
//				JToolBarHelper::custom('race.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			};
//			JToolBarHelper::cancel('race.cancel', 'JTOOLBAR_CANCEL');
			JToolBarHelper::cancel('addresult.cancel', 'JTOOLBAR_CANCEL');
		} else {
			if ($canDo->get('core.edit')){
				// We can save the new record
                                
                                // Save
//				JToolBarHelper::apply('race.apply', 'JTOOLBAR_APPLY');
                                
                                //save and close
//				JToolBarHelper::save('race.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::save('addresult.save', 'JTOOLBAR_SAVE');
                                JToolBarHelper::custom('addresult.load', 'generic.png', 'generic.png', 'Preview', false, false);
				// We can save this record, but check the create permission to see
				// if we can return to make a new one.
                                
                                // save and new
//				if ($canDo->get('core.create')){
//					JToolBarHelper::custom('race.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
//				};
			};
                        //save as copy
//			if ($canDo->get('core.create')){
//				JToolBarHelper::custom('race.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
//			};
//			JToolBarHelper::cancel('race.cancel', 'JTOOLBAR_CLOSE');
			JToolBarHelper::cancel('addresult.cancel', 'JTOOLBAR_CLOSE');
		};
	}

	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument()
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
//		$document->setTitle($isNew ? JText::_('Race :: New :: Administrator') : JText::_('Race :: Edit :: Administrator'));
		$document->setTitle($isNew ? JText::_('Add Results :: Administrator') : JText::_('Add Results :: Administrator'));
		$document->addScript(JURI::root() . $this->script);
//		$document->addScript(JURI::root() . "administrator/components/com_trackclubs/views/race/submitbutton.js");
		$document->addScript(JURI::root() . "administrator/components/com_trackclubs/views/addresult/submitbutton.js");
		JText::script('race not acceptable. Error');
	}
}
?>