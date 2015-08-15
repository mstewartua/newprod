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

?>
<div id="trackclubs-content">
	<p><strong>Title</strong>: <?php echo $this->item->title; ?></p>
	<p><strong>Description</strong>: <?php echo $this->item->description; ?></p>
	<p><strong>Active</strong>: <?php echo $this->item->active; ?></p>
</div>