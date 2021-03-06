<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller
{
/**
*  null Database Connection
*/
//Session::init();

	public $db = null;

/**
* Whenever a controller is created, open a database connection too. The idea behind is to have ONE connection
* that can be used by multiple models (there are frameworks that open one connection per model).
*/
	function __construct()
	{
		session_start();

		if (!isset($_SESSION['user_logged_in']) && isset($_COOKIE['rememberme'])) {
			header('location:' .URL. 'login/loginwithcookie');
		}
		$this->openDatabaseConnection();

		$this->view = new View();
	}
	/**
	* Open the database connection with the credentials from application/config/config.php
	*/
	private function openDatabaseConnection()
	{
		// set the (optional) options of the PDO connection. in this case, we set the fetch mode to
		// "objects", which means all results will be objects, like this: $result->user_name !
		// For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
		// @see http://www.php.net/manual/en/pdostatement.fetch.php
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8' ", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
		// generate a database connection, using the PDO connector
		// @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
		$this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME , DB_USER, DB_PASS, $options);
	}

    /**
     * Load the model with the given name.
     * loadModel("SongModel") would include models/songmodel.php and create the object in the controller, like this:
     * $songs_model = $this->loadModel('SongsModel');
     * Note that the model class name is written in "CamelCase", the model's filename is the same in lowercase letters
     * @param string $model_name The name of the model
     * @return object model
     */
	public function loadModel($name)
	{
		require MODELS_PATH . strtolower($name) . '_model.php';
		// return new model (and pass the database connection to the model)
		$model_name = $name.'Model';
		return new $model_name($this->db);
	}
}
