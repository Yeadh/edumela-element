<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit;

// courses
class edumela_Widget_courses extends Widget_Base {
 
   public function get_name() {
      return 'courses';
   }
 
   public function get_title() {
      return esc_html__( 'Courses', 'edumela' );
   }
 
   public function get_icon() { 
        return 'eicon-info-box';
   }
 
   public function get_categories() {
      return [ 'edumela-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'courses',
         [
            'label' => esc_html__( 'courses', 'edumela' ),
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

      $this->add_control(
         'numberofpost',
         [
            'label' => __( 'Number of post', 'edumela' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
               '%' => [
                  'min' => 3,
                  'max' => 100,
               ],
            ],
            'default' => [
               'unit' => '%',
               'size' => 6,
            ],
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="course-filter">
                  <ul class="list-inline">
                     <li class="list-inline-item select-cat" data-filter="*">All Works</li>
                     <?php  $course_menu_terms = get_terms( array(
                         'taxonomy' => 'course_category',
                         'hide_empty' => false,
                     ) ); 
                     
                     foreach ( $course_menu_terms as $course_menu_term ) { ?>
                     <li class="list-inline-item" data-filter=".<?php echo esc_attr( $course_menu_term->slug ) ?>"><?php echo esc_html( $course_menu_term->name ) ?></li>

                     <?php } ?>
                  </ul>
               </div>
            </div>
            <div class="col-sm-12">
               <div class="isotope_items row">
               <?php

               $course = new \WP_Query( array( 
                  'post_type' => 'lp_course',
                  'posts_per_page' => $settings['numberofpost']['size'],
                  'order' => $settings['order'],
               ));

               /* Start the Loop */
               while ( $course->have_posts() ) : $course->the_post(); 

                 $course_terms = get_the_terms( get_the_ID() , 'course_category' );

               ?>
               <div class="col-md-6 col-xl-4 <?php foreach ($course_terms as $course_term) { echo esc_attr( $course_term->slug.' ' ); } ?>">
                  <?php get_template_part( 'template-parts/content', 'course' ); ?>
               </div>
               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
            </div>
         </div>
      </div>
   </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_courses );