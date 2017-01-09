<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AppModel extends Facade {
	
	protected static function getFacadeAccessor()
	{
		return 'appmodel';
	}
	
}