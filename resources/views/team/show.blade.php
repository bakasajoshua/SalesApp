@extends('layouts.app')

@section('content')
    
    @foreach ($user->children as $child)
        {{-- @php
            $salesCount = $child->sales->count();
        @endphp --}}
        <div>
            <h1>Supervisor</h1>
            <table>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Product</th>
                </tr>
                <tr>
                        {{-- <th rowspan="{{$salesCount}}">{{ $child->email }}</th>
                        <th rowspan="{{$salesCount}}">{{ $child->name }}</th> --}}
                        {{-- <th>@foreach ($child->sales as $sale)
                                {{ $sale->product }}:{{ $sale->price }}
                                <br>
                        @endforeach
                        </th> --}}
                        
                </tr>
            </table>
            <strong>Sales represenative</strong>
            
            @foreach ($child->children as $grand)
                {{-- @php
                    $salesCount = $grand->sales->count();
                @endphp --}}
                <div>
                        <table>
                                <tr>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                </tr>
                                <tr>
                                        {{-- <th rowspan="{{$salesCount}}">{{ $grand->email }}</th>
                                        <th rowspan="{{$salesCount}}">{{ $grand->name }}</th> --}}
                                        {{-- <th>@foreach ($grand->sales as $sale)
                                                {{ $sale->product }}:{{ $sale->price }}
                                                <br>
                                        @endforeach</th> --}}
                                        {{-- <th>{{ $grand->sales }}</th>
                                        <th>{{ $grand->price ?? ''}}</th><br> --}}
                                </tr>
                            </table>
                </div>
            @endforeach
        </div>
    @endforeach
    
@endsection