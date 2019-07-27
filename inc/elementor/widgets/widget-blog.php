<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class edumela_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'edumela' ),
            'type' => Controls_Manager::SECTION,
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

      <div class="container">
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post();
               ?>
                <div class="single-side-post">
                    <div class="side-post-thumb">
                        <?php the_post_thumbnail('edumela-192-173') ?>
                    </div>
                    <div class="side-post-content">
                        <div class="post-date">
                            <span><?php echo get_the_time() ?></span>
                        </div>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></h5>
                        <a href="<?php the_permalink() ?>"><?php echo esc_html__( 'Read more', 'edumela' ) ?> <i class="arrow_carrot-2right"></i></a>
                    </div>
                </div>
               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_Blog );