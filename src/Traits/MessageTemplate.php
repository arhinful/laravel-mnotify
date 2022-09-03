<?php


namespace Arhinful\LaravelMnotify\Traits;

trait MessageTemplate
{
    public function getMessageTemplates(){
        $response = $this->all($this->templateURL);
        return $response;
    }

    public function getMessageTemplate(int $template_id){
        $response = $this->view($this->templateURL, $template_id);
        return $response;
    }

    public function addMessageTemplate(string $title, string $content){
        $data = [
            'title' => $title,
            'content' => $content
        ];
        $response = $this->store($this->templateURL, $data);
        return $response;
    }

    public function updateMessageTemplate(int $template_id, string $title, string $content){
        $data = [
            'title' => $title,
            'content' => $content,
            'id' => $template_id
        ];
        $response = $this->update($this->templateURL, $template_id, $data);
        return $response;
    }

    public function deleteMessageTemplate($template_id){
        $response = $this->delete($this->templateURL, $template_id);
        return $response;
    }
}
