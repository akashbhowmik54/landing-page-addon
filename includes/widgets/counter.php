<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit;

class CounterWidget extends Widget_Base {
    public function get_name() {
        return 'counter_widget';
    }

    public function get_title() {
        return __( 'ST Counter', 'landing-page-addon' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        // === Content Section ===
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Counter Content', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'counter_number',
            [
                'label'       => __( 'Number', 'landing-page-addon' ),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 9,
            ]
        );

        $this->add_control(
            'counter_suffix',
            [
                'label'       => __( 'Suffix', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => '+',
                'placeholder' => __( 'Enter suffix (e.g., +, %, k)', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'counter_title',
            [
                'label'       => __( 'Title Text', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Years', 'landing-page-addon' ),
                'placeholder' => __( 'Enter title', 'landing-page-addon' ),
            ]
        );

        $this->add_control(
            'counter_desc',
            [
                'label'       => __( 'Description', 'landing-page-addon' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'The most outstanding real estate projects in your area.', 'landing-page-addon' ),
                'placeholder' => __( 'Enter description', 'landing-page-addon' ),
            ]
        );

        $this->end_controls_section();

        // === Style Section ===

        $this->start_controls_section(
            'stat_box_style',
            [
                'label' => __('Card', 'landing-page-addon'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'stat_box_background',
                'label'    => __('Background', 'landing-page-addon'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .stat-box',
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'stat_box_border',
                'selector' => '{{WRAPPER}} .stat-box',
            ]
        );

        // Border Radius
        $this->add_control(
            'stat_box_border_radius',
            [
                'label'      => __('Border Radius', 'landing-page-addon'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .stat-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Box Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'stat_box_box_shadow',
                'selector' => '{{WRAPPER}} .stat-box',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Content', 'landing-page-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Number Style
        $this->add_control(
            'number_heading',
            [
                'label' => __( 'Number', 'landing-page-addon' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label'     => __( 'Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .stat-box .single-counter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'number_typography',
                'selector' => '{{WRAPPER}} .stat-box .single-counter',
            ]
        );

        $this->add_responsive_control(
            'number_margin',
            [
                'label'      => __( 'Margin', 'landing-page-addon' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .stat-box .single-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Title Style
        $this->add_control(
            'title_heading',
            [
                'label' => __( 'Title', 'landing-page-addon' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333',
                'selectors' => [
                    '{{WRAPPER}} .stat-box .counter-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .stat-box .counter-title',
            ]
        );

        // Description Style
        $this->add_control(
            'desc_heading',
            [
                'label' => __( 'Description', 'landing-page-addon' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label'     => __( 'Color', 'landing-page-addon' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#666',
                'selectors' => [
                    '{{WRAPPER}} .stat-box p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'desc_typography',
                'selector' => '{{WRAPPER}} .stat-box p',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="stat-box">
            <h4>
                <span class="single-counter" data-number="<?php echo esc_attr( $settings['counter_number'] ); ?>">
                    <?php echo esc_html( $settings['counter_number'] . $settings['counter_suffix'] ); ?>
                </span> 
                <span class="counter-title"><?php echo esc_html( $settings['counter_title'] ); ?></span>
            </h4>
            <p><?php echo esc_html( $settings['counter_desc'] ); ?></p>
        </div>
        <?php
    }
}
