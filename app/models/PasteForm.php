<?php

class PasteForm
{
    protected $paste;
    protected $files = [];

    public function __construct($input = [])
    {
        if (isset($input['file'])) {
            $this->files = array_map(function($fileInput) {
                return new PasteFile($fileInput);
            }, $input['file']);

            unset($input['file']);
        }

        $this->paste = new Paste($input);
    }

    public function save()
    {
        if ($this->paste->save()) {
            foreach ($this->files as $file) {
                $this->paste->files()->save($file);
            }

            return true;
        }
    }

    public function getPaste()
    {
        return $this->paste;
    }
}
