<?php 
namespace App\Repositories;
use DB;	
use App\Models\Menu;
use App\Http\Controllers\GlobalController;
class FlatHeaderRepositories extends GlobalController
{
	public function getAll()
	{
		$top = DB::table('toplinks')->get();
		$links = $this->fetchTable(Menu::all());
		$sublinks = $this->getSublinks();
		$title = $this->getTitle('Home');
		$Links = array(
			'titletest' => $title,
			'menu' => $links,
			'sublinks' => $sublinks,
			'toplinks'=>$top
			);
		return $Links;
	}
}
