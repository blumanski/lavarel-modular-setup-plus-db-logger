<?php
namespace App\Modules\Admin\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\TestModel;
/**
 * IndexController
 *
 * Controller to house all the functionality directly
 * related to the ModuleOne.
 */
class IndexController extends Controller
{
	function __construct( TestModel $testModel )
	{
		$this->testModel = $testModel;
	}

	public function index()
	{
		// ModuleOne is the module name and dummy is the blade file
		// you can specify ModuleOne::someFolder.file if your file exists
		// inside a folder. Also the blade will use the same syntax i.e.
		// ModuleName::viewName
        $p = array();
        $p['content']   = 'Lorem ipsum schnick schnack schnuck..';
        $p['title']     = 'Test moduel indexcontroller@index';
		return view('Admin::dummy', $p);
	}

	public function modelTest()
	{
		// random test query for testing
		$users = $this->testModel->getAny();
		$p = array();
		$p['users']   = $users;
		$p['title']     = 'DB Query Test';
		return view('Admin::users', $p);
		
	}
}
