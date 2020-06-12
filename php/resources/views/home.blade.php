@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h2>Generate your API Key</h2>
                        <a href={{ route('generate-key') }} class="btn btn-success">Generate Key</a>
                    </div>
                    
                    <div class="mt-5">
                        <h2>You API Keys</h2>
                        <p>Access Token:</p>
                        <code>{{$token ?? 'your-token'}}</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
