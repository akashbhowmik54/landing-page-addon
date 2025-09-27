<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class AboutWidget extends Widget_Base {
    public function get_name() { 
        return 'about_widget'; 
    }
    public function get_title() { 
        return 'About Section'; 
    }
    public function get_icon() { 
        return 'eicon-info-circle'; 
    }
    public function get_categories() { 
        return ['general']; 
    }

    protected function register_controls() {
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo "hello world";
    }
}
