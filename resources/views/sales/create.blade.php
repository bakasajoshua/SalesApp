@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post Sale') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('sales') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="sales" class="col-md-4 col-form-label text-md-right">{{ __('Product details') }}</label>

                            <div class="col-md-6">
                                <input id="product" type="text"  name="product">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="sales" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
    
                                <div class="col-md-6">
                                    <input id="price" type="text"  name="price">
                                </div>
                            </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit sale') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection