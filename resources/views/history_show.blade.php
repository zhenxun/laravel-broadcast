@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

              <div class="col-12 border bg-light">
                @for ($i = 0; $i < count($messages); $i++)
                  @php
                    $flex_direction = (Auth::user()->id == $messages[$i]['user']->id )? '':'flex-row-reverse';
                    $utri = (Auth::user()->id == $messages[$i]['user']->id )? 'u-l-tri':'u-r-tri';
                  @endphp
                  <div class="d-flex flex-column {{ $flex_direction }}">
                    <div class="d-flex align-items-center">
                      @if(Auth::user()->id != $messages[$i]['user']->id)
                        <div class="px-3 py-3">
                            <p class="box {{ $utri }} mb-0 text-white">{{ $messages[$i]->message }}</p>
                        </div>
                        <div class="py-2">
                            <img src="{{ $messages[$i]['user']->avatar or 'http://placehold.it/35x35' }}" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                        </div>
                      @else
                        <div class="py-2 px-2">
                            <img src="{{ $messages[$i]['user']->avatar or 'http://placehold.it/35x35' }}" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                        </div>
                        <div class="px-3 py-3">
                            <p class="box {{ $utri }} mb-0 text-white">{{ $messages[$i]->message }}</p>
                        </div>                       
                      @endif
                    </div>
                  
                  </div>
                @endfor
              </div>
          
            </div>
        </div>
    </div>
</div>
@endsection