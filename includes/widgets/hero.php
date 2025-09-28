<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

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
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        ?>
        <div class="lgpa-slider-container">
            <div class="lgpa-slider-wrapper">
                <!-- Slide 1 -->
                <div class="lgpa-slide slide-1 active">
                    <div class="slide-content">
                        <div class="slide-badge">lgpa Slider</div>
                        <h1 class="slide-title">The General Base</h1>
                        <p class="slide-subtitle">The General Base is a very flexible and powerful tool. It has many advanced features and options.</p>
                        <button class="slide-btn">Learn More</button>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="lgpa-slide slide-2">
                    <div class="slide-content">
                        <div class="slide-badge">Features</div>
                        <h1 class="slide-title">Advanced Options</h1>
                        <p class="slide-subtitle">Discover powerful customization options with modern design elements and smooth animations for your projects.</p>
                        <button class="slide-btn">Explore Now</button>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="lgpa-slide slide-3">
                    <div class="slide-content">
                        <div class="slide-badge">Design</div>
                        <h1 class="slide-title">Flexible Tool</h1>
                        <p class="slide-subtitle">Create stunning presentations with our flexible and intuitive slider system designed for modern websites.</p>
                        <button class="slide-btn">Get Started</button>
                    </div>
                </div>
            </div>

            <!-- Navigation arrows -->
            <button class="lgpa-nav lgpa-nav-prev" onclick="prevSlide()">‹</button>
            <button class="lgpa-nav lgpa-nav-next" onclick="nextSlide()">›</button>

            <!-- Pagination dots -->
            <div class="lgpa-pagination">
                <div class="lgpa-dot active" onclick="currentSlide(1)"></div>
                <div class="lgpa-dot" onclick="currentSlide(2)"></div>
                <div class="lgpa-dot" onclick="currentSlide(3)"></div>
            </div>

            <!-- Slide counter -->
            <div class="lgpa-counter">
                <span class="current">01</span> / <span class="total">03</span>
            </div>

            <!-- Progress bar -->
            <div class="lgpa-progress"></div>
        </div>
        <?php
    }
}
