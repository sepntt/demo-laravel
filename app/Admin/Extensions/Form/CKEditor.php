<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        // 'https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js',
        // '/packages/ckeditor5-build-classic/ckeditor.js',
        '/packages/ckeditor/ckeditor.js',
        // '/packages/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
        $csrf = csrf_token();

        // $this->script = $this->ckeditor5($csrf);
        $this->script = $this->ckeditor4($csrf);

        return parent::render();
    }

    public function ckeditor5($csrf)
    {
        $script = "ClassicEditor
        .create( document.querySelector( '#editor' ) ,{
            toolbar : ['heading','undo','bold','blockQuote','imageUpload','link','numberedList','bulletedList'],
            ckfinder : {
                uploadUrl : '/admin/blog/upload?_token={$csrf}'
            },
            language : 'zh-CN'
        })
        .then(
            function(editor) {
                window.editor = editor;
                data = editor.getData();
                console.log(data);
                console.log(editor);
                // console.log(editor.plugins._plugins)
                // console.log(editor.plugins._plugins.keys())
                // console.log(editor.plugins.get('FileRepository'))
                // console.log(editor.plugins.get('FileRepository').createUploadAdapter)
                // console.log(editor.plugins.get('FileRepository').createUploadAdapter._initListeners)
                
            }
        )
        .catch( error => {
            console.error( error );
        } );
        ";
        return $script;
    }

    public function ckeditor4($csrf)
    {
        $script = "
CKEDITOR.replace( 'editor' );
        ";
        return $script;
    }
}