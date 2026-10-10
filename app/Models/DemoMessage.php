<?php

namespace App\Models;

use Database\Factories\DemoMessageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['message'])]
class DemoMessage extends Model
{
    /** @use HasFactory<DemoMessageFactory> */
    use HasFactory;
}
