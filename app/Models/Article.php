<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_id', 'topic','description', 'tags',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
