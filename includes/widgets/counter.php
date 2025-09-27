<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class CounterWidget extends Widget_Base {
    public function get_name() { 
        return 'counter_widget'; 
    }
    public function get_title() { 
        return 'ST Counter'; 
    }
    public function get_icon() { 
        return 'eicon-counter'; 
    }
    public function get_categories() { 
        return ['general']; 
    }

    protected function register_controls() {
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="stat-box">
            <h4><span class="single-counter" data-number="09">09+</span> Years</h4>
            <p>The most outstanding real estate projects in your area.</p>
        </div>
        <?php
    }
}
