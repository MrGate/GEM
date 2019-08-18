<?php if ( ! defined('APPPATH')) exit('direct script access is forbidden');

/**
 * Mysqli Database Driver
 *
 * This is a very minimal driver for mysqli
 *
 * @category	Database
 * @author		Randall Perkins
 */
class database {

	/**
	 * Mysqli Database Handle
	 *
	 * Used to access mysqli functions
	 *
	 * @var	object|resource
	 */
	protected $db_handle = null;

	/**
	 * Query Handle
	 *
	 * Hold the data from the handle
	 *
	 * @var	object|resource
	 */
	protected $query_handle = null;

	/**
	 * Class constructor
	 *
	 * @param	string	$db_host
	 * @param	string	$db_user
	 * @param	string	$db_pass
	 * @param	string	$db_name
	 * @return	void
	 */
	function __construct($db_host, $db_user, $db_pass, $db_name)
	{
		// assign are handle for mysqli
		$this->db_handle = new mysqli($db_host, $db_user, $db_pass, $db_name);
		// if we have a error display it
		if($this->db_handle->connect_error) {
			trigger_error('<b style="color:red;">Mysqli Database connection failed</b> <br><p>' . $this->db_handle->connect_error . '</p><br>', E_USER_ERROR);
		}

	}

	/**
	 * Mysqli Query
	 *
	 * the function will accept a sql query
	 * then give you a mysqli object back
	 *
	 * @param	string	$sql
	 * @return	mixed
	 */
	public function query($sql)
	{	
		if($this->query_handle = $this->db_handle->query($sql))
		{
			if(mysqli_num_rows($this->query_handle) > 0)
				return $this->query_handle->fetch_all(MYSQLI_ASSOC);
			else
				return false;	
		}
		else
		{
			return false;
		}
	}

	/**
	 * Count All 
	 *
	 * Gives the amount of rows for the current query
	 *
	 * @return	int
	 */
	public function numrows()
	{
		if($this->query_handle)
			return $this->query_handle->num_rows;
	}

	/**
	 * Free
	 *
	 * Free the data of the current query handle
	 *
	 * @return	void
	 */
	public function free()
	{
		if($this->query_handle)
			$this->query_handle->free();
	}

	/**
	 * Close Mysqli Database Connection
	 *
	 * @return	void
	 */
	public function close()
	{
		if($this->query_handle)
			$this->query_handle->close();
	}

}

/* End of file database.php */
/* Location: ./engine/core/database.php */