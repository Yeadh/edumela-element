<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class edumela_Widget_register extends Widget_Base {
 
   public function get_name() {
      return 'register';
   }
 
   public function get_title() {
      return esc_html__( 'Register', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-form-horizontal';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'register_section',
         [
            'label' => esc_html__( 'register', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'year',
         [
            'label' => __( 'Year', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 2019,
         ]
      );

      $this->add_control(
         'month',
         [
            'label' => __( 'Month', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 9,
         ]
      );

      $this->add_control(
        'day',
        [
          'label' => __( 'Day', 'edumela' ),
          'type' => \Elementor\Controls_Manager::DATE_TIME,
          'default' => 30,
        ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>
      <div class="row justify-content-center">
          <div class="col-xl-10">
            
              <div class="reg-form mb-70 text-center">
                  <form action="#">
                      <input type="text" placeholder="Name">
                      <input type="email" placeholder="Email">
                      <button class="btn">Registration now</button>
                  </form>
              </div>
              <div class="coming-time-wrap text-center">
                  <div class="coming-time" data-countdown="<?php echo $settings['year'] ?>/<?php echo $settings['month'] ?>/<?php echo $settings['day'] ?>"></div>
              </div>
          </div>
      </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_register );