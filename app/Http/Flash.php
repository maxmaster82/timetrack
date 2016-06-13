<?php

namespace App\Http;

class Flash {

    /**
     * @param $title
     * @param $message
     * @param $level
     */
    public function create($title, $message, $level)
    {
        session()->flash('flash_message', [
            'title' => $title,
            'message' => $message,
            'level' => $level,
        ]);
    }

    /**
     * @param $title
     * @param $message
     */
    public function info($title, $message)
    {
        $this->create($title, $message, 'info');
    }

    /**
     * @param $title
     * @param $message
     */
    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    /**
     * @param $title
     * @param $message
     */
    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }

}