<?php


namespace Arhinful\LaravelMnotify\Traits;


use Illuminate\Support\Facades\Http;

trait Contact
{
    public function getContacts(){
        $response = $this->all($this->contactURL);
        return $response;
    }

    public function getContact($contact_id){
        $response = $this->view($this->contactURL, $contact_id);
        return $response['contact'] ?? $response['message'];
    }

    public function addContact(int $contact_group_id, $phone_number, $title, $firstname, $lastname=null, $email=null, $dob=null){
        $url = "{$this->contactURL}/$contact_group_id";
        $data = [
            'phone' => $phone_number,
            'title' => $title,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'dob' => $dob
        ];
        $response = $this->store($url, $data);
        return $response;
    }

    public function updateContact($contact_id, $contact_group_id, $phone_number, $title, $firstname, $lastname=null, $email=null, $dob=null){
        $data = [
            'phone' => $phone_number,
            'title' => $title,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'dob' => $dob,
            'id' => $contact_id,
            'group_id' => $contact_group_id
        ];
        $response = $this->update($this->contactURL, $contact_id, $data);
        return $response;
    }

    public function deleteContact($contact_id, $contact_group_id){
        $url = "{$this->contactURL}/$contact_id/$contact_group_id";
        $url = $this->attachKeyToURL($url);
        $response = Http::delete($url);
        $response->throw();
        if ($response['status'] != 'success'){
            throw new \Exception($response['message']);
        }
        return true;
    }
}
