<?php
namespace app\models;

class Pictures extends \app\core\Model{
	public $description;

	public function __construct(){
		parent::__construct();
	}

	public function getDescription() {
        return $this->description;
    }

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getAll(){
		$SQL = 'SELECT * FROM pictures';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Pictures');
		return $STMT->fetchAll();//returns an array of all the records
	}

	public function get($picture_id){
		$SQL = 'SELECT * FROM pictures WHERE picture_id = :picture_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['picture_id'=>$picture_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Pictures');
		return $STMT->fetch();//return the record
	}

	public function insert(){
		$SQL = 'INSERT INTO pictures(person_id, `description`) VALUES (:person_id, :description)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id'=>$this->person_id, 'description'=>$this->description]);
	}

	public function update(){//update an pictures record but don't hange the FK value
		$SQL = 'UPDATE `pictures` SET `description`=:description WHERE picture_id = :picture_id';//always use the PK in the where clause
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['description'=>$this->description,'picture_id'=>$this->picture_id]);//associative array with key => value pairs
	}

	public function delete($picture_id){//delete a pictures record
		$SQL = 'DELETE FROM `pictures` WHERE picture_id = :picture_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['picture_id'=>$picture_id]);//associative array with key => value pairs
	}
} 
?>
