<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class edumela_Widget_Counter extends Widget_Base {
 
   public function get_name() {
      return 'counter';
   }
 
   public function get_title() {
      return esc_html__( 'Counter', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Counter', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'Choose Icon', 'edumela' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'counter',
         [
            'label' => __( 'Counter Value', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '123'
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Students registered','edumela' )
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
   // get our input from the widget settings.
    
   $settings = $this->get_settings_for_display();
   
   //Inline Editing
   $this->add_inline_editing_attributes( 'title', 'basic' );
   $this->add_inline_editing_attributes( 'counter', 'basic' );
   
   ?>

   <div class="single-counter text-center mb-50">
      <div class="counter-icon mb-30">
         <img src="<?php echo esc_html( $settings['icon']['url'] ); ?>" alt="icon">
      </div>
      <div class="counter-content">
         <h2 class="count"><?php echo esc_html( $settings['counter'] ); ?></h2>
         <span><?php echo esc_html( $settings['title'] ); ?></span>
      </div>
   </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Counter );