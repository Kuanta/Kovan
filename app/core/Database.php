<?php

class Database{
	private $hostname=HOSTNAME;
	private $username=USERNAME;
	private $password=PASSWORD;
	private $dbname=DBNAME;
	private $stmt;
	protected $connection;
	public function __construct()
	{
		return $this->connect();
	}
	public function connect()
	{
		try{
			$this->connection=new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->connection->query("SET NAMES 'utf8'");
			$this->connection->query("SET character_set_results =utf8");
			$this->connection->query("SET character_set_client =utf8");
			$this->connection->query("SET character_set_connection =utf8");
			return $this->connection;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function query($query)
	{
		$this->stmt=$this->connection->prepare($query);
	}
	public function bind($place,$param)
	{
		$this->stmt->bindParam($place,$param);
	}
	public function execute()
	{
		$this->stmt->execute();
	}
	public function exec()
	{
		$this->stmt->exec();
	}
	public function resultset()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function rowCount()
	{
		return $this->stmt->rowCount();
	}
	public function lastInserted()
	{
		return $this->connection->lastInsertedId();
	}
	public function beginTransaction()
	{
		return $this->connection->beginTransaction();
	}
	public function endTransaction()
	{
		return $this->connection->commit();
	}
	public function cancelTransaction()
	{
		return $this->connection->rollback();
	}

}

?>