<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class edumela_Widget_featurelist extends Widget_Base {
 
   public function get_name() {
      return 'featurelist';
   }
 
   public function get_title() {
      return esc_html__( 'Feature List', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-editor-list-ul';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'featurelist_section',
         [
            'label' => esc_html__( 'featurelist', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();
      
      $repeater->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'edumela' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
              'flaticon-roll'  => __( 'Roll', 'plugin-domain' ),
              'flaticon-book' => __( 'Book', 'plugin-domain' ),
              'flaticon-speech' => __( 'Speech', 'plugin-domain' ),
              'flaticon-research' => __( 'Research', 'plugin-domain' ),
              'flaticon-pencil-case'   => __( 'Pencil Case', 'plugin-domain' ),
              'flaticon-computer'   => __( 'Computer', 'plugin-domain' ),
              'flaticon-digital-marketing'   => __( 'Digital Marketing', 'plugin-domain' ),
              'flaticon-maintenance'   => __( 'Maintenance', 'plugin-domain' ),
              'flaticon-support'   => __( 'Support', 'plugin-domain' ),
              'flaticon-bar-chart'   => __( 'Bar Chart', 'plugin-domain' ),
              'flaticon-startup'   => __( 'Startup', 'plugin-domain' ),
              'flaticon-view'   => __( 'View', 'plugin-domain' ),
              'flaticon-high-heels'   => __( 'High Heels', 'plugin-domain' ),
              'flaticon-make-up'   => __( 'Make Up', 'plugin-domain' ),
              'flaticon-ring'   => __( 'Ring', 'plugin-domain' )
            ]
            
         ]
      );

      $repeater->add_control(
         'title',
         [
            'label' => __( 'Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $repeater->add_control(
         'text',
         [
            'label' => __( 'Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'edumela' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{title}}',

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

      <div class="teach-list">
        <ul>
          <?php 
            foreach (  $settings['feature_list'] as $index => $feature ) { ?>
            <li>
                <div class="teach-icon"><i class="<?php echo $feature['icon'] ?>"></i></div>
                <div class="teach-list-content">
                    <h4><?php echo $feature['title'] ?></h4>
                    <p><?php echo $feature['text'] ?></p>
                </div>
            </li>
          <?php } ?>
        </ul>
    </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_featurelist );