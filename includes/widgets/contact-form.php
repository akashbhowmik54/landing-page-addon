<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) exit;

class ContactFormWidget extends Widget_Base {

    public function get_name() {
        return 'contact_widget';
    }

    public function get_title() {
        return __('ST Contact Form', 'landing-page-addon');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {

        // Section Heading
        $this->start_controls_section(
            'section_heading',
            [
                'label' => __('Section Heading', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_text',
            [
                'label' => __('Heading Text', 'landing-page-addon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Submit your Detail, We will get In Touch & Schedule a Meeting.', 'landing-page-addon'),
            ]
        );

        $this->end_controls_section();

        // Form Fields Style
        $this->start_controls_section(
            'form_style',
            [
                'label' => __('Form Style', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Form background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'form_bg',
                'label' => __('Form Background', 'landing-page-addon'),
                'selector' => '{{WRAPPER}} .form-wrapper',
            ]
        );

        // Form padding
        $this->add_control(
            'form_padding',
            [
                'label' => __('Form Padding', 'landing-page-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .form-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Map Style
        $this->start_controls_section(
            'map_style',
            [
                'label' => __('Map Style', 'landing-page-addon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Map border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'map_border',
                'label' => __('Map Border', 'landing-page-addon'),
                'selector' => '{{WRAPPER}} .map-container iframe',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="form-submit">
            <div class="form-submit-wrapper section-space">
                <div class="container regular-container">
                    <div class="heading pb-24">
                        <h2><?php echo esc_html($settings['heading_text']); ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="left-content form-wrapper p-48">
                                <div class="form-heading pb-24">
                                    <h4><?php _e('Your Details', 'landing-page-addon'); ?></h4>
                                </div>
                                <form id="contactForm" class="custom-form" action="#" method="POST">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="full_name"><?php _e('Name*', 'landing-page-addon'); ?></label>
                                            <input type="text" id="full_name" name="full_name" placeholder="<?php _e('Name', 'landing-page-addon'); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email"><?php _e('Email*', 'landing-page-addon'); ?></label>
                                            <input type="email" id="email" name="email" placeholder="<?php _e('yourmail@company.com', 'landing-page-addon'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="contact_number"><?php _e('Contact Number*', 'landing-page-addon'); ?></label>
                                            <input type="tel" id="contact_number" name="contact_number" placeholder="+880 1234 567 890" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="contact_message"><?php _e('Your Message (Optional)', 'landing-page-addon'); ?></label>
                                            <textarea id="contact_message" name="contact_message" placeholder="<?php _e('Writing the Message', 'landing-page-addon'); ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="button-wrapper">
                                        <button type="submit" class="primary-btn">
                                            <span><?php _e('Submit Now', 'landing-page-addon'); ?></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11 right-column">
                            <div class="right-content">
                                <div class="map-container">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8707412365364!2d90.37443571498174!3d23.75367638458979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c4aa3d1a0d05%3A0x152fe3ddc083bdb!2sDiabari%20Lake%20Bridge!5e0!3m2!1sen!2sbd!4v1628171510000!5m2!1sen!2sbd"
                                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                <div class="map-bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
