<?php

namespace App;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Formation extends Model implements HasMedia
{
    use HasMediaTrait;

    /*
     * Search scope
     */
    public function scopeSearch($query, $s){
        return $query->where('category_id', 'like', '%' .$s. '%')
            ->orWhere('length', 'like', '%' .$s. '%')
            ->orWhere('label', 'like', '%' .$s. '%')
            ->orWhere('description', 'like', '%' .$s. '%');
    }

    /**
     * Get the user that owns the formation.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function former()
    {
        return $this->belongsTo('App\User', 'former_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'length', 'label', 'description', 'user_id', 'former_id', 'category_id'
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(200)
            ->sharpen(10);
    }

}
