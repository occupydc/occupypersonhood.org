<?php global $order; ?>
<form id="order_review" method="post">
	
	<table class="shop_table">
		<thead>
			<tr>
				<th><?php _e('Product', 'jigoshop'); ?></th>
				<th><?php _e('Qty', 'jigoshop'); ?></th>
				<th><?php _e('Totals', 'jigoshop'); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="2"><?php _e('Subtotal', 'jigoshop'); ?></td>
				<td><?php echo $order->get_subtotal_to_display(); ?></td>
			</tr>
			<?php if ($order->order_shipping>0) : ?><tr>
				<td colspan="2"><?php _e('Shipping', 'jigoshop'); ?></td>
				<td><?php echo $order->get_shipping_to_display(); ?></small></td>
			</tr><?php endif; ?>
			<?php if ($order->get_total_tax()>0) : ?><tr>
				<td colspan="2"><?php _e('Tax', 'jigoshop'); ?></td>
				<td><?php echo jigoshop_price($order->get_total_tax()); ?></td>
			</tr><?php endif; ?>
			<?php if ($order->order_discount>0) : ?><tr class="discount">
				<td colspan="2"><?php _e('Discount', 'jigoshop'); ?></td>
				<td>-<?php echo jigoshop_price($order->order_discount); ?></td>
			</tr><?php endif; ?>
			<tr>
				<td colspan="2"><strong><?php _e('Grand Total', 'jigoshop'); ?></strong></td>
				<td><strong><?php echo jigoshop_price($order->order_total); ?></strong></td>
			</tr>
		</tfoot>
		<tbody>
			<?php
			if (sizeof($order->items)>0) : 
				foreach ($order->items as $item) :
					echo '
						<tr>
							<td>'.$item['name'].'</td>
							<td>'.$item['qty'].'</td>
							<td>'.jigoshop_price( $item['cost']*$item['qty'] ).'</td>
						</tr>';
				endforeach; 
			endif;
			?>
		</tbody>
	</table>
	
	<div id="payment">
		<?php if ($order->order_total > 0) : ?>
		<ul class="payment_methods methods">
			<?php 
				$available_gateways = jigoshop_payment_gateways::get_available_payment_gateways();
				if ($available_gateways) : 
					// Chosen Method
					if (sizeof($available_gateways)) current($available_gateways)->set_current();
					foreach ($available_gateways as $gateway ) :
						?>
						<li>
							<input type="radio" id="payment_method_<?php echo $gateway->id; ?>" class="input-radio" name="payment_method" value="<?php echo $gateway->id; ?>" <?php if ($gateway->chosen) echo 'checked="checked"'; ?> />
							<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->title; ?> <?php echo $gateway->icon(); ?></label> 
							<?php
								if ($gateway->has_fields || $gateway->description) : 
									echo '<div class="payment_box payment_method_'.$gateway->id.'" style="display:none;">';
									$gateway->payment_fields();
									echo '</div>';
								endif;
							?>
						</li>
						<?php
					endforeach;
				else :
				
					echo '<p>'.__('Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'jigoshop').'</p>';
					
				endif;
			?>
		</ul>
		<?php endif; ?>

		<div class="form-row">
			<?php jigoshop::nonce_field('pay')?>
			<input type="submit" class="button" name="pay" id="place_order" value="<?php _e('Pay for order', 'jigoshop'); ?>" />

		</div>

	</div>
	
</form>