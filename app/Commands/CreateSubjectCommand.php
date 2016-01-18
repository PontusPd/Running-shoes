<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateSubjectCommand extends Command
{
    public $name;
    public $text;
    public $post_cat_id;
    public function __construct($name, $text, $post_cat_id)
    {
        $this->name = $name;
        $this->text = $text;    
    	$this->post_cat_id = $post_cat_id;
    }
}
