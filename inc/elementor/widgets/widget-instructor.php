<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// instructor item
class edumela_Widget_instructor extends Widget_Base {
 
   public function get_name() {
      return 'instructor';
   }
 
   public function get_title() {
      return esc_html__( 'instructor', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-person';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }
   protected function _register_controls() {

      $this->start_controls_section(
         'instructor_section',
         [
            'label' => esc_html__( 'instructor', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'num',
         [
            'label' => __( 'number of instructor', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 3

         ]
      );

      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?> 

      <div class="row">
        <?php 
        // The Query
        $user_query = new \WP_User_Query( array(
        'role' => 'lp_teacher',
        'number' => $settings['num']
        ) );

        // User Loop
        if ( ! empty( $user_query->get_results() ) ) {
        foreach ( $user_query->get_results() as $user ) { ?>

        <div class="col-lg-4 col-md-6">
          <div class="single-instructor">
              <div class="instructor-thumb">
                  <?php echo get_avatar( $user->ID , 795 ); ?>
                  <div class="instructor-overlay">
                      <h3><?php echo $user->display_name; ?></h3>
                      <span><?php echo $user->designation; ?></span>
                  </div>
              </div>
          </div>
        </div> 
        <?php }
          } ?>
      </div>

   <?php }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_instructor );