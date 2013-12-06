<?php

class PasteController extends BaseController
{
    protected $layout = 'layout';

    public function show(Paste $paste)
    {
        $this->layout->content = View::make('show', compact('paste'));
        return $this->layout;
    }

    public function create()
    {
        $this->layout->content = View::make('create');
        return $this->layout;
    }

    public function store()
    {
        $pasteForm = new PasteForm(Input::get('paste'));

        if ($pasteForm->save()) {
            $paste   = $pasteForm->getPaste();
            $url     = URL::route('show', [$paste->uid]);
            $message = trans('messages.paste.success', compact('url'));

            Session::flash('success', $message);
            return Redirect::to($url);
        } else {
            Session::flash('error', trans('messages.paste.error'));
            Session::flash('errors', $pasteForm->errors());
            return $this->create();
        }
    }
}
