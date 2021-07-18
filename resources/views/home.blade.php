@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="p-3 text-center">{{"Hello, ".Auth::user()->name}}</div>
                            <div class="p-3  text-center">Go to <a href="/applicants">Applicant's</a> page</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
