<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class edumela_Widget_Feature extends Widget_Base {
 
   public function get_name() {
      return 'feature';
   }
 
   public function get_title() {
      return esc_html__( 'Feature', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-featured-image';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'feature_section',
         [
            'label' => esc_html__( 'Feature', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'feature_icon', [
            'label' => __( 'Feature Icon', 'edumela' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Experienced lecturers','edumela'),
         ]
      );

      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text in site dummy content and data. Replace orginal text here.','edumela'),
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Download','edumela'),
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
        'colors',
        [
          'label' => __( 'Colors', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 'solid',
          'options' => [
            'default'  => __('Blue' , 'edumela' ),
            'red'      => __('Red' , 'edumela' ),
            'green'    => __('Green' , 'edumela' ),
          ],
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

      <div class="single-features <?php echo $settings['colors'] ?>">
          <div class="features-icon mb-25">
              <img src="<?php echo $settings['feature_icon']['url'] ?>" alt="<?php echo $settings['title']; ?>">
          </div>
          <div class="features-content">
              <h4><?php echo $settings['title']; ?></h4>
              <p><?php echo esc_html($settings['text']); ?></p>
              <div class="features-more">
                  <a href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?> <i class="arrow_right"></i></a>
              </div>
          </div>
      </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Feature );