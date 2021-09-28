<?php
namespace app\models;

class Pictures extends \app\core\Model{
	public $picture_id;
	public $filename;
	public $description;

	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$SQL = 'SELECT * FROM pictures';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([]);
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
		//here we will have to add `` around field names
		$SQL = 'INSERT INTO pictures(person_id, description) VALUES (:person_id, :description)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id'=>$this->person_id, 'description'=>$this->description]);
	}

	public function update(){//update an pictures record but don't hange the FK value and don't change the pictures filename either....
		$SQL = 'UPDATE `pictures` SET `filename`=:filename WHERE picture_id = :picture_id';//always use the PK in the where clause
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['filename'=>$this->filename,'picture_id'=>$this->picture_id]);//associative array with key => value pairs
	}

	public function delete($picture_id){//delete a pictures record
		$SQL = 'DELETE FROM `pictures` WHERE picture_id = :picture_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['picture_id'=>$picture_id]);//associative array with key => value pairs
	}
} 
?>
