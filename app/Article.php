<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;
use Image;
use Input;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id',
        'image'
    ];

    protected $appends = ['tag_list'];

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query) {
        $query->where('published_at', '>', Carbon::now());
    }

    public function setPublishedAtAttribute($date) {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date) {
        //return new Carbon($date);
        return Carbon::parse($date)->format('Y-m-d');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute() {
        return $this->tags->lists('name');
    }

    public function setImage($request) {
        $this->image = $this->storeImage($request);
    }

    public function storeImage($request) {
        $destinationPath = 'images'; // upload path, goes to the public folder
        $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
        $fileName = substr(microtime(), 2, 8).'_uploaded.'.$extension; // renaming image
        $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
        $fullPath = $destinationPath."/".$fileName; // set the image field to the full path
        return $fullPath;
    }

    public function getImage() {
        if(!empty($this->image) && File::exists($this->image)) {
            // Get the filename from the full path
            $filename = basename($this->image);
            return 'images/'.$filename;
        }
        return 'images/missing.png';
    }
}
