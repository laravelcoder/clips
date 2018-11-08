<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clip
 *
 * @package App
 * @property string $title
 * @property text $description
 * @property text $notes
*/
class Clip extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'notes'];
    protected $hidden = [];
    
    
    
}
