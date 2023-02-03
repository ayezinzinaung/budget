@extends('layout')

@section('body')
    <div class="wrapper my-3">
        <div class="box">
            <form method="POST" action="/ideas">
                {{ csrf_field() }}
                <div class="box__section">
                    <div class="input input--small">
                        <label>Type</label>
                        <select name="type">
                            <option value="bug">Bug or Error</option>
                            <option value="feature_request">Feature Request or Suggestion</option>
                        </select>
                        @include('partials.validation_error', ['payload' => 'type'])
                    </div>
                    <div class="input input--small">
                        <label>Body</label>
                        <textarea name="body"></textarea>
                        @include('partials.validation_error', ['payload' => 'body'])
                    </div>
                    <button class="button">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
