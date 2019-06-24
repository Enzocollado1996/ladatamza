<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP Component
 * @author JESUS
 */
class StringComponent extends Component {

    public function cleanStringToImage($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = str_replace('ñ', 'ni', $string);
        return preg_replace('/[^A-Za-z0-9\.-]/', '', $string); // Removes special chars.
    }
    /*public $components = array();
    public $settings = array();

    function initialize(&$controller, $settings) {
        $this->controller = $controller;
        $this->settings = $settings;
    }

    function startup(&$controller) {
        
    }

    function beforeRender() {
        
    }

    function beforeRedirect() {
        
    }

    function shutDown(&$controller) {
        
    }*/

}
