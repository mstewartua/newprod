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
<div id="trackclubs-trackclubs">
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Club Name</th>
            <th>Other Stuff</th>
        </thead>
        <tfoot>
            <tr>
                <td colspan="3"><?php echo $this->pagination->getListFooter(); ?></td>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach($this->items as $item){ ?>
                <?php
                    if(empty($item->alias)){
                            $item->alias = $item->clubname;
                    };
                    $item->alias = JFilterOutput::stringURLSafe($item->alias);
                    $item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=trackclub&id='.$item->id.':'.$item->alias);
                ?>
            <tr>
                <td><?php echo $item->linkURL; ?></td>
                <td><a href="<?php echo $item->linkURL; ?>"><?php echo $item->clubname; ?></a></td>
                <td><?php echo $this->pagination->getRowOffset($item) ?>  </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <!--
	<?php foreach($this->items as $item){ ?>
		<?php
		if(empty($item->alias)){
			$item->alias = $item->clubname;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=trackclub&id='.$item->id.':'.$item->alias);
		?>
		<p><strong>Clubname</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->clubname; ?></a></p>
		<p><strong>Published</strong>: <?php echo $item->published; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php }; ?>
	<?php // echo $this->pagination->getListFooter(); ?>
    -->
</div>
