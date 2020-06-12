@extends('layouts/app')

@section('content')
<div class="container">
    <h1 class="text-center">Static Pages Generator API</h1>

    <P>This is the static pages generator api that enables to create, edit and store static files. The static files majorly include markdown and html files <br/> You give us a markdown file or just the contents of it and we give a whole html page.</P>

    <h2 class="mt-3">How to get started</h2>
    <p>Since you already have an account with, head to your dashboard in the navbar and create an API key. This key will enable you to interact with our API. <br/> When you get the key, it will be placed in the <code>Authorization</code> header as the Bearer token. Then you will be all set.</p>

    <p>All the urls return responses in json format, like so;</p>
    <code>
      {
    "pages": [
        "test2.md",
        "title.md"
    ]
}
    </code>

    <p class="mt-3">
        <h3>Allowed HTTPs requests</h3>
        <code>
            POST: Update resource <br/> 
            GET: Get a resource or list of resources
        </code>
    </p>

    <p class="mt-3">
        <h3>Description Of Server Responses:</h3>
        <code>
            200: OK<br/>
            201: Created<br/>
            400: Bad Request<br/>
            500: Internal Server Error
        </code>
    </p>
    <p>
        <h3>To upload a markdown file</h3>
        <code>
            POST: http://server-url/api/v1/add_page
        </code>

        <p><stront>URL parameter(s)</strong></p>
        <code>
            page_title
            page_content
        </code>
    </p>
    <p>
        <h3>To write to a file:</h3>
        <code>
            POST: http://server-url/api/v1/set_page_markdown
        </code>
        <p><strong>URL parameter(s)</strong></p>
        <code>
            page_title
            page_content
        </code>
    </p>
    <p>
        <h3>To Get the HTML page:</h3>
        <code>
            GET: http://server-url/api/v1/retrieve_html_page
        </code>
        <p><strong>URL parameter(s)</strong></p>
        <code>
            page_title
        </code>
    </p>
    <p>
        <h3>To Get the markdown page:</h3>
        <code class="container">
            GET: http://server-url/api/v1/retrieve_markdown_page
        </code>
        <p><strong>URL parameter(s)</strong></p>
        <code>
            page_title
        </code>
    </p>
    <p>
        <h3>To Get a list of Pages:</h3>
        <code class="container">
            GET: http://server-url/api/v1/list_pages
        </code>
    </p>

    <h3>Errors</h3>
    <p>
        If any of the responses are not successful, it means there was problem and it will be indicated in the *errors* key of the json response, like so;
    </p>
    <code>
        {
        'errors':
            "error response here"
    }
    </code>
</div>
@endsection
