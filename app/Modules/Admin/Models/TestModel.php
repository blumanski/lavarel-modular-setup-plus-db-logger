<?php namespace App\Modules\Admin\Models;
use Illuminate\Database\Eloquent\Model, 
	DB, 
	PDO,
	PDOException,
	AppModel
;

class TestModel extends Model
{
    public function __construct() {
        $this->Pdo = DB::getPdo();
    }

	/**
	 * Test query....
	 * @return String
	 */
	public function getAny()
	{
        //$query = "SELECT * FROM `boom_users` WHERE `id` = :id";
        $query = "SELECT * FROM `boom_users` ORDER BY `username` ASC";

        try {
        	
            $statement  = $this->Pdo->prepare($query);
            //$statement->bindvalue(':id', 1, PDO::PARAM_INT);
            $statement->execute();
            $result     = $statement->fetchAll(PDO::FETCH_ASSOC);

			if(is_array($result) && count($result)) {
				return $result;	
			}
				
        } catch (PDOException $e) {
            $message = $e->getMessage();
            $message .= $e->getTraceAsString();
            $message .= $e->getCode();
            // Write to db error log
            AppModel::logError('db-query', $message,  __METHOD__);
        }

		return false;
	}
}
