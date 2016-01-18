<?php 
namespace App\Composers;
use App\Repositories\FlatBrandsRepositories;
use App\Repositories\FlatCatsRepositories;
use App\Repositories\FlatHeaderRepositories;
use App\Http\Controllers\GlobalController;
class HeaderComposer extends GlobalController
{
	public $header;

	public function __construct(FlatHeaderRepositories $header)
	{
		$this->header = $header;
	}

	public function compose($links)
	{
		$links->with(array(
			'title' => $this->getTitle('Home'),
			'topLinks' => $this->header->getAll()['toplinks'], 
			'links' => $this->header->getAll()['menu'], 
			'sublinks' => $this->header->getAll()['sublinks'],
		));
	}
}