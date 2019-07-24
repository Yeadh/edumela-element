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
            'default' => __('We offer All kind service features','edumela')
         ]
      );

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Sub Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are used here so replace your app data, Lorem ipsum dummy text are used here so replace your app data dummy text are','edumela')
         ]
      );

      $this->add_control(
         'border',
         [
            'label' => __( 'Border Bottom', 'edumela' ),
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
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'sub-title', 'basic' );
      $this->add_inline_editing_attributes( 'border', 'basic' );
      
      ?>
      <div class="section-title text-center border-none mb-75">
        <h2 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo esc_html($settings['title']); ?></h2>
        <p <?php echo $this->get_render_attribute_string( 'sub-title' ); ?>><?php echo esc_html($settings['sub-title']); ?></p>
      </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Title );