<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel React application</title>
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <h2 style="text-align: center"> Laravel Vuex </h2>
    <div id="app"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Add New Post</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form" method="POST" action="{{ url('/api/transactions/create') }} ">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input required="required" value="{{ old('title') }}" placeholder="Enter post title" type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input required="required" value="{{ old('currency') }}" placeholder="currency" type="text" name="currency" class="form-control">
                            </div>
                            <div class="form-group">
                                <input required="required" value="{{ old('amount_deposited') }}" placeholder="amount_deposited" type="text" name="amount_deposited" class="form-control">
                            </div>
                            <div class="form-group">
                                <input required="required" value="{{ old('amount_received') }}" placeholder="amount_received" type="text" name="amount_received" class="form-control">
                            </div>
                            <div class="form-group">
                                <input required="required" value="{{ old('transaction_id') }}" placeholder="transaction_id" type="text" name="transaction_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <input required="required" value="1" placeholder="user_id" type="text" name="user_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="publish" class="btn btn-primary" value="Publish"/>
                                {{--<input type="submit" name="save" class="btn btn-default" value="Save Draft" />--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<script src="{{mix('js/app.js')}}" ></script>--}}
    <script src="{{mix('build/js/transactionApp.js')}}" ></script>
</body>
</html>