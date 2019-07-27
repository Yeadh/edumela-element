<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class edumela_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner_pop';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'style',
         [
            'label' => __( 'Banner Style', 'edumela' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style1',
            'options' => [
               'style1' => __( 'Style 1', 'edumela' ),
               'style2' => __( 'Style 2', 'edumela' ),
            ],
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Learn anything from anywhere, stay update','edumela')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are usually use in the print and website used Lorem ipsum dummy','edumela')
         ]
      );

      $this->add_control(
         'btn_text', [
            'label' => __( 'Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Register now','edumela')
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'URL', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <?php if ( $settings['style'] == 'style1' ){ ?>
        <!-- banner-area -->
        <section class="slider-area slider-bg">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-10">
                      <div class="slider-content pt-165 text-center">
                          <h2><?php echo esc_html($settings['title']); ?></h2>
                          <p><?php echo esc_html($settings['description']); ?></p>
                          <a href="<?php echo $settings['btn_url']; ?>" class="btn"><?php echo $settings['btn_text']; ?></a>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        <!-- banner-area-end -->
      <?php } elseif( $settings['style'] == 'style2' ){ ?>
      <?php } ?>
      
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Banner );