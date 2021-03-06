<?php

require_once 'Framework/Model.php';
require_once 'Modules/anticorps/Model/Anticorps.php';
require_once 'Modules/anticorps/Model/Isotype.php';
require_once 'Modules/anticorps/Model/Source.php';
require_once 'Modules/anticorps/Model/Tissus.php';

/**
 * Class defining methods to install and initialize the core database
 *
 * @author Sylvain Prigent
 */
class AcInstall extends Model {

	/**
	 * Create the anticorps database
	 *
	 * @return boolean True if the base is created successfully
	 */
	public function createDatabase(){
		
		$anticorpsModel = new Anticorps();
		$anticorpsModel->createTable();
		
		$isotypeModel = new Isotype();
		$isotypeModel->createTable();
		
		$sourceModel = new Source();
		$sourceModel->createTable();
		
		$tissusModel = new Tissus();
		$tissusModel->createTable();
		
		$message = 'success';
		return $message;
	}
}

