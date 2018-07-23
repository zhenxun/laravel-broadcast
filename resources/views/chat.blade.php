@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-heading bg-info text-white p-3">
                        <h5> <strong>聊天室</strong></h5>
                    </div>

                    <div class="card-body card-body-message" >
                        <chat-messages class="scroll" :messages="messages" :user="{{ Auth::user() }}"></chat-messages>
                    </div>
                    <div class="card-footer">
                        <chat-form
                                v-on:messagesent="addMessage"
                                :user="{{ Auth::user() }}"
                                created_at=""
                                :first="true"
                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection