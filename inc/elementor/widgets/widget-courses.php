<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
      'mockup_image',
        [
          'label' => __( 'Mockup image', 'edumela' ),
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
            'default' => __('We offer All kind service courses','edumela')
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature_icon', [
            'label' => __( 'Feature Icon', 'edumela' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      
      $feature->add_control(
         'feature_title', [
            'label' => __( 'Feature Title', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Easily customizable',
         ]
      );

      $feature->add_control(
         'feature_text', [
            'label' => __( 'Feature Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Lorem ipsum dummy text are use in this section. so you should replace orginal content.lLorem dummy',
         ]
      );

      $this->add_control(
         'feature',
         [
            'label' => __( 'courses', 'edumela' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'title_field' => '{{{ feature_title }}}',
         ]
      );

      $this->add_control(
         'button_text', [
            'label' => __( 'Button Text', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('View all courses','edumela')
         ]
      );

      $this->add_control(
         'button_url', [
            'label' => __( 'Button URL', 'edumela' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );
      

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- courses-area -->
      <section class="courses-area pb-150">
        <div class="row">
                  <div class="col-12">
                      <div class="tab course-tab">
                          <ul class="tabs text-center">
                              <li class="current"><a href="#">Design</a></li>
                              <li><a href="#">Science</a></li>
                              <li><a href="#">English</a></li>
                              <li><a href="#">Business</a></li>
                              <li><a href="#">Design</a></li>
                          </ul>
                          <div class="tab_content">
                              <div class="tabs_item">
                                  <div class="projects-carousel owl-carousel">
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Mastering Illustrator: 10 Tips &
                                              tricks to speed your workflow</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Creative Writing: Crafting
                                              personal essays with impact</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="tabs_item">
                                  <div class="projects-carousel owl-carousel">
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Mastering Illustrator: 10 Tips &
                                              tricks to speed your workflow</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Creative Writing: Crafting
                                              personal essays with impact</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="tabs_item">
                                  <div class="projects-carousel owl-carousel">
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Mastering Illustrator: 10 Tips &
                                              tricks to speed your workflow</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Creative Writing: Crafting
                                              personal essays with impact</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="tabs_item">
                                  <div class="projects-carousel owl-carousel">
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Mastering Illustrator: 10 Tips &
                                              tricks to speed your workflow</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Creative Writing: Crafting
                                              personal essays with impact</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="tabs_item">
                                  <div class="projects-carousel owl-carousel">
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Mastering Illustrator: 10 Tips &
                                              tricks to speed your workflow</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">Creative Writing: Crafting
                                              personal essays with impact</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="single-course mb-30">
                                          <div class="course-thumb">
                                              <img src="img/images/course_img01.jpg" alt="img">
                                          </div>
                                          <div class="course-content">
                                              <div class="course-fee">Free</div>
                                              <div class="c-review mb-20">
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star"></i>
                                                  <i class="icon_star-half_alt"></i>
                                                  <span>(222 Reviews)</span>
                                              </div>
                                              <h3><a href="#">UI UX design basic to dvance design course</a></h3>
                                              <div class="course-meta">
                                                  <div class="c-author">
                                                      <p>By <a href="#">Ibraim emran</a></p>
                                                  </div>
                                                  <ul>
                                                      <li><i class="icon_heart"></i>288</li>
                                                      <li><i class=" icon_profile"></i> 158</li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-12">
                  <div class="courses-btn mt-20 text-center">
                      <a href="#" class="btn">Browse our all courses</a>
                  </div>
              </div>
          </div>
      </section>
      <!-- courses-area-end -->
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new edumela_Widget_courses );