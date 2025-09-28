<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) exit;

class AboutWidget extends Widget_Base {
    public function get_name() { 
        return 'about_widget'; 
    }
    public function get_title() { 
        return 'About Section'; 
    }
    public function get_icon() { 
        return 'eicon-person'; 
    }
    public function get_categories() { 
        return ['general']; 
    }

    protected function register_controls() {
        /**
         * Content Section
         */
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'       => __( 'Subtitle', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'About Us', 'landing-page-addon' ),
                'placeholder' => __( 'Enter subtitle', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'We Build Your Dream', 'landing-page-addon' ),
                'placeholder' => __( 'Enter title', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Learn More', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'         => __( 'Button Link', 'landing-page-addon' ),
                'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'landing-page-addon' ),
                'default'       => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label'   => __( 'About Image', 'landing-page-addon' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style - Wrapper
         */
        $this->start_controls_section(
            'wrapper_style',
            [
                'label' => __( 'Wrapper Box', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'wrapper_bg',
                'selector' => '{{WRAPPER}} .about-section',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'wrapper_border',
                'selector' => '{{WRAPPER}} .about-section',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'wrapper_shadow',
                'selector' => '{{WRAPPER}} .about-section',
            ]
        );
        $this->add_responsive_control('wrapper_padding', [
            'label'      => __( 'Padding', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors'  => ['{{WRAPPER}} .about-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->add_responsive_control('wrapper_margin', [
            'label'      => __( 'Margin', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors'  => ['{{WRAPPER}} .about-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);

        $this->end_controls_section();

        /**
         * Style - Subtitle
         */
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => __( 'Subtitle', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'subtitle_color',
            [
                'label'     => __( 'Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .about-subtitle' => 'color: {{VALUE}}'],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .about-subtitle',
            ]
        );
        $this->add_responsive_control('subtitle_padding', [
            'label'      => __( 'Padding', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .about-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->add_responsive_control('subtitle_margin', [
            'label'      => __( 'Margin', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .about-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->end_controls_section();

        /**
         * Style - Title
         */
        $this->start_controls_section(
            'title_style',
            [
                'label' => __( 'Title', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .about-title' => 'color: {{VALUE}}'],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .about-title',
            ]
        );
        $this->add_responsive_control('title_padding', [
            'label'      => __( 'Padding', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .about-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->add_responsive_control('title_margin', [
            'label'      => __( 'Margin', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .about-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->end_controls_section();

        /**
         * Style - Description
         */
        $this->start_controls_section(
            'description_style',
            [
                'label' => __( 'Description', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label'     => __( 'Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .about-description' => 'color: {{VALUE}}'],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'desc_typography',
                'selector' => '{{WRAPPER}} .about-description',
            ]
        );
        $this->add_responsive_control('desc_padding', [
            'label'      => __( 'Padding', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .about-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->add_responsive_control('desc_margin', [
            'label'      => __( 'Margin', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .about-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->end_controls_section();

        /**
         * Style - Button
         */
        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'btn_text_color',
            [
                'label'     => __( 'Text Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .about-button' => 'color: {{VALUE}}'],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label'     => __( 'Background Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .about-button' => 'background-color: {{VALUE}}'],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typography',
                'selector' => '{{WRAPPER}} .about-button',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border',
                'selector' => '{{WRAPPER}} .about-button',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'btn_shadow',
                'selector' => '{{WRAPPER}} .about-button',
            ]
        );
        $this->add_responsive_control('btn_padding', [
            'label'      => __( 'Padding', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .about-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->add_responsive_control('btn_margin', [
            'label'      => __( 'Margin', 'landing-page-addon' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'selectors'  => ['{{WRAPPER}} .btn-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
        ]);
        $this->end_controls_section();

        /**
         * Style - Image
         */
        $this->start_controls_section(
            'image_style',
            [
                'label' => __( 'Image', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'selector' => '{{WRAPPER}} .about-image img',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'image_shadow',
                'selector' => '{{WRAPPER}} .about-image img',
            ]
        );
        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="about-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="about-content">
                            <?php if ( ! empty( $settings['subtitle'] ) ) : ?>
                                <h6 class="about-subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></h6>
                            <?php endif; ?>

                            <?php if ( ! empty( $settings['title'] ) ) : ?>
                                <h2 class="about-title"><?php echo esc_html( $settings['title'] ); ?></h2>
                            <?php endif; ?>

                            <?php if ( ! empty( $settings['description'] ) ) : ?>
                                <p class="about-description"><?php echo esc_html( $settings['description'] ); ?></p>
                            <?php endif; ?>

                            <?php if ( ! empty( $settings['button_text'] ) ) : ?>
                                <div class="btn-wrapper">
                                    <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="about-button">
                                        <?php echo esc_html( $settings['button_text'] ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="about-image">
                            <?php if ( ! empty( $settings['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <?php
    }
}
