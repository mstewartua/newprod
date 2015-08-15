<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * Group Run
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>
<div id="trackclubs-content">
    <?php 
        switch ($this->item->runday){
            case 1:

                if(empty($this->item->dayofweek)){
                    $this->item->dayofweek = "Sunday";
                }
//                        $sunday[] = $this->item;
                break;
            case 2:
                if(empty($this->item->dayofweek)){
                    $this->item->dayofweek = "Monday";
                }
//                        $monday[] = $this->item;
                break;
            case 3:
                if(empty($this->item->dayofweek)){
                    $this->item->dayofweek = "Tuesday";
                }
//                        $tuesday[] = $this->item;
                break;
            case 4:
                if(empty($this->item->dayofweek)){
                    $this->item->dayofweek = "Wednesday";
                }
//                        $wednesday[] = $this->item;
                break;
            case 5:
                if(empty($this->item->dayofweek)){
                    $this->item->dayofweek = "Thursday";
                }
//                        $thursday[] = $this->item;
                break;
            case 6:
                if(empty($this->item->dayofweek)){
                    $this->item->dayofweek = "Friday";
                }
//                        $friday[] = $this->item;
                break;
            case 7:
                if(empty($this->item->dayofweek)){
                    $this->item->dayofweek = "Saturday";
                }
//                        $saturday[] = $this->item;
                break;
        } ?>
    <table class="groupruntable">
        <thead>
            <tr>
                <th colspan="2"><h2><?php echo $this->item->runname; ?></h2></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="20%">Day of Week:</td>
                <td><?php echo $this->item->dayofweek; ?></td>
            </tr>
            <tr>
                <td width="20%">Start Time:</td>
                <td><?php echo date('h:i A', strtotime($this->item->runtime)); ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?php echo $this->item->runaddress; ?></td>
            </tr>
            <tr>
                <td>Location:</td>
                <td><?php echo $this->item->runlocation; ?></td>
            </tr>
            <tr>
                <td>Contact:</td>
                <td><?php echo $this->item->runcontact; ?></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><?php echo $this->item->contactemail; ?></td>
            </tr>
            <tr>
                <td colspan="2">Description:</td>
            </tr>
            <tr>
                <td class="description" colspan="2"><?php echo $this->item->rundescription; ?></td>
            </tr>
        </tbody>
    </table>
</div>