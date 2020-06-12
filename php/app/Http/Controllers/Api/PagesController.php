<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PagesResource;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    // This function will take care of creating the file and writing the markdown content to it.
    // the content will be automatically overwritten when the /set_content_markdown is hit

    public function set_page(Request $request) {
        try {
            $title = $request->input('page_title');
            $content = $request->input('page_content');
            
            // this will create a file on local storage with the markdown extension
            if ($title) {
                if(Storage::put('markdown/'.$title.'.md', $content)){
                    if($content) {
                        $html = Markdown::convertToHtml($content);
                    } else {
                        $html = "";
                    }
                    Storage::put('html/'.$title.'.html', '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
    </head>
    <body>
    '.$html.'
    </body>
    </html>');
                    return response()->json(['message' => 'Your page has been created successfully'], 201);
                } else {
                    return response()->json(['errors' => 'Failed to create your page, please try again correctly'], 500);
                }
            } else {
                return response()->json(['errors' => 'Sorry, the page title is required']);
            }

            if ($request->hasFile('file')) {
                if ($request->file('file')->isValid()) {
                    $file = $request->file('file');
                    Storage::put('markdown/'.$file);
                    return response()->json([
                        'author' => auth()->user()->name,
                        'message' => 'Your file has been uploaded successfully'
                        ]);
                } else {
                    return response()->json(['errors' => 'The upload process had some errors, please try again']);
                }
            }
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 500);
        }
    }

    public function retrieve_html_page(Request $request)
    {
        $title = $request->input('page_title');
        try {
            if ($title) {
                if (Storage::exists('html/'.$title.'.html')) {
                    $html = Storage::get('html/'.$title.'.html');
                    return response()->json([
                        'page_info' => [
                            'author' => auth()->user()->name,
                            'url' => Storage::url('files/html/' . $title.'.html'),
                            'title' => $title,
                            'format' => 'html page',
                            'file_size' => filesize(storage_path('app/public/files/html/' . $title.'.html')),
                            'html' => $html
                        ]
                    ]);
                } else {
                    return response()->json(['errors' => 'The page you requested for does not exist.'], 404);
                }
            } else {
                return response()->json(['errors' => 'Sorry, the page title is required']);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 500);
        }
    }

    public function retrieve_markdown_page(Request $request)
    {
        // get the page title
        $title = $request->input('page_title');
        try {
            if ($title) {
                if (Storage::exists('markdown/'.$title.'.md')) {
                    $markdown = Storage::get('markdown/'.$title.'.md');
                    return response()->json([
                        'page_info' => [
                            'author' => auth()->user()->name,
                            'url' => Storage::url('files/markdown/' . $title.'.md'),
                            'title' => $title,
                            'format' => 'markdown file',
                            'file_size' => filesize(storage_path('app/public/files/markdown/' . $title.'.md')),
                            'markdown' => $markdown
                        ]
                    ]);
                } else {
                    return response()->json(['errors' => 'The page you requested for does not exist.'], 404);
                }
            } else {
                return response()->json(['errors' => 'Sorry, the page title is required']);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 500);
        }
    }

    public function list_pages()
    {
        $files = array_slice(scandir(storage_path('app/public/files/markdown')), 2);

        if (count($files)) {
            return response()->json([
                'author' => auth()->user()->name,
                'pages' => $files]);
        } else {
            return response()->json(['pages' => 'Sorry, you have not saved any pages with us']);
        }
    }

    public function get_docs() {
        $path = Storage::url('files/markdown/docs.md');
        return response()->json([
            'author' => auth()->user()->name,
            'documentation' => $path
        ]);
    }
}
