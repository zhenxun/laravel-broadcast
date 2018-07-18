<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }} <br/>
                        <small>{{ message.user.created_at }}</small>
                    </strong>
                </div>
                <p class="my-1 p-1 border border-info rounded">
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['messages'],
    };
</script>