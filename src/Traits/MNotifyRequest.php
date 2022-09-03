<?php


namespace Arhinful\LaravelMnotify\Traits;


use Illuminate\Support\Facades\Http;

trait MNotifyRequest
{
    private function postRequest($url, $data=null){
        $response = Http::post($url, $data);
        $response->throw();
        if ($response['status'] != 'success'){
            throw new \Exception($response['message']);
        }
        return $response;
    }

    private function getRequest($url){
        $response = Http::get($url);
        $response->throw();
        if ($response['status'] != 'success'){
            throw new \Exception($response['message']);
        }
        return $response;
    }

    public function deleteRequest(string $url){
        $response = Http::delete($url);
        $response->throw();
        if ($response['status'] != 'success'){
            throw new \Exception($response['message']);
        }
        return $response;
    }

    public function putRequest(string $url, array $data){
        $response = Http::put($url, $data);
        $response->throw();
        if ($response['status'] != 'success'){
            throw new \Exception($response['message']);
        }
        return $response;
    }

}
