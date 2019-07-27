<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class edumela_Widget_Title extends Widget_Base {
 
   public function get_name() {
      return 'title';
   }
 
   public function get_title() {
      return esc_html__( 'Title', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-site-title';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Title', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      
      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Blog and events','edumela')
         ]
      );

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Sub Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Read what our clients say about us read what our clients say about us','edumela')
         ]
      );

      $this->add_control(
         'd_bg',
         [
            'label' => __( 'Dark Background', 'edumela' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'edumela' ),
            'label_off' => __( 'Off', 'edumela' ),
            'return_value' => 'yes',
            'default' => 'no',   
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10">
                <div class="section-title <?php if( 'yes' == $settings['d_bg'] ){ echo'white-title'; } ?> mb-45 text-center">
                  <h2><?php echo esc_html($settings['title']); ?></h2>
                  <?php if ($settings['sub-title']): ?>
                     <p><?php echo esc_html($settings['sub-title']); ?></p>
                  <?php endif ?>                  
                </div>
            </div>
        </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Title );