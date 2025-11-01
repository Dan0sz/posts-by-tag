<?php
/**
 * Plugin Name: Daan - Posts By Tag
 * Description: Use the posts-by-tag shortcode to display a list of posts with a defined tag.
 * Version: 1.0.0
 * Author: Daan from Daan.dev
 * Author URI: https://daan.dev
 * GitHub Plugin URI: Dan0sz/posts-by-tag
 * Primary Branch: master
 * License: MIT
 */

require_once __DIR__ . '/vendor/autoload.php';

$posts_by_tag = new \Daan\PostsByTag\Plugin();