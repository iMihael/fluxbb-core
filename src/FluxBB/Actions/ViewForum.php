<?php

namespace FluxBB\Actions;

use Symfony\Component\HttpFoundation\Request;
use FluxBB\Models\Forum;

class ViewForum extends Page
{
    protected $viewName = 'fluxbb::viewforum';


    protected function handleRequest(Request $request)
    {
        $fid = \Route::input('id');

        // Fetch some info about the topic
        $this->data['forum'] = Forum::findOrFail($fid);
    }
}
