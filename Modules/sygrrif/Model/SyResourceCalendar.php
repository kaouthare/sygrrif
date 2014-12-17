<?php

require_once 'Framework/Model.php';

/**
 * Class defining the Sygrrif resource calendar model
 *
 * @author Sylvain Prigent
 */

class SyResourceCalendar extends Model {

	/**
	 * Create the unit table
	 *
	 * @return PDOStatement
	 */
	public function createTable(){
			
		$sql = "CREATE TABLE IF NOT EXISTS `sy_resources_calendar` (
		`id_resource` int(11) NOT NULL AUTO_INCREMENT,	
		`nb_people_max` int(11) NOT NULL,		
		`available_days` varchar(15) NOT NULL DEFAULT '',
		`day_begin` int(11) NOT NULL,		
		`day_end` int(11) NOT NULL,		
		`size_bloc_resa` int(11) NOT NULL,
		PRIMARY KEY (`id_resource`)
		);";

		$pdo = $this->runRequest($sql);
		return $pdo;
	}

	public function addResource($id_resource, $nb_people_max, $available_days, $day_begin, $day_end, $size_bloc_resa){
		$sql = "INSERT INTO sy_resources_calendar (id_resource, nb_people_max, available_days, day_begin, day_end, size_bloc_resa) 
				VALUES(?,?,?,?,?,?)";
		$pdo = $this->runRequest($sql, array($id_resource, $nb_people_max, $available_days, $day_begin, $day_end, $size_bloc_resa));
		return $pdo;
	}
	
	public function setResource($id_resource, $nb_people_max, $available_days, $day_begin, $day_end, $size_bloc_resa){
		if (!$this->isResource($id_resource)){
			$this->addResource($id_resource, $nb_people_max, $available_days, $day_begin, $day_end, $size_bloc_resa);
		}
		else{
			$this->updateResource($id_resource, $nb_people_max, $available_days, $day_begin, $day_end, $size_bloc_resa);
		}
	}
	
	public function isResource($id_resource){
		$sql = "select * from sy_resources_calendar where id_resource=?";
		$req = $this->runRequest($sql, array($id_resource));
		return ($req->rowCount() == 1);
	}
	
	public function updateResource($id_resource, $nb_people_max, $available_days, $day_begin, $day_end, $size_bloc_resa){
		$sql = "update sy_resources_calendar set nb_people_max=?, available_days=?, day_begin=?, day_end=?, size_bloc_resa=? 
		        where id_resource=?";
		$this->runRequest($sql, array($nb_people_max, $available_days, $day_begin, $day_end, $size_bloc_resa, $id_resource));
	}
	
	public function resource($id_resource){
		$sql = "select * from sy_resources_calendar where id_resource=?";
		$data = $this->runRequest($sql, array($id_resource));
		return $data->fetch();
	}
	
}