<div id="subscribe-ack" class="left">
	<h1 style="text-align:center; margin-bottom:40px;">Pendaftaran Layanan <br/><img src="{{ theme:image_path }}homelinks.png" style="width:100%;" /></h1>
	{{ blog:posts limit="1" category="side-promo" order-dir="desc" }}
		<div style="border-radius:5px; overflow:hidden; box-shadow:0 0 2px #CCC; height:400px;"><a href="{{ url }}" style="display:block;"><img data-pyroimage="true" src="uploads/default/files/{{ cover:filename }}" style="width:200px; height:400px;" /></a></div> 
	{{ /blog:posts }}
	
	<div style="margin-top:30px;">
	    <h1>Perhatian</h1>
	    <p>Calon pelanggan bertanggung jawab penuh terhadap kebenaran dari seluruh data dan informasi yg disampaikan didalam formulir pendaftaran.
	    Homelinks berhak secara sepihak menolak permohonan calon pelanggan.</p>
    </div>
</div>

<div id="subscribe-content" class="left">
	<div id="container" class="clearfix">
		<?php echo form_open('subscribe', 'id="subscriber-form" class="crud"'); ?>
	        <div id="form-container" class="left">
	        	<p style="text-align:right;  padding:10px 20px; border-bottom:1px dotted #CCC;"><a href="#coverage-container">Coverage Area &raquo;</a></p>
	            <div id="subscribe-form" class="form-input clearfix">
	                <ul class="form">
	                    <li class="<?php echo alternator('', 'even'); ?>">
	                        <label for="name">Nama Lengkap <span>*</span></label>
	                        <div class="input"><?php echo form_input('name', set_value('name', $subscriber->name), 'class="width-15"'); ?><?php echo form_error('name'); ?></div>
	                    </li>
	                    
	                    <li class="<?php echo alternator('', 'even'); ?>">
	                        <label for="email">Email <span>*</span></label>
	                        <div class="input"><?php echo form_input('email', set_value('email', $subscriber->email), 'class="width-15"'); ?><?php echo form_error('email'); ?></div>
	                    </li>
	                    
	                    <li class="<?php echo alternator('', 'even'); ?>">
	                        <label for="address">Alamat Pemasangan <span>*</span></label>
	                        <div class="input">
	                            <?php
	                                $txtarea = array(
	                                    'name' => 'address',
	                                    'value' => set_value('address', $subscriber->address),
	                                    'rows' => '5',
	                                    'cols' => '50'
	                                );
	                                
	                                echo form_textarea($txtarea);
	                                echo form_error('address');
	                            ?>
	                        </div>
	                    </li>
	                    
	                    <li class="<?php echo alternator('', 'even'); ?>">
	                    	<table>
	                        	<tr>
	                            	<td><label for="area_code">Kode Area <span>*</span></label></td>
	                                <td><label for="phone">No. Telepon <span>*</span></label></td>
	                            </tr>
	                            <tr>
	                            	<td style="width:80px;"><div class="input"><?php echo form_input('area_code', set_value('area_code', $subscriber->area_code), 'style="width:50px; text-align:right"'); ?></div></td>
	                                <td><div class="input"><?php echo form_input('phone', set_value('phone', $subscriber->phone), 'class="width-15" style="text-align:right"'); ?></div></td>
	                            </tr>
	                            <tr><td colspan="2"><div class="input"><?php echo form_error('area_code'); ?><?php echo form_error('phone'); ?></div></td></tr>
	                        </table>
	                    </li>
	                    
	                    <li class="<?php echo alternator('', 'even'); ?>">
	                        <label for="mobile">No. Ponsel</label>
	                        <div class="input"><?php echo form_input('mobile', set_value('mobile', $subscriber->mobile), 'class="width-15"'); ?><?php echo form_error('mobile'); ?></div>
	                    </li>
	                    
	                    <li class="<?php echo alternator('', 'even'); ?>" style="margin:30px 20px 20px 40px;"><?php echo form_submit('subscribe', 'Daftar'); ?></li>
	                </ul>
	                
	                <div style="padding:10px 50px 0 50px; border-top:1px dotted #CCC; font-family:Arial, Verdana, Geneva, sans-serif;"><span>*</span><small> Wajib diisi</small></div>
	            </div>	
	        </div>
	    <?php echo form_close(); ?>
		
		<div id="coverage-container" class="left" style="width:718px; text-align:center; display:none">
			<p style="text-align:right; padding:10px 20px; border-bottom:1px dotted #CCC;"><a href="#form-container">&laquo; Back To Form</a></p>
			<img src="{{theme:image_path}}coverage-area.jpg" title="Coverage Area" style="width:inherit" />
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#container a').click(function(e){
		e.preventDefault();
		console.log($(this).attr('href'));

		elm = $(this).attr('href');
		
		if(elm == '#coverage-container'){
			$(elm).css('display', 'block');
			$('#container').animate({
				left : '-718'
			}, 400, function(){});
		}else{
			$('#container').animate({
				left : '0'
			}, 400, function(){
						$('#coverage-container').css('display', 'none');
					});
		}
	});
});
</script>
