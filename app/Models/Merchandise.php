<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
 protected $fillable = [
       "name",
        "price",
        "description",
        "image_merch"

    ];}
