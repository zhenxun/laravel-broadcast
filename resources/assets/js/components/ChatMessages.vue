<template>
    <!-- <ul class="chat">
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
    </ul> -->

     <div class="col-12 border bg-light rounded">
        <div class="d-flex flex-column" v-for="message in messages">

            <div v-if="message.first === true " class="d-flex flex-column">
                <div  class="d-flex align-items-center">
                    <div class="py-2">
                        <img v-if="message.user.avatar !== ''" :src="message.user.avatar" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                        <img v-else :src="'http://placehold.it/35x35'" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                    </div>
                    <div class="px-3 py-3">
                        <p class="box u-l-tri mb-0 text-white">{{ message.message }}</p>
                    </div>
                </div>                 
            </div>            

            <div v-else-if="parseInt(user.id) === parseInt(message.user_id)" class="d-flex flex-column">
                <div  class="d-flex align-items-center">
                    <div class="py-2">
                        <img v-if="message.user.avatar !== ''" :src="message.user.avatar" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                        <img v-else :src="'http://placehold.it/35x35'" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                    </div>
                    <div class="px-3 py-3">
                        <p class="box u-l-tri mb-0 text-white">{{ message.message }}</p>
                    </div>
                </div>                 
            </div>

            <div v-else class="d-flex flex-column flex-row-reverse">
                <div  class="d-flex align-items-center">
                    <div class="px-3 py-3">
                        <p class="box u-r-tri mb-0 text-white">{{ message.message }}</p>
                    </div>
                    <div class="py-2">
                        <img v-if="message.user.avatar !== ''" :src="message.user.avatar" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                        <img v-else :src="'http://placehold.it/35x35'" class="img-thumbnail rounded-circle" style="width:35px;height:35px;">
                    </div>
                </div>                 
            </div>



        </div>
     </div>

</template>

<script>
    export default {
        props: ['messages', 'user'],
    };
</script>