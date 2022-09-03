<?php


namespace Arhinful\LaravelMnotify\Traits;


trait Actions
{
    public function all(string $url){
        $url = $this->attachKeyToURL($url);
        $response = $this->getRequest($url);
        return $response;
    }

    public function view(string $url, int $id){
        $url = "$url/$id";
        $url = $this->attachKeyToURL($url);
        $response = $this->getRequest($url);
        return $response;
    }

    public function store(string $url, array $data){
        $url = $this->attachKeyToURL($url);
        $response = $this->postRequest($url, $data);
        return $response;
    }

    public function update(string $url, int $id, array $data){
        $url = "$url/$id";
        $url = $this->attachKeyToURL($url);
        $response = $this->putRequest($url, $data);
        return $response;
    }

    public function delete(string $url, int $id){
        $url = "$url/$id";
        $url = $this->attachKeyToURL($url);
        $response = $this->deleteRequest($url);
        return $response;
    }

    private function attachKeyToURL(string $end_point){
        return "$end_point/?key={$this->apiKey}";
    }
}
