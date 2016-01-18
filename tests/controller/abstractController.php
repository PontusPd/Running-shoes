<?php
/**
* 
*/
/**
* 
*/
abstract class testA
{
	public function tet(){
		die('asasdasd');
	}
	
}

/**
* 
*/
class test extends testA
{
	public function testing(){
		$this->tet();
	}	
}

$test = new test();
$test->testing();
