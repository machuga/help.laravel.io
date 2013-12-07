<?php

class PasteForm
{
    protected $paste;
    protected $files = [];
    protected $errors = [];

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
        $saved = false;

        if ($this->valid() && $this->paste->save()) {
            foreach ($this->files as $file) {
                $this->paste->files()->save($file);
            }
            $saved = true;
        }

        return $saved;
    }

    public function valid()
    {
        if (count($this->files) > 0) {
            return true;
        }
        return false;
    }

    public function paste()
    {
        return $this->paste;
    }

    public function errors()
    {
        return $this->errors;
    }
}
