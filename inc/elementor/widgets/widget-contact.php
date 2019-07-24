<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// contact item
class edumela_Widget_Contact extends Widget_Base {
 
   public function get_name() {
      return 'Contact item';
   }
 
   public function get_title() {
      return esc_html__( 'Contact Item', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'contact_section',
         [
            'label' => esc_html__( 'Contact Item', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'edumela' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Call us','edumela'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG
         ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'icon', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>

      <div class="single-contact-info mb-30 text-center">
           <div class="contact-icon mb-30">
               <img src="<?php echo esc_attr($settings['icon']['url']); ?>" alt="img">
           </div>
           <div class="contact-info-content">
               <h4><?php echo esc_html($settings['title']); ?></h4>
               <p><?php echo $settings['text'] ?></p>
           </div>
       </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Contact );