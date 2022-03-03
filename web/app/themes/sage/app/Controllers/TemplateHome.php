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
   * Get standing
   */
  public function standingFields(){
    return (object)get_field('section_3');
  }

  /**
   * Get what has
   */
  public function whathasFields(){
    return (object)get_field('section_4');
  }

  /**
   * Get movement
   */
  public function movementFields(){
    return (object)get_field('section_5');
  }

}