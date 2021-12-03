<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class Command extends Facade 
{
  protected static function getFacadeAccessor()
  {
    return 'command';
  }
}