<div style="margin:0 auto; width:960px;">
	
    <div id="sch-util">  
        <form id="sch-filter" class="clearfix" method="post" action="epg" style="background-image:url({{theme:image_path}}tv-guide.png); background-repeat:no-repeat; background-position:right center;"> 
				<div class="filter" style="width:100px;">
					<label for="date">Date</label>
					<div class="input"><?php echo form_input('date', set_value('date', date("Y-m-d")), 'id="date" class="datepicker" maxlength="20"'); ?></div>
				</div>
				               
                <div class="filter" style="width:180px;">
					<label for="cid">Channel</label>
					<div class="input">
						<?php echo form_dropdown('cid', $ch); ?>
					</div>
				</div>
				
				<div class="filter">
					<label for="submit">&nbsp;</label>
					<div class="input"><?php echo form_submit('submit', 'View'); ?></div>
				</div>
        </form>
    </div>
    
   
   
   
   <?php if($shows != NULL){ ?> 
	   <table id="epg-tool" cellpadding="0" cellspacing="5" border="0">		   
		   		<?php if(!empty($shows->sh)){ ?>
	   				<tr id="today">
	   					<td colspan="2" class="clearfix">
	   						<p style="width:500px; float:left;">
	   							<?php echo $ch_info->name; ?> | Ch. <?php echo $ch_info->num; ?>
	   							<br/><br/>
	   							<span style="font-size:14px;"><?php echo $ch_info->desc; ?></span>
	   						</p>
	   						<p style="width:260px; font-size:18px; font-weight:600; float:right; text-align:right;"><?php echo $tgl != NULL ? date('d F Y', strtotime($tgl)) : date('d F Y'); ?></p>
	   					</td>
	   				</tr>
	   				
		   			<?php foreach($shows->sh as $s){ ?>
		   			<tr class="show">
		   				<td class="sch-time"><?php echo date('H:i a', strtotime($s->time)); ?></td>
		   				<td class="sch-data">
		   					<p class="title"><?php echo $s->title; ?> | <span class="dur">Durasi <?php echo date('H:i ', strtotime($s->duration)); ?></span></p>
		   					<?php if($s->syn_id != NULL){ ?>
			   					<p class="syn_id"><?php echo $s->syn_id; ?></p>
			   					<?php if($s->syn_en != NULL){ ?>
				   					<hr/>
				   					<p class="syn_en"><?php echo $s->syn_en; ?></p>
			   					<?php } ?>
			   				<?php }elseif($s->syn_id != NULL){ ?>
			   					<p class="syn_en"><?php echo $s->syn_en; ?></p>
			   				<?php } ?>
		   				</td>
		   			</tr>
		   			<?php } ?>
		   		<?php }else{ ?>		
		   			<div id="no-data">Sorry, no schedules data for this channel.</div>
		   		<?php } ?>
	   </table>
   <?php }else{ ?>
	   <div style="min-height:300px; text-align:center"><img src="{{theme:image_path}}tv-guide-home.jpg" style="width:auto;" /></div>
   <?php } ?>	 
    
    <img src="{{theme:image_path}}tvcable2.jpg">

</div>