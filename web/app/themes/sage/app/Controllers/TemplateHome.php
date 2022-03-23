<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * Class TemplateHome
 * @package TemplateHome\Controllers
 */
class TemplateHome extends Controller
{
  /**
   *  Constructors
   */
  public function __construct()
  {
      add_action('wp_ajax_question', [$this, 'question']);
      add_action('wp_ajax_nopriv_question', [$this, 'question']);
  }

  /**
   * Question ajax function
   */
  public static function question()
  {
    $data = [];
    foreach ($_POST['data'] as $item) {
      $data[$item['name']] = $item['value'];
    }

    $message = 'Subject: ' . $data['subject'] . '; Email: ' . $data['email'] . '; Details: ' . $data['details'];
    wp_mail( 'stopthewar2k@gmail.com', $data['subject'],  $message);
  }

  /**
   * Get main fields
   */
  public function mainFields(){
    return (object)get_field('section_1');
  }

  /**
   * Get Hot news
   */
  public function hotnewsFields(){
    return (object)get_field('section_2');
  }

  /**
   * Get news categories
   */
  public function newsCategories()
  {
    return collect(
      get_categories([
        'taxonomy' => 'category',
        'type' => 'post',
        'orderby' => 'id',
        'order' => 'ASC',
      ])
    )->map(function ($obj) {
      return (object) [
        'slug' => $obj->slug,
        'name' => $obj->name,
      ];
    });
  }

  /**
   * Get news
   */
  public function newsFields()
  {
    return collect(
      get_posts([
        'post_type' => 'post',
        'numberposts' => -1,
      ])
    )->map(function ($post) {
      $array = [];

      $categories = collect(get_the_terms($post, 'category'))->map(function ($obj) {
          return $obj->slug;
      });

      foreach ($categories as $item) {
        $array[] = $item;
      }

      return (object) [
        'categories' => implode(' ', $array),
        'video' => $post->post_content !== '' ? $post->post_content : get_the_post_thumbnail($post, array(400, 400)),
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'date' => date('F j, Y', strtotime($post->post_date)),
        'twitter_link' => get_field('twitter_link', $post),
      ];
    });
  }

  /**
   * Get standing
   */
  public function standingFields(){
    return (object)get_field('section_3');
  }

  /**
   * Get what has
   */
  public function canHalp(){
    return (object)get_field('section_4');
  }

  /**
   * Get movement
   */
  public function movementFieldsTitle(){
    return (object)get_field('section_5');
  }

  /**
   * Get movement posts
   */
  public function movementPosts()
  {
    return collect(
      get_posts([
        'post_type' => 'movements',
        'numberposts' => -1,
      ])
    )->map(function ($post) {
        return (object) [
          'title' => $post->post_title,
          'attach' => get_the_post_thumbnail($post, array(400, 400)),
          'tags' => wp_get_post_tags($post->ID),
          'location' => get_field('location', $post),
          'members' => get_field('members', $post),
          'date' => get_field('date', $post),
          'twitter_link' => get_field('twitter_link', $post),
        ];
    });
  }

  /**
   * Get sanctions
   */
  public function sanctionsFields(){
    return (object)get_field('section_6');
  }

  /**
   * Get sanctions categories
   */
  public function sanctionsCategories()
  {
    return collect(
      get_categories([
        'taxonomy' => 'sanctions_taxonomy',
        'type' => 'sanctions',
        'orderby' => 'id',
        'order' => 'ASC',
      ])
    )->map(function ($obj) {
      return (object) [
        'slug' => $obj->slug,
        'name' => $obj->name,
      ];
    });
  }

  /**
   * Get sanctions posts
   */
  public function sanctionsPosts()
  {
    return collect(
      get_posts([
        'post_type' => 'sanctions',
        'numberposts' => -1,
      ])
    )->map(function ($post) {
        $array = [];

        $categories = collect(get_the_terms($post, 'sanctions_taxonomy'))->map(function ($obj) {
            return $obj->slug;
        });

        foreach ($categories as $item) {
          $array[] = $item;
        }

        return (object) [
          'categories' => implode(' ', $array),
          'title' => $post->post_title,
          'excerpt' => $post->post_excerpt,
          'attach' => get_the_post_thumbnail($post, array(400, 400)),
          'date' => date('F j, Y', strtotime($post->post_date)),
          'link_icon' => get_field('link_type', $post) ? 'images/twitter.svg' : 'images/web.svg',
          'link' => get_field('link_type', $post) ? get_field('twitter_link', $post) : get_field('web_link', $post),
        ];
    });
  }
  
  /**
   * Get petitions
   */
  public function petitionsFields(){
    return (object)get_field('section_7');
  }

  /**
   * Get petitions categories
   */
  public function petitionsCategories()
  {
    return collect(
      get_categories([
        'taxonomy' => 'petitions_taxonomy',
        'type' => 'petitions',
        'orderby' => 'id',
        'order' => 'ASC',
      ])
    )->map(function ($obj) {
      return (object) [
        'slug' => $obj->slug,
        'name' => $obj->name,
      ];
    });
  }

  /**
   * Get petitions posts
   */
  public function petitionsPosts()
  {
    return collect(
      get_posts([
        'post_type' => 'petitions',
        'numberposts' => -1,
      ])
    )->map(function ($post) {
        $array = [];

        $categories = collect(get_the_terms($post, 'petitions_taxonomy'))->map(function ($obj) {
            return $obj->slug;
        });

        foreach ($categories as $item) {
          $array[] = $item;
        }

        return (object) [
          'categories' => implode(' ', $array),
          'title' => $post->post_title,
          'excerpt' => $post->post_excerpt,
          'attach' => get_the_post_thumbnail($post, array(400, 400)),
          'date' => date('F j, Y', strtotime($post->post_date)),
          'link' => get_field('web_link', $post),
        ];
    });
  }
  
  /**
   * Get donation
   */
  public function donationFields(){
    return (object)get_field('section_8');
  }

  /**
   * Get donation posts
   */
  public function donationPosts()
  {
    return collect(
      get_posts([
        'post_type' => 'donations',
        'numberposts' => -1,
      ])
    )->map(function ($post) {
        return (object) [
          'title' => $post->post_title,
          'excerpt' => $post->post_excerpt,
          'attach' => get_the_post_thumbnail($post, array(400, 400)),
          'date' => date('F j, Y', strtotime($post->post_date)),
          'link' => get_field('twitter_link', $post),
        ];
    });
  }
  

}