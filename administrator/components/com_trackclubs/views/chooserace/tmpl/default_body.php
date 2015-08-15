<?php
/*------------------------------------------------------------------------
# default_body.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

//$edit = "index.php?option=com_trackclubs&view=races&task=race.edit";
$edit = "index.php?option=com_trackclubs&view=addresult&task=addresult.edit";
$user = JFactory::getUser();
$userId = $user->get('id');
?>
<?php foreach($this->items as $i => $item){
	$canCheckin	= $user->authorise('core.manage', 'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
	$userChkOut	= JFactory::getUser($item->checked_out);
	?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->title; ?> - (<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo 'Edit'; ?></a>)
			<?php if ($item->checked_out){ ?>
				<?php echo JHtml::_('jgrid.checkedout', $i, $userChkOut->name, $item->checked_out_time, 'races.', $canCheckin); ?>
			<?php } ?>
		</td>
		<td>
			<?php echo $item->city; ?>
		</td>
		<td>
			<?php echo $item->state; ?>
		</td>
		<td>
			<?php echo $item->datetime; ?>
		</td>
		<td>
			<?php echo $item->distance; ?>
		</td>
<!--		<td>
			<?php echo $item->fees; ?>
		</td>
		<td>
			<?php echo $item->director; ?>
		</td>
		<td>
			<?php echo $item->map; ?>
		</td>
		<td>
			<?php echo $item->applicationfilename; ?>
		</td>
		<td>
			<?php if($item->grandprix==1){echo 'Yes';} else{echo 'No';} ?>
		</td>
		<td>
			<?php if($item->certified==1){echo 'Yes';} else{echo 'No';} ?>
		</td>
		<td>
			<?php echo $item->certifiedmap; ?>
		</td>
		<td>
			<?php echo $item->info; ?>
		</td>
		<td>
			<?php switch ($item->profile){
                                case "1": 
                                        echo 'Flat'; break;
                                case "2":
                                        echo 'Hilly'; break;
                                case "3":
                                        echo 'Downhill'; break;
                                case "4":
                                        echo 'Uphill'; break;
                                default :
                                        echo 'Unknown'; break;
                        } ?>
		</td>
		<td>
			<?php switch ($item->terrain){
                            case 1: 
                                echo 'Paved'; break; 
                            case 2: 
                                echo 'Offroad'; break; 
                            case 3: 
                                echo 'Mixed'; break; 
                            default :
                                echo 'Unknown'; break;
                        } ?>
		</td>
		<td>
			<?php switch ($item->route){
                            case 1: 
                                echo 'Loop'; break; 
                            case 2: 
                                echo 'Out and back'; break; 
                            case 3: 
                                echo 'Point to point'; break; 
                            default :
                                echo 'Unknown'; break;
                        } ?>
		</td>
		<td>
			<?php switch ($item->aid){
                            case 1: 
                                echo 'Yes'; break; 
                            case 2: 
                                echo 'No'; break; 
                            default :
                                echo 'Unknown'; break;
                        } ?>
		</td>
		<td>
			<?php if($item->prize==1){echo 'Yes';} else{echo 'No';} ?>
		</td>
		<td>
			<?php if($item->active==1){echo 'Yes';} else{echo 'No';} ?>
		</td>
		<td>
			<?php if($item->complete==1){echo 'Yes';} else{echo 'No';} ?>
		</td>-->
	</tr>
<?php } ?>