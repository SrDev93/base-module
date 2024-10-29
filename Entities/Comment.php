<?php

namespace Modules\Base\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function newFactory()
    {
        return \Modules\Base\Database\factories\CommentFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->hasOne(Comment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('children');
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($comment) {
            if (count($comment->children)){
                foreach ($comment->children as $child){
                    $child->delete();
                }
            }
        });
    }
}
