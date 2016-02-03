<?php

namespace Mixdinternet\Eleads;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeadHandler implements SelfHandling, ShouldQueue
{

    use InteractsWithQueue, SerializesModels, Queueable;

    protected $request;
    protected $cookie;

    public function __construct($request){
        $this->request = $request->all();
        $this->cookie  = $request->cookie();
    }

    public function handle()
    {
    
        if ($this->attempts() > 3) {
            return false;
        }

        $token = env('ELEADS_TOKEN', false);

        if (!$token) {
            return false;
        }

        $utmParams = new UtmSourceDecode($this->cookie);

        $client = new HttpClient();

        $fields =['form_params' => [
                'token'        => $token,
                'nome'         => isset($this->request['name'])         ? $this->request['name']         : env('APP_NAME', 'Contato Pelo Site'),
                'estado'       => isset($this->request['state'])        ? $this->request['state']        : null,
                'cidade'       => isset($this->request['city'])         ? $this->request['city']         : null,
                'email'        => isset($this->request['email'])        ? $this->request['email']        : null,
                'telefone'     => isset($this->request['phone'])        ? $this->request['phone']        : null,
                'descricao'    => isset($this->request['description'])  ? $this->request['description']  : null,
                'custom1'      => isset($this->request['custom1'])      ? $this->request['custom1']      : null,
                'custom2'      => isset($this->request['custom2'])      ? $this->request['custom2']      : null,
                'heat'         => isset($this->request['heat'])         ? $this->request['heat']         : 1,
                'utm_source'   => isset($this->request['utm_source'])   ? $this->request['utm_source']   : $utmParams->campaign_source,
                'utm_medium'   => isset($this->request['utm_medium'])   ? $this->request['utm_medium']   : $utmParams->campaign_medium,
                'utm_term'     => isset($this->request['utm_term'])     ? $this->request['utm_term']     : $utmParams->campaign_term,
                'utm_content'  => isset($this->request['utm_content'])  ? $this->request['utm_content']  : $utmParams->campaign_content,
                'utm_campaign' => isset($this->request['utm_campaign']) ? $this->request['utm_campaign'] : $utmParams->campaign_name,
            ]
        ];
        
        $res = $client->post('http://eleads.io/api', $fields);

        if ($res->getStatusCode() == "200") {
            return true;
        }

        return false;

    }
}