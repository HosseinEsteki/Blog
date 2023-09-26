<?php

namespace App;

class Message
{
    const   defaultTimer = 1700;
    private $title = 'درود بر شما',
            $message = 'به وبسایت من خوش آمدید',
            $level = 'info',
            $timer = self::defaultTimer;

    private function create()
    {
        $send = [
            'title' => $this->title,
            'message' => $this->message,
            'level' => $this->level,
            'timer' => $this->timer
        ];
        session()->flash('show_message', $send);
    }

    public function store($timer = self::defaultTimer)
    {
        $this->title = 'ثبت اطلاعات';
        $this->message = 'اطلاعات با موفقیت ایجاد شدند';
        $this->level = 'success';
        $this->timer=$timer;
        self::create();
    }

    public function update($timer = self::defaultTimer)
    {
        $this->title = 'ویرایش اطلاعات';
        $this->message = 'اطلاعات با موفقیت ویرایش شدند';
        $this->level = 'warning';
        $this->timer=$timer;
        self::create();
    }

    public function delete($timer = self::defaultTimer)
    {
        $this->title = 'حذف اطلاعات';
        $this->message = 'اطلاعات با موفقیت حذف شدند';
        $this->level = 'danger';
        $this->timer=$timer;
        self::create();
    }
    public function login($timer = self::defaultTimer)
    {
        $this->title = 'ورود';
        $this->message = 'شما با موفقیت وارد شدید';
        $this->level = 'info';
        $this->timer=$timer;
        self::create();
    }
}
