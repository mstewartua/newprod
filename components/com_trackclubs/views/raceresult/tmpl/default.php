<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * raceresult view
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>
<div id="trackclubs-content">
    
<table class="racetable">
    <tr>
        <th colspan="2"><h2><?php echo $this->item->title; ?></h2></th>
    </tr>
    <tr>
        <th colspan="2"><?php if ($this->item->grandprix == 1){ ?>
            <img title="This run is part of the Tuscaloosa Track Club Grand Prix Series. You get points for this race!" alt="This run is part of the Tuscaloosa Track Club Grand Prix Series. You get points for this race!" src="components/com_trackclubs/assets/img/gp.JPG">
            <?php } ?>
        </th>
    </tr>
    <tr>
        <th colspan="2">
            <?php switch ($this->item->profile){
                case "1": ?>
                    <img title="This run is mostly if not all flat" alt="This run is mostly if not all flat" src="components/com_trackclubs/assets/img/flat2.JPG"> <?php break; ?>
                <?php case "2": ?>
                    <img title="This run is hilly.." alt="This run is hilly.." src="components/com_trackclubs/assets/img/hilly2.JPG"> <?php break; ?>
                <?php case "3": ?>
                    <img title="This run is all downhill" alt="This run is all downhill" src="components/com_trackclubs/assets/img/downhill2.JPG"> <?php break; ?>
                <?php case "4": ?>
                    <img title="This run is all uphill" alt="This run is all uphill" src="components/com_trackclubs/assets/img/uphill2.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->route){
                case 1: ?>
                    <img title="This run is a loop route" alt="This run is a loop route" src="components/com_trackclubs/assets/img/loop.JPG"> <?php break; ?>
                <?php case 2: ?>
                    <img title="This run is a true out and back route" alt="This run is a true out and back route" src="components/com_trackclubs/assets/img/outandback.JPG"> <?php break; ?>
                <?php case 3: ?>
                    <img title="This run starts at one place and ends at another" alt="This run starts at one place and ends at another" src="components/com_trackclubs/assets/img/straight.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->terrain){
                case 1: ?>
                    <img title="This run is on a paved surface" alt="This run is on a paved surface" src="components/com_trackclubs/assets/img/paved2.JPG"> <?php break; ?>
                <?php case 2: ?>
                    <img title="This run is offroad" alt="This run is offroad" src="components/com_trackclubs/assets/img/dirt2.JPG"> <?php break; ?>
                <?php case 3: ?>
                    <img title="This run is partly offroad and on paved surface" alt="This run is partly offroad and on paved surface" src="components/com_trackclubs/assets/img/half2.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->aid){
                case 1: ?>
                    <img title="This run offers water stations and/or medical assistance if needed" alt="This run offers water stations and/or medical assistance if needed" src="components/com_trackclubs/assets/img/aid2.JPG"> <?php break; ?>
                <?php case 2: ?>
                    <img title="This does not offer water stations or medical assistance but people will be there to help. Just nothing official" alt="This does not offer water stations or medical assistance but people will be there to help. Just nothing official" src="components/com_trackclubs/assets/img/noaid2.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->prize){
                case 1: ?>
                    <img title="This run has doors prizes and/or monetary awards for winners!" alt="This run has doors prizes and/or monetary awards for winners!" src="components/com_trackclubs/assets/img/money.JPG"> <?php break; ?>
            <?php } ?>
            <?php if (($this->item->route == 0) && ($this->item->terrain == 0) && ($this->item->aid == 0) && ($this->item->prize == 0)) {
                echo "We don't have any information on this race.";
            } ?>
        </th>
    </tr>
    <tr>
        <td class="racelabel"><strong>City</strong>:</td>
        <td><?php echo $this->item->city . ", " . $this->item->state ; ?></td>
    </tr>
    <tr>
        <td><strong>Date</strong>:</td>
        <td><?php echo date("l F j, Y g:i a", strtotime($this->item->datetime)); ?></td>
    </tr>
    <tr>
        <td><strong>Distance</strong>:</td>
        <td><?php echo $this->item->distance; ?></td>
    </tr>
    <tr>
        <td><strong>Director</strong>:</td>
        <td><?php echo $this->item->director; ?></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Info</strong>:</td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $this->item->info; ?></td>
    </tr>
</table>
    <br>
    <br>
    <p>
        Search: <input id="filter2" type="text"/>
        Division: <select class="filter-division">
        <option></option>
        <option value="F9 & Under">F9 & Under</option>
        <option value="F10-14">F10-14</option>
        <option value="F15-19">F15-19</option>
        <option value="F20-24">F20-24</option>
        <option value="F25-29">F25-29</option>
        <option value="F30-34">F30-34</option>
        <option value="F35-39">F35-39</option>
        <option value="F40-44">F40-44</option>
        <option value="F45-49">F45-49</option>
        <option value="F50-54">F50-54</option>
        <option value="F55-59">F55-59</option>
        <option value="F60-64">F60-64</option>
        <option value="F65-69">F65-69</option>
        <option value="F70 & older">F70 & older</option>
        <option value="M9 & Under">M9 & Under</option>
        <option value="M10-14">M10-14</option>
        <option value="M15-19">M15-19</option>
        <option value="M20-24">M20-24</option>
        <option value="M25-29">M25-29</option>
        <option value="M30-34">M30-34</option>
        <option value="M35-39">M35-39</option>
        <option value="M40-44">M40-44</option>
        <option value="M45-49">M45-49</option>
        <option value="M50-54">M50-54</option>
        <option value="M55-59">M55-59</option>
        <option value="M60-64">M60-64</option>
        <option value="M65-69">M65-69</option>
        <option value="M70 & older">M70 & older</option>
        </select>
        <a href="#clear" class="clear-filter" title="clear filter">[clear]</a>
        <!--<a href="#api" class="filter-api" title="Filter using the Filter API">[filter API]</a>-->
    </p>
<!--    <script type="text/javascript">
        $(function () {
                $('.footable').footable();
        });
    </script>-->
    
    <!--results table-->
    <!--<table class="footable table demo two" data-filter="#filter2" data-filter-text-only="true">-->
    <table class="footable ttcfootable result two" data-filter="#filter2" data-filter-text-only="true">
    <!--<table class="table footable demo two" data-filter="#filter2">-->
        <thead>
            <tr>
                <th data-toggle="true"><strong>Place</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>M/F</strong></th>
                <th data-hide="phone"><strong>Age</strong></th>
                <th><strong>Time</strong></th>
                <!--<th data-hide="phone"><strong>Pace</strong></th>-->
                <th data-hide="phone"><strong>Division</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            switch ($this->item->distance){
                case '2 MI':
                    $this->item->miles = 2;
                    break;
                case '4 MI':
                    $this->item->miles = 4;
                    break;
                case '5K':
                    $this->item->miles = 3.10685596;
                    break;
                case '7.5K':
                    $this->item->miles = 4.66028394;
                    break;
                case '8K':
                    $this->item->miles = 4.97097;
                    break;
                case '5 MI':
                    $this->item->miles = 5;
                    break;
                case '10K':
                    $this->item->miles = 6.21371192;
                    break;
                case '15K':
                    $this->item->miles = 9.32056788;
                    break;
                case '25K':
                    $this->item->miles = 15.5342798;
                    break;
                case '50K':
                    $this->item->miles = 31.0685596;
                    break;
                default:
                    $this->item->miles = -1;
                    break;                
            }
            $i = 0;
            foreach($this->item->results as $result){
                $i++; 
                if ($result->age<=9) {$result->division = $result->gender."9 & Under";}
                    else if ($result->age >=10 and $result->age <=14){$result->division = $result->gender."10-14";}
                    else if ($result->age >=15 and $result->age <=19){$result->division = $result->gender."15-19";}
                    else if ($result->age >=20 and $result->age <=24){$result->division = $result->gender."20-24";}
                    else if ($result->age >=25 and $result->age <=29){$result->division = $result->gender."25-29";}
                    else if ($result->age >=30 and $result->age <=34){$result->division = $result->gender."30-34";}
                    else if ($result->age >=35 and $result->age <=39){$result->division = $result->gender."35-39";}
                    else if ($result->age >=40 and $result->age <=44){$result->division = $result->gender."40-44";}
                    else if ($result->age >=45 and $result->age <=49){$result->division = $result->gender."45-49";}
                    else if ($result->age >=50 and $result->age <=54){$result->division = $result->gender."50-54";}
                    else if ($result->age >=55 and $result->age <=59){$result->division = $result->gender."55-59";}
                    else if ($result->age >=60 and $result->age <=64){$result->division = $result->gender."60-64";}
                    else if ($result->age >=65 and $result->age <=69){$result->division = $result->gender."65-69";}
                    else if ($result->age >=70){$result->division = $result->gender."70 & older";}
                    else {$result->division = $result->gender."-";}
            ?>
                <tr class="footable-visible footable-first-column">
                    <td><?php echo $i  ?></td>
                    <td><?php echo $result->lastname.", ".$result->firstname  ?></td>
                    <td><?php echo $result->gender ?></td>
                    <td><?php echo $result->age ?></td>
                    <td><?php echo $result->time ?></td>
                    <!--date('h:i A', strtotime($item->runtime)-->
                    <!--<td><?php echo date('s', $result->time/$this->item->miles) ?></td>-->
                    <!--<td><?php echo date('h:i:s:u', $result->time/$this->item->miles) ?></td>-->
                    <!--<td><?php echo $result->time/$this->item->miles ?></td>-->
                    <!--<td><?php echo date('i:s', mktime(0,$result->time/$this->item->miles)); ?></td>-->
                    <!--<td><?php echo $this->item->miles ?></td>-->
                    <td><?php echo $result->division ?></td>
                </tr>
            <?php 
            }

            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        $(function () {
          $('table.result').footable().bind('footable_filtering', function(e){
            var selected = $(this).prev('p').find('.filter-division').find(':selected').text();
            if (selected && selected.length > 0){
              e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
              e.clear = !e.filter;
            }
          });

          $('.clear-filter').click(function (e) {
            e.preventDefault();
            var $parent = $(this).closest('p');
            $parent.find('.filter-division').val('');
            if ($parent.find('#filter1').length > 0) {
              $('table.result.one').trigger('footable_clear_filter');
            } else {
              $('table.result.two').trigger('footable_clear_filter');
            }
          });

          $('.filter-division').change(function (e) {
            e.preventDefault();
            var $parent = $(this).closest('p');
            if ($parent.find('#filter1').length > 0) {
              $('table.result.one').trigger('footable_filter', {filter: $parent.find('#filter1').val()});
            } else {
              $('table.result.two').trigger('footable_filter', {filter: $parent.find('#filter2').val()});
            }
          });
        });
    </script>
</div>