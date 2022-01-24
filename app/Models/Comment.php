<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'comment_name','comment_parent_comment'

    ];
    protected $primaryKey = 'comment_id';
    protected $table = 'tbl_comment';
    public $timestamps = false;

    // 'comment_email','comment_parrent','comment_status'

    // //1 bình sẻ thuộc về 1 sản phẩm
    //     public function product(){
    //         return $this->belongsTo('App\Models\Product','comment_product_id');
    //     }
}
