<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// event
class edumela_Widget_event extends Widget_Base {
 
   public function get_name() {
      return 'event';
   }
 
   public function get_title() {
      return esc_html__( 'Event', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-calendar';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'event_section',
         [
            'label' => esc_html__( 'event', 'edumela' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Style', 'edumela' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style2',
            'options' => [
               'style1' => __( 'Style 1', 'edumela' ),
               'style2' => __( 'Style 2', 'edumela' ),
            ],
         ]
      );

      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'edumela' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'edumela' ),
               'DESC' => __( 'Descending', 'edumela' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>

         
      <?php
      $event = new \WP_Query( array( 
        'post_type' => 'event',
        'posts_per_page' => 3,
        'ignore_sticky_posts' => true,
        'order' => $settings['order'],
      ));
      /* Start the Loop */
      ?>
            
      <?php if ( $settings['style'] == 'style1' ){ ?> 
        <div class="side-event-active">
        <?php while ( $event->have_posts() ) : $event->the_post(); ?>
        <div class="single-slide-event">
           <?php the_post_thumbnail() ?>
            <div class="overlay-event">
                <div class="slide-event-date">
                    <h4><?php echo get_post_meta( get_the_ID(), 'edumela_date', 1 ) ?></h4>
                    <span><?php echo get_post_meta( get_the_ID(), 'edumela_month', 1 ) ?></span>
                </div>
                <div class="slide-event-content">
                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                    <ul>
                        <li class="event-time">
                            <i class="icon_clock_alt"></i>
                            <span>
                            <?php echo get_post_meta( get_the_ID(), 'edumela_from_time', 1 ) ?> to <?php echo get_post_meta( get_the_ID(), 'edumela_to_time', 1 ) ?>
                            </span>
                        </li>
                        <li class="event-place">
                            <i class="icon_pin_alt"></i>
                            <span><?php echo get_post_meta( get_the_ID(), 'edumela_location', 1 ) ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

      <?php endwhile; wp_reset_postdata(); ?>

      <?php } elseif( $settings['style'] == 'style2' ){ ?>

      <?php while ( $event->have_posts() ) : $event->the_post(); ?>
          <div class="single-events">
              <div class="event-thumb">
                  <?php the_post_thumbnail('edumela-325-175') ?>
              </div>
              <div class="event-content">
                  <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                  <div class="event-meta">
                      <ul>
                          <li>
                              <i class="icon_clock_alt"></i>
                              <span><?php echo get_post_meta( get_the_ID(), 'edumela_from_time', 1 ) ?> to <?php echo get_post_meta( get_the_ID(), 'edumela_to_time', 1 ) ?></span>
                          </li>
                          <li>
                              <i class="icon_pin_alt"></i>
                              <span><?php echo get_post_meta( get_the_ID(), 'edumela_location', 1 ) ?></span>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="event-date">
                  <h2><?php echo get_post_meta( get_the_ID(), 'edumela_date', 1 ) ?></h2>
                  <span><?php echo get_post_meta( get_the_ID(), 'edumela_month', 1 ) ?></span>
              </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>

      <?php
    }
  }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_event );