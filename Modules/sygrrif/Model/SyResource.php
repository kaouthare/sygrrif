<?php

require_once 'Framework/Model.php';

/**
 * Class defining the Sygrrif resource model
 *
 * @author Sylvain Prigent
 */

class SyResource extends Model {

	/**
	 * Create the unit table
	 *
	 * @return PDOStatement
	 */
	public function createTable(){
			
		$sql = "CREATE TABLE IF NOT EXISTS `sy_resources` (
		`id` int(11) NOT NULL AUTO_INCREMENT,	
		`name` varchar(30) NOT NULL DEFAULT '',
		`description` varchar(200) NOT NULL DEFAULT '',		
		`accessibility_id` int(11) NOT NULL,
		`type_id` int(11) NOT NULL,
		`category_id` int(11) NOT NULL,		
		`area_id` int(11) NOT NULL,				
		PRIMARY KEY (`id`)
		);";

		$pdo = $this->runRequest($sql);
		return $pdo;
	}
	
	public function addResource($name, $description, $accessibility_id, $type_id, $area_id, $category_id = 0){
		$sql = "INSERT INTO sy_resources (name, description, accessibility_id, type_id, area_id, category_id) VALUES(?, ?, ?, ?, ?,?)";
		$this->runRequest($sql, array($name, $description, $accessibility_id, $type_id, $area_id, $category_id));
		return $this->getDatabase()->lastInsertId();
	}
	
	public function isResource($id){
		$sql = "select * from sy_resources where id=?";
		$unit = $this->runRequest($sql, array($id));
		if ($unit->rowCount() == 1)
			return true;  // get the first line of the result
		else
			return false;
	}

	public function editResource($id, $name, $description, $accessibility_id, $type_id, $area_id, $category_id){
		$sql = "update sy_resources set name=?, description=?, accessibility_id=?, type_id=?, area_id=?,
				category_id=?  where id=?";
		$this->runRequest($sql, array($name, $description, $accessibility_id, $type_id, $area_id, $category_id, $id));
	}
	
	/**
	 * Get the resources grr_ids and names
	 *
	 * @return array
	 */
	public function resources($sortEntry){
			
		$sql = "select * from sy_resources order by " . $sortEntry . " ASC;";
		$data = $this->runRequest($sql);
		return $data->fetchAll();
	}
	
	public function resourcesInfo($sortentry = "id"){
		
		$sqlSort = "sy_resources.id";
		if ($sortentry == "name"){
			$sqlSort = "sy_resources.name";
		}
		else if ($sortentry == "description"){
			$sqlSort = "sy_resources.description";
		}
		else if ($sortentry == "type_name"){
			$sqlSort = "sy_resource_type.name";
		}
		else if ($sortentry == "category_name"){
			$sqlSort = "sy_resourcescategory.name";
		}
		else if ($sortentry == "area_name"){
			$sqlSort = "sy_areas.name";
		}
		
		$sql = "SELECT sy_resources.id AS id, sy_resources.name AS name, sy_resources.description AS description, 
				       sy_resource_type.name AS type_name, sy_resourcescategory.name AS category_name, sy_areas.name AS area_name, 
				       sy_resource_type.controller AS controller, sy_resource_type.edit_action AS edit_action	
					from sy_resources
					     INNER JOIN sy_resource_type on sy_resources.type_id = sy_resource_type.id
					     INNER JOIN sy_resourcescategory on sy_resources.category_id = sy_resourcescategory.id
						 INNER JOIN sy_areas on sy_resources.area_id = sy_areas.id
					ORDER BY ". $sqlSort . ";";
		$req = $this->runRequest ( $sql );
		return $req->fetchAll ();
	}
	
	public function resource($id){
		$sql = "select * from sy_resources where id=?";
		$data = $this->runRequest($sql, array($id));
		return $data->fetch();
	}
	
	public function resourceIDNameForArea($areaId){
		$sql = "select id, name from sy_resources where area_id=?";
		$data = $this->runRequest($sql, array($areaId));
		return $data->fetchAll();
	}
}