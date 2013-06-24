<div class="one_full">
	<section class="title">
		<h4><?php echo strtoupper($data->page_title) ?></h4>
	</section>
	
	<section class="item">
		<div class="content">			
			<?php 
				if($data->form_action == 'create'){
					echo form_open('admin/products/' . $data->form_action);
				}else if($data->form_action == 'edit'){
					echo form_open('admin/products/' . $data->form_action . '/' . $data->product->attribute['product_slug']);
				} 
			?>
			
			<!-- Render Product list  -->
			<?php if(!empty($post)){ ?>	
				<div class="tabs">
					<ul class="tab-menu">
						<li><a href="#product-content-fields"><span>Content</span></a></li>
						<li><a href="#product-packages-fields"><span>Packages</span></a></li>
						<li><a href="#product-css-fields"><span>CSS</span></a></li>
						<li><a href="#product-js-fields"><span>Script</span></a></li>
					</ul>
					
					
					<!-- Product content tab -->
					<div class="form_inputs" id="product-content-fields">
						<fieldset>
							<ul>
								<li>
									<table>
										<tbody>
											<tr>
												<td style="width:20%;">
													<label for="category">Category <span>*</span></label><br>
													<div class="input small-side">
														<?php echo form_dropdown('product_section', array(
															'select' => '',
															'retail' => 'Retail',
															'corporate' => 'Corporate'
														), ($data->product->attribute['product_section'] == NULL) ? 'select' : $data->product->attribute['product_section'] ) ?>
													</div>
												</td>
												<td style="width:20%;">
													<div for="product_is_featured"><?php echo form_checkbox('product_is_featured', 'on', FALSE); ?>&nbsp;&nbsp;<strong>Display in Homepage</strong></div>
												</td>
												<td style="width:20%;">
													<div for="product_poster">Product Poster Here</div>
												</td>
											</tr>
										</tbody>
									</table>
									
									
									<br/>
																		
									<label for="product_name">Name <span>*</span></label>
									<div class="input"><?php echo form_input('product_name', htmlspecialchars_decode($data->product->attribute['product_name']), 'maxlength="100"') ?></div>
									
									<br/>
									
									<label for="product_slug">Slug <span>*</span></label>
									<div class="input"><?php echo form_input('product_slug', $data->product->attribute['product_slug'], 'maxlength="100" class="width-20"') ?></div>
									
									<br/>
									
									<label for="product_tags">Tags - seperate words with ( , )</label>
									<div class="input"><?php echo form_input('product_tags', $data->product->attribute['product_tags'], 'maxlength="100" class="width-20"') ?></div>
								</li>
						
								<li class="editor">
									<label for="body">Content <span>*</span></label><br>
									<div class="input small-side">
										<?php echo form_dropdown('type', array(
											'html' => 'html',
											'markdown' => 'markdown',
											'wysiwyg-simple' => 'wysiwyg-simple',
											'wysiwyg-advanced' => 'wysiwyg-advanced',
										), $post->type) ?>
									</div>
									
									<br/>
									
									<div class="edit-content">
										<?php echo form_textarea(array('id' => 'product_body', 'value' => $data->product->attribute['product_body'], 'name' => 'product_body', 'rows' => 30, 'class' => $post->type)) ?>
									</div>
								</li>
							</ul>
						</fieldset>
					</div>
					
					
					<!-- Product package tab -->
					<div class="form_inputs" id="product-packages-fields">
						<?php $this->load->view('admin/partials/package_list', $data->product->packages); ?> 
					</div>
					
<?php /*				<div class="form_inputs" id="product-packages-fields">
						<fieldset>
							<ul>
								<li>
									<label for="package_name">Package Name <span>*</span></label>
									<div class="input"><?php echo form_input('package_name', htmlspecialchars_decode($data->package_data['package_name']), 'maxlength="100"') ?></div>
								</li>
					
								<li>
									<label for="package_slug">Slug <span>*</span></label>
									<div class="input"><?php echo form_input('package_slug', $data->package_data['package_slug'], 'maxlength="100" class="width-20"') ?></div>
								</li>
						
								<li class="editor">
									<label for="body">Content <span>*</span></label><br>
									<div class="input small-side">
										<?php echo form_dropdown('type', array(
											'html' => 'html',
											'markdown' => 'markdown',
											'wysiwyg-simple' => 'wysiwyg-simple',
											'wysiwyg-advanced' => 'wysiwyg-advanced',
										), $post->type) ?>
									</div>
					
									<div class="edit-content">
										<?php echo form_textarea(array('id' => 'packages_body', 'value' => $data->package_data['package_body'], 'name' => 'packages_body', 'rows' => 30, 'class' => $post->type)) ?>
									</div>
								</li>
							</ul>
						</fieldset>
					</div>	*/ ?>
					
					
					<!-- Product CSS tab -->
					<div class="form_inputs" id="product-css-fields">
						<fieldset>
							<ul>						
								<li class="editor">
									<label for="body">Custom CSS</label><br>
									<div class="edit-content">
										<?php echo form_textarea(array('id' => 'product_css', 'name' => 'product_css', 'value' => $data->product->attribute['product_css'], 'rows' => 30, 'class' => 'markdown')) ?>
									</div>
								</li>
							</ul>
						</fieldset>
					</div>
					
					
					<!-- Product JS tab -->
					<div class="form_inputs" id="product-js-fields">
						<fieldset>
							<ul>						
								<li class="editor">
									<label for="body">Custom Javascript</label><br>
									<div class="edit-content">
										<?php echo form_textarea(array('id' => 'product_js', 'name' => 'product_js', 'value' => $data->product->attribute['product_js'], 'rows' => 30, 'class' => 'markdown')) ?>
									</div>
								</li>
							</ul>
						</fieldset>
					</div>
				</div>
			<?php } ?>	
			<div class="buttons">
				<?php 
						echo form_submit('submit', 'Save'); 
						echo '<a href="admin/products" class="button" style="padding:5px 10px 4px 10px;">Cancel</a>';
				?>
			</div>
			
			
			<?php echo form_close() ?>
		</div>
	</section>
</div>