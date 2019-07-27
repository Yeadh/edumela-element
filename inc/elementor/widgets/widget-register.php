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
        return 'eicon-registerd-image';
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
         'register_icon', [
            'label' => __( 'register Icon', 'edumela' ),
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

      <div class="single-registers <?php echo $settings['colors'] ?>">
          <div class="registers-icon mb-25">
              <img src="<?php echo $settings['register_icon']['url'] ?>" alt="<?php echo $settings['title']; ?>">
          </div>
          <div class="registers-content">
              <h4><?php echo $settings['title']; ?></h4>
              <p><?php echo esc_html($settings['text']); ?></p>
              <div class="registers-more">
                  <a href="<?php echo esc_url($settings['btn_url']); ?>"><?php echo esc_html($settings['btn_text']); ?> <i class="arrow_right"></i></a>
              </div>
          </div>
      </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_register );