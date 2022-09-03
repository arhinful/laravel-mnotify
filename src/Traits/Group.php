<?php


namespace Arhinful\LaravelMnotify\Traits;


use Illuminate\Support\Facades\Http;

trait Group
{
    public function getGroups(){
        $response = $this->all($this->groupURL);
        return $response;
    }

    public function getGroup(int $group_id){
        $response = $this->view($this->groupURL, $group_id);
        return $response;
    }

    public function addGroup(string $group_name){
        $data = [
            'group_name' => $group_name
        ];
        $response = $this->store($this->groupURL, $data);
        return $response;
    }

    public function updateGroup($group_id, $group_name){
        $data = [
            'group_name' => $group_name,
            'id' => $group_id
        ];
        $response = $this->update($this->groupURL, $group_id, $data);
        return $response;
    }

    public function deleteGroup($group_id){
        $response = $this->delete($this->groupURL, $group_id);
        return $response;
    }

}
