<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * Group Runs
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filter.output');
?>

<div id="trackclubs-groupruns">
    <table class="groupruntable">
        <?php foreach($this->items as $item){ ?>
            <?php
            if(empty($item->alias)){
                    $item->alias = $item->runname;
            };
            $item->alias = JFilterOutput::stringURLSafe($item->alias);
            $item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=grouprun&id='.$item->id.':'.$item->alias);
            // set day of week
            switch ($item->runday){
                case 1:

                    if(empty($item->dayofweek)){
                        $item->dayofweek = "Sunday";
                    }
                    break;
                case 2:
                    if(empty($item->dayofweek)){
                        $item->dayofweek = "Monday";
                    }
                    break;
                case 3:
                    if(empty($item->dayofweek)){
                        $item->dayofweek = "Tuesday";
                    }
                    break;
                case 4:
                    if(empty($item->dayofweek)){
                        $item->dayofweek = "Wednesday";
                    }
                    break;
                case 5:
                    if(empty($item->dayofweek)){
                        $item->dayofweek = "Thursday";
                    }
                    break;
                case 6:
                    if(empty($item->dayofweek)){
                        $item->dayofweek = "Friday";
                    }
                    break;
                case 7:
                    if(empty($item->dayofweek)){
                        $item->dayofweek = "Saturday";
                    }
                    break;
            }
            ?>
        <?php if (empty($previous->runday)){ ?>
        <tr class="dayofweek">
            <th colspan="2"><h2><?php echo $item->dayofweek; ?></h2></th>
        </tr>
        <?php }
        else { ?>
            <?php if ($item->runday != $previous ->runday){ ?>
                <tr class="dayofweek">
                    <td colspan="2"><h2><?php echo $item->dayofweek; ?></h2></td>
                </tr>
            <?php }
        } ?>
        <tr>
            <td colspan="2"><h3><a href="<?php echo $item->linkURL; ?>"><?php echo $item->runname; ?></a></h3></td>
        </tr>
        <tr>
            <td>Start Time:</td>
            <td><?php echo date('h:i A', strtotime($item->runtime)); ?></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo $item->runaddress; ?></td>
        </tr>
        <tr>
            <td>Location:</td>
            <td><?php echo $item->runlocation; ?></td>
        </tr>
        <tr>
            <td>Contact:</td>
            <td><?php echo $item->runcontact; ?></td>
        </tr>
        <tr>
            <td>Email Address:</td>
            <td><?php echo $item->contactemail; ?></td>
        </tr>
        <tr>
            <td colspan="2">Description:</td>
        </tr>
        <tr class="GRBottom">
        <!--<tr style="border-bottom:1pt solid black;">-->
            <td class="description" colspan="2"><?php echo $item->rundescription; ?></td>
        </tr>
        <?php 
        $previous = $item;
        }; ?>
    </table>
</div>
