<?php
/**
 * @author Oliver Blum <blumanski@protonmail>
 * @desc Provide some db queries, which are available everywhere in the application 
 */


namespace App\Helpers;

use Illuminate\Database\Eloquent\Model, 
	DB, 
	PDO, 
	PDOException, 
	Log,
	Config
;

class AppModel 
{
	/**
	 * Write a message to error log in the db.
	 * This can be any kind of error and will be displayed somewhere, Dashboard or so.
	 *  
	 * @param string $type
	 * @param string $message
	 * @param string $location
	 * @return boolean
	 */	
	public function logError(string $type, string $message, string $location) :bool
	{
		if(Config::get('app.dbdebug') !== true) {
			return false;
		}
		
		$Pdo = DB::getPdo();
		
		$query = "INSERT INTO `boom_error_log`
					(`type`, `message`, `logdate`, `location`)
				  VALUES
					(:type, :message, :logdate, :location)
		";
		
		$statement  = $Pdo->prepare($query);
		
		$statement->bindvalue(':type', $type, PDO::PARAM_STR);
		$statement->bindvalue(':message', $message, PDO::PARAM_STR);
		$statement->bindvalue(':logdate', date('Y-m-d H:i:s'), PDO::PARAM_STR);
		$statement->bindvalue(':location', $location, PDO::PARAM_STR);
		
		$statement->execute();
		// if this fails, log error to standard error log
		if($statement->rowCount() > 0) {
			return true;
			
		} else {
			
			Log::error("Mysql Db error log failed. \nLocation: ".__METHOD__."\nSource: ".$location);
			return false;
		}
	}
	
}