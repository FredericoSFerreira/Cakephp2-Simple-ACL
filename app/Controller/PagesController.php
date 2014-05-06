<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class PagesController extends AppController {

	public function beforeFilter() {
        
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

	function index(){
		$this->layout = 'themes/default/default';

		if(!empty($this->params["slug"])){
			
			$aboutus_slugs = array("about-us","nosotros");
			if(in_array($this->params["slug"],$aboutus_slugs)){
				$view = "aboutus";
				$this->{$view}();
				$this->render('/Pages/'.$view);	
			}
		}
		

	}

	function aboutus(){
		$this->set('title',__('About Us'));
	}

}