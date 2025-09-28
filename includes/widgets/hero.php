<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit;

class HeroWidget extends Widget_Base {
    public function get_name() {
        return 'hero_widget';
    }

    public function get_title() {
        return 'ST Hero Slider';
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {

        // Slides Section
        $this->start_controls_section(
            'slides_section',
            [
                'label' => __('Slides', 'landing-page-addon'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'slide_bg',
            [
                'label'   => __('Background Image', 'landing-page-addon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'slide_badge',
            [
                'label'   => __('Badge Text', 'landing-page-addon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Badge Text', 'landing-page-addon'),
            ]
        );

        $repeater->add_control(
            'slide_title',
            [
                'label'   => __('Title', 'landing-page-addon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Slide Title', 'landing-page-addon'),
            ]
        );

        $repeater->add_control(
            'slide_subtitle',
            [
                'label'   => __('Subtitle', 'landing-page-addon'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __('Slide Subtitle Text', 'landing-page-addon'),
            ]
        );

        $repeater->add_control(
            'slide_btn_text',
            [
                'label'   => __('Button Text', 'landing-page-addon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Learn More', 'landing-page-addon'),
            ]
        );

        $repeater->add_control(
            'slide_btn_link',
            [
                'label'   => __('Button Link', 'landing-page-addon'),
                'type'    => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'label'       => __('Slides', 'landing-page-addon'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'slide_badge' => 'Hero 1',
                        'slide_title' => 'Default Slide Title 1',
                        'slide_subtitle' => 'Default subtitle 1 text.',
                        'slide_btn_text' => 'Learn More',
                    ],
                    [
                        'slide_badge' => 'Hero 2',
                        'slide_title' => 'Default Slide Title 2',
                        'slide_subtitle' => 'Default subtitle 2 text.',
                        'slide_btn_text' => 'Learn More',
                    ],
                ],
                'title_field' => '{{{ slide_title }}}',
            ]
        );

        $this->end_controls_section();

        // Settings Section
        $this->start_controls_section(
            'settings_section',
            [
                'label' => __('Slider Settings', 'landing-page-addon'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_navigation',
            [
                'label' => __('Show Navigation', 'landing-page-addon'),
                'type'  => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' => __('Show Pagination Dots', 'landing-page-addon'),
                'type'  => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_counter',
            [
                'label' => __('Show Counter', 'landing-page-addon'),
                'type'  => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_progress',
            [
                'label' => __('Show Progress Bar', 'landing-page-addon'),
                'type'  => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
        'slide_style_section',
            [
                'label' => __('Slide Style', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Overlay
        $this->add_control(
            'overlay_bg_color',
            [
                'label' => __('Overlay Color', 'landing-page-addon'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.5)', 
                'selectors' => [
                    '{{WRAPPER}} .lgpa-slide::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Slide Height
        $this->add_responsive_control(
            'slide_height',
            [
                'label' => __('Slide Height', 'landing-page-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => ['min' => 300, 'max' => 1500],
                    '%' => ['min' => 30, 'max' => 100],
                ],
                'size_units' => ['px', '%', 'vh'],
                'selectors' => [
                    '{{WRAPPER}} .lgpa-slider-container' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'badge_style_section',
            [
                'label' => __('Badge', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => __('Text Color', 'landing-page-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => __('Typography', 'landing-page-addon'),
                'selector' => '{{WRAPPER}} .slide-badge',
            ]
        );

        $this->add_control(
            'badge_bg',
            [
                'label' => __('Background Color', 'landing-page-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_spacing',
            [
                'label' => __('Margin Bottom', 'landing-page-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => ['px' => ['min' => 0, 'max' => 100]],
                'selectors' => [
                    '{{WRAPPER}} .slide-badge' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'landing-page-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'landing-page-addon'),
                'selector' => '{{WRAPPER}} .slide-title',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Margin Bottom', 'landing-page-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => ['px' => ['min' => 0, 'max' => 100]],
                'selectors' => [
                    '{{WRAPPER}} .slide-title' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label' => __('Subtitle', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Color', 'landing-page-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Typography', 'landing-page-addon'),
                'selector' => '{{WRAPPER}} .slide-subtitle',
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Margin Bottom', 'landing-page-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => ['px' => ['min' => 0, 'max' => 100]],
                'selectors' => [
                    '{{WRAPPER}} .slide-subtitle' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __('Button', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => __('Text Color', 'landing-page-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => __('Background Color', 'landing-page-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'label' => __('Typography', 'landing-page-addon'),
                'selector' => '{{WRAPPER}} .slide-btn',
            ]
        );

        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => __('Padding', 'landing-page-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slide-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => __('Margin', 'landing-page-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slide-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $slides   = $settings['slides'];
        $total    = count($slides);

        if (empty($slides)) {
            return;
        }
        ?>
        <div class="lgpa-slider-container">
            <div class="lgpa-slider-wrapper">
                <?php foreach ($slides as $index => $slide) :
                    $active_class = $index === 0 ? 'active' : '';
                    $bg = $slide['slide_bg']['url'] ?? '';
                    ?>
                    <div class="lgpa-slide <?php echo esc_attr($active_class); ?>" style="background-image: url('<?php echo esc_url($bg); ?>');">
                        <div class="slide-content">
                            <?php if (!empty($slide['slide_badge'])) : ?>
                                <div class="slide-badge"><?php echo esc_html($slide['slide_badge']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($slide['slide_title'])) : ?>
                                <h1 class="slide-title"><?php echo esc_html($slide['slide_title']); ?></h1>
                            <?php endif; ?>

                            <?php if (!empty($slide['slide_subtitle'])) : ?>
                                <p class="slide-subtitle"><?php echo esc_html($slide['slide_subtitle']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($slide['slide_btn_text'])) :
                                $btn_link = $slide['slide_btn_link']['url'] ?? '#';
                                ?>
                                <a href="<?php echo esc_url($btn_link); ?>" class="slide-btn">
                                    <?php echo esc_html($slide['slide_btn_text']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($settings['show_navigation'] === 'yes') : ?>
                <button class="lgpa-nav lgpa-nav-prev" onclick="prevSlide()">‹</button>
                <button class="lgpa-nav lgpa-nav-next" onclick="nextSlide()">›</button>
            <?php endif; ?>

            <?php if ($settings['show_pagination'] === 'yes') : ?>
                <div class="lgpa-pagination">
                    <?php foreach ($slides as $index => $slide) :
                        $dot_active = $index === 0 ? 'active' : '';
                        ?>
                        <div class="lgpa-dot <?php echo esc_attr($dot_active); ?>" onclick="currentSlide(<?php echo $index + 1; ?>)"></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_counter'] === 'yes') : ?>
                <div class="lgpa-counter">
                    <span class="current">01</span> / <span class="total"><?php echo sprintf('%02d', $total); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_progress'] === 'yes') : ?>
                <div class="lgpa-progress"></div>
            <?php endif; ?>
        </div>
        <?php
    }
}
