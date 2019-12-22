<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\File;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasRoles;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(70)
            ->height(70)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })->singleFile();
    }

    public function formations(){
        return $this->hasMany('App\User');
    }
    public function formation1(){
        return  $this->belongsToMany('App\Formation', 'inscription');
    }
    public function inscriptions(){
        return $this->hasMany('App\Inscription');
    }
}
