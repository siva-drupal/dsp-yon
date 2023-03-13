<?php
namespace Drupal\highlight_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block that has custom configuration option.
 *
 * @Block(
 *   id = "highlight_block_config_form",
 *   admin_label = @Translation("Custom guide to blocks: configuration form"),
 *   category = "Examples"
 * )
 */

 class HighlightConfigForm extends BlockBase {
  
    /**
     * {@inheritdoc}
     */
    
   
    public function build() : array {
      // Retrieve the message from the configuration and pass it into the render
      // array.
      
//get total users
$query = \Drupal::entityQuery('user')
    ->condition('status', '1')
    ->condition('field_ch', '3');

$total_users = $query->count()->execute();
$name = $total_users;
    
//get male users
$query2 = \Drupal::entityQuery('user')
->condition('status', '1')
->condition('field_gender', '1')
->condition('field_ch', '3');
$and = $query2->andConditionGroup();
$m_users = $query2->count()->execute();
$male = $m_users;


//get female users
$query3 = \Drupal::entityQuery('user')
    ->condition('status', '1')
  ->condition('field_gender', '2')
  ->condition('field_ch', '3');
$and = $query3->andConditionGroup();

$f_users = $query3->count()->execute();
$female = $f_users;
  
      return [
        '#theme' => 'basic_twig_block_custom',
      
          '#myvariables' => array ('Name:' => $name, 'Male:' => $male,  'Female:' => $female),


      ];
    
    }

 }

 



?>