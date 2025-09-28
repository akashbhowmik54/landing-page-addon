<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit;

class TestimonialWidget extends Widget_Base {
    public function get_name() {
        return 'testimonial_widget';
    }

    public function get_title() {
        return __( 'ST Testimonial', 'landing-page-addon' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        // Section Heading & Description
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Section Content', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_heading',
            [
                'label'       => __( 'Heading', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'What Our Customers Are Saying', 'landing-page-addon' ),
                'placeholder' => __( 'Enter section heading', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label'       => __( 'Description', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Architecture blends artistry and functionality, shaping spaces that inspire & endure. It harmonizes structure, aesthetics & human experience to create timeless designs.', 'landing-page-addon' ),
                'placeholder' => __( 'Enter section description', 'landing-page-addon' ),
            ]
        );

        $this->end_controls_section();

        // Testimonials Repeater
        $this->start_controls_section(
            'testimonial_content',
            [
                'label' => __( 'Testimonials', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'testimonial_thumb',
            [
                'label'   => __( 'Client Image', 'landing-page-addon' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_review',
            [
                'label'   => __( 'Review Text', 'landing-page-addon' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __( 'Your testimonial text goes here.', 'landing-page-addon' ),
            ]
        );

        $repeater->add_control(
            'testimonial_name',
            [
                'label'   => __( 'Client Name', 'landing-page-addon' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'John Doe', 'landing-page-addon' ),
            ]
        );

        $repeater->add_control(
            'testimonial_position',
            [
                'label'   => __( 'Client Position', 'landing-page-addon' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'CEO, Company', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label'       => __( 'Testimonials List', 'landing-page-addon' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'testimonial_thumb'   => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'testimonial_name'    => __( 'Sarah James', 'landing-page-addon' ),
                        'testimonial_position'=> __( 'Commercial Property Developer', 'landing-page-addon' ),
                        'testimonial_review'  => __( 'The crew completed our commercial renovation project ahead of schedule and within budget. Their work ethic, transparency, and craftsmanship are truly top-notch.', 'landing-page-addon' ),
                    ],
                    [
                        'testimonial_thumb'   => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'testimonial_name'    => __( 'Michael Smith', 'landing-page-addon' ),
                        'testimonial_position'=> __( 'Real Estate Consultant', 'landing-page-addon' ),
                        'testimonial_review'  => __( 'They delivered everything on time with exceptional quality. Highly recommended for any renovation or construction project.', 'landing-page-addon' ),
                    ],
                ],
                'title_field' => '{{{ testimonial_name }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="testimonal">
            <div class="container-fluid">
                <div class="row">
                    <!-- Left Column Images -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial-left-area">
                            <div class="testimonial-img-wrapper">
                                <?php if ( ! empty( $settings['testimonials'] ) ) : ?>
                                    <?php foreach ( $settings['testimonials'] as $index => $item ) : ?>
                                        <img src="<?php echo esc_url( $item['testimonial_thumb']['url'] ); ?>"
                                             class="testimonial-img <?php echo $index === 0 ? 'active' : ''; ?>"
                                             alt="<?php echo esc_attr( $item['testimonial_name'] ); ?>">
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column Testimonials -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial-right-area">
                            <div class="top-content">
                                <div class="heading">
                                    <h2><?php echo esc_html( $settings['section_heading'] ); ?></h2>
                                </div>
                                <div class="description">
                                    <p><?php echo esc_html( $settings['section_description'] ); ?></p>
                                </div>
                            </div>

                            <div class="testimonial-wrapper">
                                <div class="swiper testimonalCarrousel">
                                    <div class="swiper-wrapper">
                                        <?php if ( ! empty( $settings['testimonials'] ) ) : ?>
                                            <?php foreach ( $settings['testimonials'] as $item ) : ?>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-item">
                                                        <div class="review-text">
                                                            <h6>"<?php echo esc_html( $item['testimonial_review'] ); ?>"</h6>
                                                        </div>
                                                        <div class="author-info">
                                                            <h5><?php echo esc_html( $item['testimonial_name'] ); ?></h5>
                                                            <p><?php echo esc_html( $item['testimonial_position'] ); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Slider Navigation -->
                            <div class="slider-navigation">
                                <span class="swiper-button-prev-custom">
                                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 5.07179C22 6.22649 22 5.77149 22 6.92012C21.8754 6.92012 21.7667 6.92012 21.6559 6.92012C18.5001 6.92012 13.5349 6.92012 10.381 6.92012C10.0647 6.92012 10.0647 6.92012 10.0647 7.23559C10.0647 8.45703 10.0647 10.4631 10.0647 11.6845C10.0647 11.7715 10.0647 11.8584 10.0647 12C6.69527 9.98989 3.36741 8.00404 -1.38246e-06 5.99595C3.35555 3.99393 6.68539 2.00607 10.0488 8.62545e-07C10.0548 0.123358 10.0627 0.208291 10.0627 0.293225C10.0627 1.53084 10.0686 3.55308 10.0587 4.7907C10.0568 5.01719 10.12 5.07988 10.3415 5.07786C13.5052 5.07179 18.4784 5.07381 21.6421 5.07381C21.7509 5.07179 21.8636 5.07179 22 5.07179Z"
                                            fill="#ADADAD" />
                                    </svg>
                                </span>
                                <span class="swiper-button-next-custom">
                                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 5.07179C22 6.22649 22 5.77149 22 6.92012C21.8754 6.92012 21.7667 6.92012 21.6559 6.92012C18.5001 6.92012 13.5349 6.92012 10.381 6.92012C10.0647 6.92012 10.0647 6.92012 10.0647 7.23559C10.0647 8.45703 10.0647 10.4631 10.0647 11.6845C10.0647 11.7715 10.0647 11.8584 10.0647 12C6.69527 9.98989 3.36741 8.00404 -1.38246e-06 5.99595C3.35555 3.99393 6.68539 2.00607 10.0488 8.62545e-07C10.0548 0.123358 10.0627 0.208291 10.0627 0.293225C10.0627 1.53084 10.0686 3.55308 10.0587 4.7907C10.0568 5.01719 10.12 5.07988 10.3415 5.07786C13.5052 5.07179 18.4784 5.07381 21.6421 5.07381C21.7509 5.07179 21.8636 5.07179 22 5.07179Z"
                                            fill="#ADADAD" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
