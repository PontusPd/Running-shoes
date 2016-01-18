<?php 
namespace App\Composers;
use App\Repositories\FlatBrandsRepositories;
use App\Repositories\FlatCatsRepositories;

class AsideComposer
{
	public $brands;
	public $cats;
	public function __construct(FlatBrandsRepositories $brands, FlatCatsRepositories $cats)
	{
		$this->cats = $cats;
		$this->brands = $brands;
	}

	public function compose($var)
	{
		$var->with(array(
			'titletest' => 'asdasda',
			'brands' => $this->brands->getAll(),
			'cats' => $this->cats->getAll(),
		));
	}
}