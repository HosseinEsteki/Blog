<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function App\message;

class Action extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'comment_id',
        'category_id',
        'post_id',
        'tag_id',
        'name'
    ];
    protected static function boot()
    {
        self::creating(function ($action){
            $action->user_id=\Auth::id();
        });
        self::created(function ($action){
            switch($action->name){
                case \userActions::Add->name:
                    message()->store();
                    break;
                case \userActions::Edit->name:
                    message()->update();
                    break;
                case \userActions::Delete->name:
                    message()->delete();
                    break;
                case \userActions::Login->name:
                    message()->login();
                    break;
            }
        });
        parent::boot();
    }

#Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
#endRelations
    public function actionFather()
    {
        $name='کاربر';
        $father=$this->user;
        $process=$this->process;
        if(isset($this->comment_id)){
            $name='نظر';
            $father=$this->comment;
        }
        elseif (isset($this->category_id)){
            $name='دسته‌بندی';
            $father=$this->category;
        }elseif (isset($this->post_id)){
            $name='پست';
            $father=$this->post;
        }elseif (isset($this->tag_id)){
            $name='برچسب';
            $father=$this->tag;
        }
        return[
            'name'=>$name,
            'father'=>$father
        ];
    }
}

