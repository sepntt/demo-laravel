<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

class MarkdownController extends Controller
{

    public function create(Request $request)
    {
    	$config = $request->get('config');
    	$config = json_decode($config, 1);
    	dd($config);
    	return $this->render(['config' => $config]);
    }

    public function config()
    {
    	return [
		    'width' => "100%",
            'height' => 600,
            'path' => asset('packages/editor.md/lib').'/',
            'codeFold' => true,
            'toolbarIcons' => [
                "undo", "redo", "|", 
                "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|", 
                "h1", "h2", "h3", "h4", "h5", "h6", "|", 
                "list-ul", "list-ol", "hr", "|",
                "link", "reference-link", "image", "code", "preformatted-text", "code-block", "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                "goto-line", "watch", "preview", "clear", "search"
            ],
            'toolbarAutoFixed' => false,
            'tex' => true,// 开启科学公式TeX语言支持，默认关闭
    	];
    }
}
