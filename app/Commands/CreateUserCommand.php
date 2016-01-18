<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateUserCommand extends Command
{
    public $username;
    public $password;
    public $email;
    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password; 
        $this->email = $email;   
    }
}
