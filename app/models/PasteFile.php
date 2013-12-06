<?php

class PasteFile extends Eloquent
{
    protected $table = 'files';
    protected $fillable = ['name','file_type','code'];

    public function paste()
    {
        return $this->belongsTo('Paste');
    }
}
