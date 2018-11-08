<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

/**
 * Class Clip
 *
 * @package App
 * @property string $title
 * @property text $description
 * @property text $notes
 * @property string $video
*/
class Clip extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['title', 'description', 'notes', 'video'];
    protected $hidden = [];
    
    
    
}
