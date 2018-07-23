<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control mr-1" placeholder="在这里输入要发送的消息..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary" id="btn-chat" @click="sendMessage">
                发送
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user', 'created_at'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                //實體化時間物件
                var dNow = new Date();
                //計算出utc時間
                var utc = dNow.getTime() + (dNow.getTimezoneOffset() * 60000);
                //utc+8
                var nd = new Date(utc + (3600000*8));
                var nddate= nd.getFullYear() + '-' + (nd.getMonth()+1) + '-' + nd.getDate() + ' ' + nd.getHours() + ':' + nd.getMinutes() + ":" + nd.getSeconds();

                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage,
                    created_at: nddate
                });

                this.newMessage = ''
            }
        }    
    }
</script>