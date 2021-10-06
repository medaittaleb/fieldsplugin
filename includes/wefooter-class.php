<?php

/**
 * Adds Wefooter_Widget widget.
 */
class Wefooter_Widget extends WP_Widget {

	public $weMap;
	public $weAdress;
	public $weHoraire;
	public $weSiteName;
	public $weSiteUrl;
	public $phoneNumber1;
	public $phoneNumber2;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wefooter_widget', // Base ID
			esc_html__( 'We Footer', 'wefooter_domain' ), // Name
			array( 'description' => esc_html__( 'We Footer widget', 'wefooter_domain' ), ) // Args
		);

		$this->weMap = do_shortcode('[weMap]');
		$this->weAdress = do_shortcode('[weAdress]');
		$this->weHoraire = do_shortcode('[weHoraire]');
		$this->weSiteName = do_shortcode('[weSiteName]');
		$this->weSiteUrl = do_shortcode('[weSiteUrl]');
		$this->phoneNumber1 = do_shortcode('[phoneNumber1]');
		$this->phoneNumber2 = do_shortcode('[phoneNumber2]');
		
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        echo $args['before_widget'];
        
		// if ( ! empty( $instance['title'] ) ) {
		// 	echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        // }
		
		$vFooter = $instance['footerType'];

        // widget content
		echo $this->footerHtml($vFooter);

        
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$footerType = ! empty( $instance['footerType'] ) ? $instance['footerType'] : esc_html__( '', 'wefooter_domain' );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'footerType' ) ); ?> ">
				<?php esc_attr_e('Footer type :', 'wefooter_domain'); ?>
			</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'footerType' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'footerType' ) ); ?>"
			>
				<option value="v1" <?php if(esc_attr( $footerType ) == "v1") echo 'selected="selected"'; ?> >Version 1</option>
				<option value="v2" <?php if(esc_attr( $footerType ) == "v2") echo 'selected="selected"'; ?> >Version 2</option>
			</select>
		</p>

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['footerType'] = ( ! empty( $new_instance['footerType'] ) ) ? sanitize_text_field( $new_instance['footerType'] ) : '';

		return $instance;
	}

	private function footerHtml($typeFtr){

		if ($typeFtr == "v1") {
			return $this->footerV1();
		}
		else if ($typeFtr == "v2") {
			return "Hi We Footer Ver 2";
		}

		return "No Ver Selected";
        
	}


	private function footerV1(){

		$htmlF = <<<HTML
			<div class="new_footer">
		HTML;

		if ($this->phoneNumber1 != "" && $this->phoneNumber1 != null ) {			
			$htmlF .= <<<HTML
					<div class="footer_part center mb20">
						<div class="fs30 mb20 ico-color"><i class="fas fa-mobile-alt"></i></div>
						<div class=" fs18 mb20 upper  text-color title">Téléphone</div>
						<div class=" fs13 text-info-color ">  {$this->phoneNumber1}  </div>
						<div class=" fs13 text-info-color ">  {$this->phoneNumber2}  </div>
					</div>
			
			HTML;
		}

		if ($this->weAdress != "" && $this->weAdress != null ) {			
		
			$htmlF .= <<<HTML
					<div class="footer_part center mb20">
						<div class="fs30 mb20 ico-color"><i class="fas fa-map-marker-alt"></i></div>
						<div class=" fs18 mb20 upper  text-color title">Adresse</div>
						<div class=" fs13 text-info-color ">
							{$this->weAdress} 
						</div>
					</div>
			HTML;
		}

		if ($this->weHoraire != "" && $this->weHoraire != null ) {
			$htmlF .= <<<HTML
					<div class="footer_part center mb20">
						<div class="fs30 mb20 ico-color"><i class="far fa-clock"></i></div>
						<div class=" fs18  mb20 upper text-color title">Horaires d'ouverture</div>
						<div class=" fs13 text-info-color ">
							{$this->weHoraire} 
						</div>
					</div>
			HTML;
		}

		$htmlF .= <<<HTML
			</div>
		HTML;

		return $htmlF;
        
	}

} // class Foo_Widget