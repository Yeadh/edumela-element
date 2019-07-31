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
        return 'eicon-form-horizontal';
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
         'style',
         [
            'label' => __( 'Layout Style', 'edumela' ),
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
            'default' => __( 'Registration now', 'edumela' ),
         ]
      );

      $this->add_control(
         'sub_title',
         [
            'label' => __( 'Sub Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Get 100 course of online course for free!', 'edumela' ),
            'condition' => ['style' => 'style2']
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'Button Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Watch intro video', 'edumela' ),
            'condition' => ['style' => 'style2']
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'Button URL', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            'condition' => ['style' => 'style2']
         ]
      );

      $this->add_control(
         'year',
         [
            'label' => __( 'Year', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 2019,
            'condition' => ['style' => 'style1']
         ]
      );

      $this->add_control(
         'month',
         [
            'label' => __( 'Month', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 9,
            'condition' => ['style' => 'style1']
         ]
      );

      $this->add_control(
        'day',
        [
          'label' => __( 'Day', 'edumela' ),
          'type' => \Elementor\Controls_Manager::DATE_TIME,
          'default' => 30,
          'condition' => ['style' => 'style1']
        ]
      );

      $this->add_control(
        'shortcode',
        [
          'label' => __( 'Contact form 7 shortcode', 'edumela' ),
          'type' => \Elementor\Controls_Manager::TEXTAREA,
          'default' => '[contact-form-7 id="5" title="Register"]',
          'condition' => ['style' => 'style2']
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
      <?php if ( $settings['style'] == 'style1' ){ ?>

      <div class="row justify-content-center">
          <div class="col-xl-10">
            
              <div class="reg-form mb-70 text-center">
                  <form action="#">
                      <input type="text" placeholder="Name">
                      <input type="email" placeholder="Email">
                      <button class="btn"><?php echo $settings['title'] ?></button>
                  </form>
              </div>
              <div class="coming-time-wrap text-center">
                  <div class="coming-time" data-countdown="<?php echo $settings['year'] ?>/<?php echo $settings['month'] ?>/<?php echo $settings['day'] ?>"></div>
              </div>
          </div>
      </div>

      <?php } elseif( $settings['style'] == 'style2' ){ ?>

      <section class="reg-area s-reg-area pt-150 pb-180 blue-overlay">
          <div class="container">
              <div class="row align-items-center justify-content-between">
                  <div class="col-xl-5 col-lg-6">
                      <div class="section-title white-title mb-60">
                          <h2><?php echo $settings['title'] ?></h2>
                          <p><?php echo $settings['sub_title'] ?></p>
                      </div>
                      <div class="reg-video">
                          <a href="<?php echo $settings['btn_url'] ?>" class="popup-video"><i class="fas fa-play"></i></a>
                          <span><?php echo $settings['btn_text'] ?></span>
                      </div>
                  </div>
                  <div class="col-xl-5 col-lg-6">
                      <div class="s-reg-form text-center">
                        <?php echo do_shortcode( $settings['shortcode'] ) ?>
                      </div>
                  </div>
              </div>
          </div>
      </section>

    <?php } ?>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_register );