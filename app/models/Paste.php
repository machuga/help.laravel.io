<?php

class Paste extends Eloquent
{
    protected $fillable = ['problem','version','expected','actual','errors'];

    public static function boot()
    {
        Paste::creating(function($paste) {
            $paste->uid = sha1(time().$paste->id);
        });
    }

    public function files()
    {
        return $this->hasMany('PasteFile');
    }
}
