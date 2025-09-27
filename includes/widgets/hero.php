<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class HeroWidget extends Widget_Base {
    public function get_name() { 
        return 'hero_widget'; 
    }
    public function get_title() { 
        return 'Sliding Hero'; 
    }
    public function get_icon() {
        return 'eicon-slider-push'; 
    }
    public function get_categories() { 
        return ['general']; 
    }

    protected function register_controls() {
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
    }
}
