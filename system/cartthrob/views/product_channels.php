<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if (count($settings['product_channels']) && strlen(implode('', $settings['product_channels']))) : 
	
	$channel_options = "";  
	$channel_list = ""; 
	foreach ($settings['product_channels'] as $product_channel)
	{
		foreach($channels as $channel)
		{
			$channel_list .=  '<option value="'.$channel['channel_id'].'">'; 
			$channel_list .= 	$channel['channel_title']; 
			$channel_list .= '</option>';						
		}

		foreach ($fields[$product_channel] as $field)
		{
			$channel_options .=  '<option value="'.$field['field_id'].'">'; 
			$channel_options .= $field['field_label']; 
			$channel_options .= '</option>'; 
		}
	}
?>
	
<?php foreach ($settings['product_channels'] as $product_channel) : ?>
 	<table class="mainTable padTable ct_product_channels" border="0" cellspacing="0" cellpadding="0">
		<caption><?=lang('product_channels_header')?></caption>
		<thead class="">
		<tr>
			<th colspan="2">
				<strong class="red"><?=lang('product_channel_form_description')?></strong>
 			</th>
 
		</tr>
		</thead>
		<tbody>
				<tr class="<?php echo alternator('even', 'odd');?>">
					<td>
						<strong class="red">*<?=lang('product_channel')?>:</strong>
						<br /><?=lang('product_channel_choose_a_channel')?> </div>
					</td>
					<td>
						<select name='product_channels[]' class='ct_product_column product_channel' id="section_products">
							<option value='' class="blank" ></option>
							<?php foreach ($channels as $channel) : ?>
								<option value="<?=$channel['channel_id']?>" <?php if ($product_channel == $channel['channel_id']) : ?>selected="selected"<?php endif; ?>>
									<?=$channel['channel_title']?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr class="<?php echo alternator('even', 'odd');?>">
					<td>
						<strong><?=lang('product_channel_price_field')?></strong><br />
						<?=lang('product_channel_price_field_description')?>	
					</td>
					<td>
						<?php
						$product_fields = array(); 
						$product_fields[''] = ''; 
						foreach ($fields[$product_channel] as $field)
						{
							$product_fields[$field['field_id']] = $field['field_label']; 
						}
 						$attrs = "class='ct_product_column product_price'"; 
					
						echo form_dropdown('product_channel_fields['.$product_channel.'][price]', $product_fields, $settings['product_channel_fields'][$product_channel]['price'], $attrs); 
					
						?>
					</td>
				</tr>
				<tr class="<?php echo alternator('even', 'odd');?>">
					<td>
						<strong><?=lang('product_channel_shipping_field')?></strong><br />
						<?=lang('product_channel_shipping_field_description')?>	
					</td>
					<td>
						<select name='product_channel_fields[<?=$product_channel?>][shipping]' class='ct_product_column product_shipping product_channel_fields' >
							<option value='' class="blank" ></option>
							<?php foreach ($fields[$product_channel] as $field) : ?>
								<option value="<?=$field['field_id']?>" <?php if (isset($settings['product_channel_fields'][$product_channel]['shipping']) && $settings['product_channel_fields'][$product_channel]['shipping'] == $field['field_id']) : ?>selected="selected"<?php endif; ?>>
									<?=$field['field_label']?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr class="<?php echo alternator('even', 'odd');?>">
					<td>
						<strong><?=lang('product_channel_weight_field')?></strong><br />
						<?=lang('product_channel_weight_field_description')?>	
					</td>
					<td>
						<select name='product_channel_fields[<?=$product_channel?>][weight]' class='ct_product_column product_weight product_channel_fields' >
							<option value='' class="blank" ></option>
							<?php foreach ($fields[$product_channel] as $field) : ?>
								<option value="<?=$field['field_id']?>" <?php if (isset($settings['product_channel_fields'][$product_channel]['weight']) && $settings['product_channel_fields'][$product_channel]['weight'] == $field['field_id']) : ?>selected="selected"<?php endif; ?>>
									<?=$field['field_label']?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr class="<?php echo alternator('even', 'odd');?>">
					<td>
						<strong><?=lang('product_channel_inventory_field')?></strong><br />
						<?=lang('product_channel_inventory_field_description')?>	
					</td>
					<td>
						<select name='product_channel_fields[<?=$product_channel?>][inventory]' class='ct_product_column product_inventory product_channel_fields' >
							<option value='' class="blank" ></option>
							<?php foreach ($fields[$product_channel] as $field) : ?>
								<option value="<?=$field['field_id']?>" <?php if (isset($settings['product_channel_fields'][$product_channel]['inventory']) && $settings['product_channel_fields'][$product_channel]['inventory'] == $field['field_id']) : ?>selected="selected"<?php endif; ?>>
									<?=$field['field_label']?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr class="<?php echo alternator('even', 'odd');?>">
					<td>
						<strong><?=lang('product_channel_global_price')?></strong><br />
						<?=lang('product_channel_global_price_description')?>	
					</td>
					<td>
						<input  dir='ltr' type='text' name='product_channel_fields[<?=$product_channel?>][global_price]' value='<?=(isset($settings['product_channel_fields'][$product_channel]['global_price'])) ? $settings['product_channel_fields'][$product_channel]['global_price'] : ''?>' size='4' maxlength='128' class='ct_product_column product_global_price product_channel_fields'  />
					</td>
				<tr class="<?php echo alternator('even', 'odd');?>">
					<td colspan="2">
						<a href="#" class="remove_product_table" style="display:block;float:left;margin: 0 0 0 8px;position:data-hashative;top: 9px;">
							<img border="0" src='<?=$this->config->item('theme_folder_url')?>cp_themes/default/images/content_custom_tab_delete.png' />
						</a>
					</td>
				</tr>
		</tbody>
	</table>
<?php endforeach; ?>

<?php else : ?>
 	<table class="mainTable padTable ct_product_channels" border="0" cellspacing="0" cellpadding="0">
		<thead class="">
		<tr>
			<th colspan="2">
				<strong class="red"><?=lang('product_channel_form_description')?></strong>
 			</th>
 
		</tr>
		</thead>
		<tbody>
			<tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong class="red">*<?=lang('product_channel')?>:</strong>
					<br /><?=lang('product_channel_choose_a_channel')?> </div>
				</td>
				<td>
					<select name='product_channels[]' class='ct_product_column product_channel channels' >
						<option value='' class="blank" ></option>
						<?php foreach ($channel_titles as $channel_id => $channel_name) : ?>
						<option value="<?=$channel_id?>"><?=$channel_name?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			</tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_price_field')?></strong><br />
					<?=lang('product_channel_price_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_price product_channel_fields' >
						<option value='' class="blank" ></option>
					</select>
				</td>
			</tr>
			</tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_shipping_field')?></strong><br />
					<?=lang('product_channel_shipping_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_shipping product_channel_fields' >
						<option value='' class="blank" ></option>
					</select>
				</td>
			</tr>
			</tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_weight_field')?></strong><br />
					<?=lang('product_channel_weight_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_weight product_channel_fields' >
						<option value='' class="blank" ></option>
					</select>
				</td>
			</tr>
			</tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_inventory_field')?></strong><br />
					<?=lang('product_channel_inventory_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_inventory product_channel_fields' >
						<option value='' class="blank" ></option> 
					</select>
				</td>
			</tr>
			</tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_global_price')?></strong><br />
					<?=lang('product_channel_global_price_description')?>	
				</td>
				<td>
					<input  dir='ltr' type='text' size='4' maxlength='128' class='ct_product_column product_global_price product_channel_fields'  />
				</td>
			</tr>
			</tr class="<?php echo alternator('even', 'odd');?>">
				<td colspan="2">
					<a href="#" class="remove_product_table" style="display:block;float:left;margin: 0 0 0 8px;position:data-hashative;top: 9px;">
					<img border="0" src='<?=$this->config->item('theme_folder_url')?>cp_themes/default/images/content_custom_tab_delete.png' /> 
					</a>
				</td>
			</tr>
		</tbody>
	</table>
<?php endif; ?>

	<fieldset id="add_product_channel">
		<a href="javascript:void(0)" class="ct_add_field_bttn">
			<?=lang('product_channel_add_another_channel')?>
		</a>
	</fieldset>


 	<table class="mainTable padTable ct_product_channels" id="product_channel_blank" style="display:none" border="0" cellspacing="0" cellpadding="0">
		<thead class="">
		<tr>
			<th colspan="2">
				<strong class="red"><?=lang('product_channel_form_description')?></strong>
 			</th>
		</tr>
		<tbody>
			<tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong class="red">*<?=lang('product_channel')?>:</strong>
					<br /><?=lang('product_channel_choose_a_channel')?> </div>
				</td>
	 			<td>
					<select class='ct_product_column product_channel channels' >
						<option value='' class="blank" ></option>
						<?php foreach ($channel_titles as $channel_id => $channel_name) : ?>
						<option value="<?=$channel_id?>"><?=$channel_name?></option>
						<?php endforeach; ?>
 					</select>
				</td>
			</tr>
			<tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_price_field')?></strong><br />
					<?=lang('product_channel_price_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_price product_channel_fields' >
						<option value='' class="blank" ></option>
 					</select>
				</td>
			</tr>
			<tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_shipping_field')?></strong><br />
					<?=lang('product_channel_shipping_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_shipping product_channel_fields' >
						<option value='' class="blank" ></option>
 					</select>
					
				</td>
			</tr>
			<tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_weight_field')?></strong><br />
					<?=lang('product_channel_weight_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_weight product_channel_fields' >
						<option value='' class="blank" ></option>
 					</select>
				</td>
			</tr>
			<tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_inventory_field')?></strong><br />
					<?=lang('product_channel_inventory_field_description')?>	
				</td>
				<td>
					<select class='ct_product_column product_inventory product_channel_fields' >
						<option value='' class="blank" ></option>
 					</select>
				</td>
			</tr>
			<tr class="<?php echo alternator('even', 'odd');?>">
				<td>
					<strong><?=lang('product_channel_global_price')?></strong><br />
					<?=lang('product_channel_global_price_description')?>	
				</td>
				<td>
					<input  dir='ltr' type='text' value='' size='4' maxlength='128' class='ct_product_column product_global_price product_channel_fields'  />
				</td>
			</tr>
			<tr class="<?php echo alternator('even', 'odd');?>">
				
				<td colspan="2">
					<a href="#" class="remove_product_table" style="display:block;float:left;margin: 0 0 0 8px;position:data-hashative;top: 9px;">
						<img border="0" alt="<?=lang('delete_this_row')?>" src='<?=$this->config->item('theme_folder_url')?>cp_themes/default/images/content_custom_tab_delete.png' />
						
					</a>
				</td>
	 		</tr>
		</tbody>
	</table>
