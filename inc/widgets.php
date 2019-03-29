<?php

add_action( 'widgets_init', 'vedo_register_widgets' );

function vedo_register_widgets() {
	register_widget( 'vedo_payment' );
}

class vedo_payment extends WP_Widget {
	public function __construct() {
		$widget_options = array(
			'classname'		=> 'vedo-payment-icon',
			'description'	=> 'Show payment gateway icons',
		);

		parent::__construct( 'vedo_payment_widget', 'VEDO : Payment Gateway Icons', $widget_options );
	}

	public function widget( $args, $instance ) {
		global $vedo_opt;
		$size = apply_filters( 'icon_size', $instance['size'] );
		$payments = $vedo_opt['basic-payment'];
		echo $size;
		echo $args['before_widget']; //. $args['before_title'] . $args['after_title'];
		echo $before_size . $size . $after_size;

		foreach ($payments as $payment) {
			echo '<span style="display: inline-block" class="icon '.$payment.'"></span>';
		}

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$size = ! empty( $instance['size'] ) ? $instance['size'] : 'null';
		echo $size;
		echo $instance['size']; ?>
		<p>
			<label for="<?= $this->get_field_id( 'size' ); ?>">Size : </label>
			<select name="<?= $this->get_field_id( 'size' ); ?>" id="<?= $this->get_field_id( 'size' ); ?>">
				<option value="small" <?php //if($size == 'small') echo { 'selected'; } ?> >Small</option>
				<option value="medium" <?php //if($size == 'medium') echo { 'selected'; } ?> selected>Medium</option>
				<option value="large" <?php //if($size == 'large') echo { 'selected'; } ?> >Large</option>
			</select> 
		</p>
	<?php
	}

	public function update ( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['size'] = strip_tags( $new_instance['size'] );
		return $instance;
	}
}


?>