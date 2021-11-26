<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resource extends Model
{
    protected $hidden = ['resourcable_type', 'resourcable_id'];
    protected $appends = ['url_asset', 'minified_url_asset'];
    protected $fillable = ['url', 'minified_url', 'alt', 'type', 'position', 'is_main', 'created_by'];

    public function getFileAttribute(){
        return Storage::disk("myDisk")->get($this->url);
    }

    public function getMinifiedFileAttribute(){
        return Storage::disk("myDisk")->get($this->minified_url);
    }

    public function model()
    {
        return $this->morphTo('resourcable');
    }

    public function getUrlAssetAttribute()
    {
        return $this->url ? '/storageFiles/'.$this->url : null;
    }

    public function getMinifiedUrlAssetAttribute()
    {
        return $this->minified_url ? '/storageFiles/'.$this->minified_url : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getUserAttribute()
    {
        return $this->created_by;
    }

}
