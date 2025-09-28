<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) exit;

class ServicesWidget extends Widget_Base {
    public function get_name() { 
        return 'service_widget'; 
    }
    public function get_title() { 
        return 'ST Services'; 
    }
    public function get_icon() { 
        return 'eicon-tools'; 
    }
    public function get_categories() { 
        return ['general']; 
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Section Title', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_heading',
            [
                'label'       => __( 'Heading', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Our Services', 'landing-page-addon' ),
                'placeholder' => __( 'Enter section title', 'landing-page-addon' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'services_section',
            [
                'label' => __( 'Services', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'service_icon',
            [
                'label' => __( 'Service Icon', 'landing-page-addon' ),
                'type'  => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'eicon-star',  
                    'library' => 'elementor', 
                ],
            ]
        );

        $repeater->add_control(
            'service_title',
            [
                'label'       => __( 'Service Title', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Web Development', 'landing-page-addon' ),
                'placeholder' => __( 'Enter service title', 'landing-page-addon' ),
            ]
        );

        $repeater->add_control(
            'service_desc',
            [
                'label'       => __( 'Service Description', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'We build fast, scalable and responsive web & mobile apps tailored to your business needs with a user-first approach.', 'landing-page-addon' ),
                'placeholder' => __( 'Enter service description', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'services_list',
            [
                'label'   => __( 'Service Items', 'landing-page-addon' ),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => __( 'Web Development', 'landing-page-addon' ),
                        'service_desc'  => __( 'We build fast, scalable and responsive web & mobile apps tailored to your business needs.', 'landing-page-addon' ),
                    ],
                    [
                        'service_title' => __( 'App Development', 'landing-page-addon' ),
                        'service_desc'  => __( 'Intuitive, sleek, and user-centric designs that elevate engagement.', 'landing-page-addon' ),
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );

        $this->end_controls_section();

         /** ========== Style Tab ========== */
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Section Title', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_title_color',
            [
                'label'     => __( 'Text Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'section_title_typography',
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'service_box_style',
            [
                'label' => __( 'Service Box', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'box_background',
                'selector' => '{{WRAPPER}} .services .box',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'selector' => '{{WRAPPER}} .services .box',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'selector' => '{{WRAPPER}} .services .box',
            ]
        );

        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => __( 'Padding', 'landing-page-addon' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'selectors'  => [
                    '{{WRAPPER}} .services .box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => __( 'Margin', 'landing-page-addon' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'selectors'  => [
                    '{{WRAPPER}} .services .box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'service_title_style',
            [
                'label' => __( 'Service Title', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_title_color',
            [
                'label'     => __( 'Text Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services .box h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'service_title_typography',
                'selector' => '{{WRAPPER}} .services .box h2',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'service_desc_style',
            [
                'label' => __( 'Service Description', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_desc_color',
            [
                'label'     => __( 'Text Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services .box p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'service_desc_typography',
                'selector' => '{{WRAPPER}} .services .box p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'service_icon_style',
            [
                'label' => __( 'Service Icon', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_icon_color',
            [
                'label'     => __( 'Icon Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services .box .service-icon'                           => 'color: {{VALUE}}; fill: {{VALUE}};',
                    '{{WRAPPER}} .services .box .service-icon .elementor-icon'           => 'color: {{VALUE}}; fill: {{VALUE}};',
                    '{{WRAPPER}} .services .box .service-icon .elementor-icon i'         => 'color: {{VALUE}};',
                    '{{WRAPPER}} .services .box .service-icon .elementor-icon svg'       => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .services .box .service-icon .elementor-icon svg path'  => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_icon_size',
            [
                'label' => __( 'Icon Size', 'landing-page-addon' ),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 8,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .services .box .service-icon .elementor-icon i'   => 'font-size: {{SIZE}}{{UNIT}}; line-height: 1;',
                    '{{WRAPPER}} .services .box .service-icon'                  => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; display: inline-flex; align-items: center; justify-content: center;',
                    '{{WRAPPER}} .services .box .service-icon .elementor-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_icon_spacing',
            [
                'label'      => __( 'Icon Spacing', 'landing-page-addon' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .services .box .service-icon' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}}; margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
            <section class="services">
                <div class="container-fluid">
                    <?php if ( ! empty( $settings['section_heading'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $settings['section_heading'] ); ?></h2>
                    <?php endif; ?>

                    <div class="boxes">
                        <?php if ( $settings['services_list'] ) : ?>
                            <?php foreach ( $settings['services_list'] as $service ) : ?>
                                <div class="box">
                                    <div class="heading">
                                        <?php if ( ! empty( $service['service_icon']['value'] ) ) : ?>
                                            <span class="service-icon">
                                                <?php \Elementor\Icons_Manager::render_icon( $service['service_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </span>
                                        <?php endif; ?>
                                        <h2><?php echo esc_html( $service['service_title'] ); ?></h2>
                                    </div>
                                    <div class="content">
                                        <p><?php echo esc_html( $service['service_desc'] ); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php
    }
}
