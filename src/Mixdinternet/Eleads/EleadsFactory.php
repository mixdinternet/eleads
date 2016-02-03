<?php 

namespace Mixdinternet\Eleads;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Bus\DispatchesJobs;

class EleadsFactory {

	use DispatchesJobs;

    public function send(Request $request){
		$leadHandle = new LeadHandler($request);
        $leadHandle->handle($leadHandle);
    }

    public function toQueue(Request $request){
		$leadHandle = new LeadHandler($request);
        $this->dispatch($leadHandle);
    }    
}