<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        <img v-if="message.user.avatar != ''" :src="message.user.avatar" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                        <img v-else :src="'http://placehold.it/35x35'" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                        {{ message.user.name }}
                        <small class="ml-1">{{ message.created_at }}</small>
                    </strong>
                </div>
                <p class="my-2 p-1 border border-info rounded">
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