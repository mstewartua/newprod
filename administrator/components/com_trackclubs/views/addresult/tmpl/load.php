<?php
/*------------------------------------------------------------------------
# load.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * Add result
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
$params = $this->form->getFieldsets('params');
$componentParams = JComponentHelper::getParams('com_trackclubs');

?>
<style type="text/css">
	.full, .thumb { border: 1px solid #CCC; float: left; margin: 0 10px 0 0; padding: 10px; }
	.full h2, .thumb h2 { margin: 0; padding: 0; }
</style>

<script type="text/javascript">
    $(function () {
        $('.footable').footable();
    });
//    $(function () {
//        $('footable').footable({
//             toggleHTMLElement: '<span><img src="components/com_trackclubs/assets/img/plus.png" class="footable-toggle footable-expand" border="0" alt="Expand">'
//             + '<img src="components/com_trackclubs/assets/img/minus.png" class="footable-toggle footable-contract" border="0" alt="Contract"></span>'
//    });
</script>

<ul class="nav nav-tabs hidden" >
	<li class="active"><a data-toggle="tab" href="#home">tab</a></li>
</ul>
<div>Zippy!</div>

<?php
    $input = JFactory::getApplication()->input;

    $fooValues = $input->getArray(array(
        'jform' => array(
            'resultsfilename' => 'string',
            'id' => 'int'
        )
    ));
    
    $resultfilename = $fooValues['jform']['resultsfilename'];
    $id = $fooValues['jform']['id'];
//            foreach($fooValues as $fooarray){
//                foreach($fooarray as $value){
//                    echo $value." ";
//                }
//            }
    echo "</br> Try 1 ".$resultfilename;
    echo "</br> Try 1 ".$id;
    
    
//    $mainframe->setUserState( "$option.resultsfilename", $resultfilename);
    $mainframe =& JFactory::getApplication();
//    $stateVar = $mainframe->getUserStateFromRequest( "$option.resultsfilename", 'state_variable', 'state1' );
    $stateVar = $mainframe->getUserState( "option.resultsfilename", 'empty' );
    echo "</br> Try 2 ".$stateVar;
    
    //this is what you should use!
    $passedfile = JRequest::getString('file', 'empty', 'get');
    $this->assignRef('resultfile', $passedfile);
//    echo "</br> Try 3 ".$passedfile;
    echo "</br> Try 3 ".$this->resultfile;
    
    $racexml = simplexml_load_file('../images/results/'.$passedfile);
//    $racexml = simplexml_load_file('../images/results/test.xml');
    $db = JFactory::getDbo();
    echo $racexml->racer[0]->fname;
    
//    echo "Label: ";
//    echo $this->form->getLabel('resultsfilename');
//    echo $this->form->setValue('resultsfilename', null, $stateVar);
//    echo $this->form->getInput('resultsfilename');
            
?>

    
    
<form action="<?php echo JRoute::_('index.php?option=com_trackclubs&layout=load&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    
	<div class="row-fluid">
		<div class="span12 form-horizontal">
			<fieldset class="adminform">
				<!--<legend><?php echo JText::_( 'Details' ); ?></legend>-->
				<div class="adminformlist">
                                    <?php
//                                        echo "Label: ";
                                        echo $this->form->getLabel('resultsfilename');
                                        echo $this->form->setValue('resultsfilename', null, $this->resultfile);
                                        echo $this->form->getInput('resultsfilename');
//                                    echo $this->form->getinput('resultsfilename', 'details', $stateVar);
                                    ?>
					<?php // foreach($this->form->getFieldset('details') as $field){ ?>
						<!--<div>-->	
                                                    <?php 
//                                                    echo $field->label; 
//                                                    if ($field->name = "jform[resultsfilename]"){
//                                                        $field->value = $stateVar;
//                                                        echo $this->form->setvalue('resultsfilename', null, $stateVar);                                                        
//                                                    }
//                                                    echo $field->input;
//                                                    echo $field->name;
                                                   
//                                                    ?>
                                                    
						<!--</div>-->
						<!--<div class="clearfix"></div>-->
					<?php // }; ?>
				</div>
			</fieldset>
		</div>
	</div>
    <?php
//    echo $this->form->setvalue('resultsfilename', null, $stateVar);
    
    ?>
	<div>
		<input type="hidden" name="task" value="addresult.load" />
		<!--<input type="hidden" name="task" value="race.edit" />-->
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>

<legend><?php echo JText::_( 'Details' ); ?></legend>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
    <?php    
        foreach($racexml->racer as $result){
            echo "<tr>";
            echo "<td>".$result->fname.
                    "<td>".$result->lname.
                    "<td>".$result->gender.
                    "<td>".$result->age.
                    "<td>".$result->time;
            echo "</tr>";
        }
    ?>
    </tbody>
</table>