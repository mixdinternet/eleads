<?php 

namespace Mixdinternet\Eleads;

use Illuminate\Support\Facades\Facade;

class EleadsFacade extends Facade {

    protected static function getFacadeAccessor() { return 'Mixdinternet\Eleads\EleadsFactory'; }

}