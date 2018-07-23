@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card m-3">
                    <ul class="list-group list-group-flush">
                      @foreach($dates as $date)
                        <li class="list-group-item">
                          <div class="d-flex justify-content-between">
                            <div><strong>位於 <span class="text-info">{{ $date->date }}</span> 聊天記錄</strong></div>  
                            <div> <a href="{{ route('history.show', $date->date) }}" class="btn btn-success btn-sm text-white">查看聊天記錄</a></div> 
                          </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
