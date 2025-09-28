<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit;

class BlogWidget extends Widget_Base {
    public function get_name() {
        return 'blog_widget';
    }

    public function get_title() {
        return __( 'ST Blog', 'landing-page-addon' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {
        // Blog Settings Section
        $this->start_controls_section(
            'blog_section',
            [
                'label' => __( 'Blog Settings', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label'   => __( 'Number of Posts', 'landing-page-addon' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 12,
            ]
        );

        $this->add_control(
            'show_meta',
            [
                'label'        => __( 'Show Meta Info', 'landing-page-addon' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'landing-page-addon' ),
                'label_off'    => __( 'Hide', 'landing-page-addon' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $args = [
            'post_type'      => 'post',
            'posts_per_page' => $settings['posts_per_page'],
        ];

        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) :
        ?>
        <section class="blog-and-news-area">
            <div class="container-fluid">
                <div class="blog-title-wrapper inner-spacing">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-7">
                            <div class="top-content">
                                <div class="heading">
                                    <h2><?php echo __( 'Latest Blog & News', 'landing-page-addon' ); ?></h2>
                                </div>
                                <div class="description">
                                    <p><?php echo __( 'Check out our latest articles, tips, and insights.', 'landing-page-addon' ); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-5 d-flex align-items-center">
                            <div class="button-wrapper">
                                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="primary-btn">
                                    <span><?php echo __( 'View More', 'landing-page-addon' ); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog-items-wrapper">
                    <div class="row g-custom-32">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="blog-item">
                                    <div class="feature-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'medium' ); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url( plugins_url( '/assets/img/placeholder.png', __FILE__ ) ); ?>" alt="<?php the_title(); ?>">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-info">
                                            <?php if ( 'yes' === $settings['show_meta'] ) : ?>
                                                <div class="blog-meta">
                                                    <div class="meta-item">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <i class="ri-time-line"></i>
                                                            <span><?php echo get_the_date(); ?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <h6><?php the_title(); ?></h6>
                                            </a>
                                        </div>
                                        <div class="blog-excerpt">
                                            <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        endif;
    }
}
