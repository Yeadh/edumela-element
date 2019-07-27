<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class edumela_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'testimonials',
         [
            'label' => esc_html__( 'Testimonials', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'edumela' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- testimonial-area -->
      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="testimonial-active">
              <?php foreach ($settings['testimonial_list'] as $testimonial_single): ?>
                  <div class="single-testimonial">
                      <div class="testimonial-content text-center">
                          <p><?php echo esc_html($testimonial_single['testimonial']); ?></p>
                          <div class="testimonial-avatar mt-20">
                              <h5><?php echo esc_html($testimonial_single['name']); ?></h5>
                              <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                          </div>
                      </div>
                  </div>
              <?php endforeach ?>
            </div>
        </div>
      </div>
   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Testimonials );