<?php


class DB
{
	protected $db;
	protected $statement;
	protected $fetchType = PDO::FETCH_OBJ;

	/**
	 * DB constructor.
	 * @param $db
	 */
	public function __construct($server, $database, $user, $password)
	{
		$this->db = new PDO(
			"mysql:dbname=$database;host=$server;charset=utf8",
			$user, $password
		);
	}


	/**
	 * Set type of returned resuts [ array, object, ... ]
	 *
	 * @param mixed $fetchType
	 */
	public function setFetchType($fetchType)
	{
		$this->fetchType = $fetchType;
	}


	/**
	 * Create database query
	 *
	 * @param $query
	 * @param array $data
	 * @return PDOStatement
	 */
	public function query($query, $data = [])
	{
		$this->statement = $this->db->prepare($query);
		$this->statement->execute($data);

		return $this->statement;
	}


	/**
	 * Fetch all results of query
	 *
	 * @param $query
	 * @param array $data
	 * @return array
	 */
	public function getAll($query, $data = [])
	{
		return $this->query($query, $data)->fetchAll( $this->fetchType );
	}


	/**
	 * Fetch a single result of query
	 *
	 * @param $query
	 * @param array $data
	 * @return mixed
	 */
	public function getOne($query, $data = [])
	{
		return $this->query($query, $data)->fetch( $this->fetchType );
	}

}