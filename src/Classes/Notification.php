<?php

namespace twa\apiutils\Classes;

class Notification {
    /**
     * @var array|null
     */
    public $notification;
    /**
     * @var string|null
     */
    public $type;
    /**
     * @var string|null
     */
    public $title;
    /**
     * @var string|null
     */
    public $message;

    /**
     * Notification constructor.
     * @param string|null $action
     */
    public function __construct($action = null)
    {

        $config = config('api-utils', []);

        $notifications = $config['notifications'];
        if($action && is_array($notifications)){
            $this->notification = collect($notifications)->where('action', $action)->first();
        } else {
            $this->notification = null;
        }
    }

    public function setter($title , $message){
        $this->title = $title;
        $this->message = $message;
    }

    public function success($title = null , $message = null){
        $this->type = "success";
        if(!$this->notification){
            $this->setter($title , $message);
        }else{
            $this->setter($this->notification[$this->type]['title'] ?? $title ,$this->notification[$this->type]['message'] ?? $message);
        }
        return $this;
    }

    public function error($title = null , $message = null){
        $this->type = "error";
        if(!$this->notification){
            $this->setter($title , $message);
        }else{
            $this->setter($this->notification[$this->type]['title'] ?? $title ,$this->notification[$this->type]['message'] ?? $message);
        }
        return $this;
    }
}
