<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filter.output');
?>

<!--<script type="text/javascript">
    // $(function () {
        // $('.footable').footable();
    // });
</script> -->

<div id="trackclubs-members">
 <!--   <table class="footable ttcfootable"> -->
    <table>
        <thead>
            <th data-toggle="true">Name</th>
            <th>Valid Through</th>
            <th data-hide="phone">Gender</th>
        </thead>
        <tbody>  
	<?php foreach($this->items as $item){ ?>
		<?php
		if(empty($item->alias)){
			$item->alias = $item->lastname;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=member&id='.$item->id.':'.$item->alias);
		?>
                <tr>
                    <td><?php echo $item->lastname . ", " . $item->firstname; ?></td>
                    <td><?php echo date("Y", strtotime($item->expirationdate)); ?></td>
                    <td><?php echo $item->gender; ?></td>
                </tr>
<!--		<p><strong>Lastname</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->lastname; ?></a></p>
		<p><strong>Firstname</strong>: <?php echo $item->firstname; ?></p>
		<p><strong>Dob</strong>: <?php echo $item->dob; ?></p>
		<p><strong>Gender</strong>: <?php echo $item->gender; ?></p>
		<p><strong>Photoid</strong>: <?php echo $item->photoid; ?></p>
		<p><strong>Active</strong>: <?php echo $item->active; ?></p>
		<p><strong>Expirationdate</strong>: <?php echo $item->expirationdate; ?></p>
		<p><strong>Newmember</strong>: <?php echo $item->newmember; ?></p>
		<p><strong>Staff</strong>: <?php echo $item->staff; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />-->
	<?php }; ?>
        </tbody>
		<tfoot>
			<tr>
				<td colspan="3">
					
				</td>
			</tr>
		</tfoot>
    </table>
	<?php echo $this->pagination->getListFooter(); ?>
</div>
