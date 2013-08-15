<style>
.single_add_to_cart_button.button.alt, .quantity.buttons_added {display:none !important;}
</style>
<span style="font-size: 11pt; color: #29C5F4; font-family: Arial Bold;"><?php echo __( 'Order', 'wqc' ); ?></span>
	<table style="font-size: 9pt;">
		<tr>
			<td><?php echo __( 'MSRP per m<sup>2</sup>:', 'wqc' ); ?></td>
			<td>&euro; <strike><?php echo number_format((get_post_meta($post->ID,"_regular_price",true) / $calculatorValue),2,",",""); ?> </strike>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Our price per m<sup>2</sup>:', 'wqc' ); ?></td>
			<td style="font-size:15px; font-weight:bold;">&euro; <?php echo number_format((get_post_meta($post->ID,"_sale_price",true) / $calculatorValue),2,",",""); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Price per pack:', 'wqc' ); ?></td>
			<td>&euro; <?php echo number_format(get_post_meta($post->ID,"_sale_price",true),2,",",""); ?>
			</td>
		</tr>
		<tr>
			<td><?php echo __( 'Required m<sup>2</sup>:', 'wqc' ); ?></td>
			<td><input type="text" id="calculator_from_value" /></td>
		<tr>
		</tr>
		<td><?php echo __( 'Saw loss + 5%:', 'wqc' ); ?></td>
		<td><input type="checkbox" id="calculator_option_sawloss" value=1 />
		</td>
		</tr>
		<tr>
			<td><?php echo __( 'Number of packs:', 'wqc' ); ?></td>
			<td><input type="text" value="" name="quantity"
				id="quantity_product_input" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right">
			<button type="submit" class="button alt">
			<?php echo apply_filters('single_add_to_cart_text', __( 'Add to cart', 'woocommerce' ), $product->product_type); ?>
			</button>
			</td>
		</tr>
	</table>
	<script>
var pakket_variable = <?php echo $calculatorValue; ?>;
jQuery(document).ready(function($){
	$("#calculator_from_value").change(function(){
		meterM2 = $("#calculator_from_value").val();
		if(jQuery.isNumeric(meterM2)){
			if($("#calculator_option_sawloss:checked").size() > 0){
				meterM2 = meterM2 * 1.05;
			}
			$("#quantity_product_input, .input-text.qty.text").val(Math.ceil(meterM2 / pakket_variable));
		}
	});
			
});
</script>