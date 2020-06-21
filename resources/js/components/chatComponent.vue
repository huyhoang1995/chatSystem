<template>
    <div>
        <h1>Chat</h1>
        <div id="chat-window">
            <div v-for="(chat, key) in listConversation">
                <p v-if="chat.type == 'text'" >USER:  {{chat.content}}</p>
                <img v-if="chat.type == 'image'"  :src="configUrl + chat.content"/>

            </div>
        </div>
        <br/>

        <div style="text-align: center">
            <form>
                <input type="file" name="" name="images" v-on:change="uploadAvatar" id="handle" class="form-control" value="" placeholder="Handle">
                <br/>
                <br/>

                <input type="text"  name="" id="message"  style="width:100%; height: 60px;" class="form-control" value="" placeholder="Message" v-model="content">
                <br/>
                <button @click="insertChat()" id="send" type="button" value="send">Send</button>
            </form>

        </div>
    </div>
</template>
<script>
    	import openSocket from 'socket.io-client';

    export default {
        components: {

        },
        data() {
            return {
                listConversation: [],
                content: '',
                serverSocket : openSocket('http://localhost:5000'),
                configUrl : siteUrl + '/images/'
            }
        },
        mounted() {
            this.listChat();
            this.serverSocket.on('chat', data =>{
                this.handleMessageSocket(data)
            })
        },
        methods: {
            uploadAvatar:function(e){
                this.insertChat(e,'image')

            },
            handleMessageSocket:function(data){
                this.listConversation.push(data);
            },
            listChat: function () {
                service.chatService.action.listChat().then((result) => {
                    console.log(result)
                    this.listConversation = result.data;
                }).catch((err) => {
                    console.log(err)
                });
            },
            insertChat: function (e,type) {
                var typeInsert = '';
                if(type){
                    typeInsert = type;
                    var images = $("input[name*=images]")[0].files[0];

                }else{

                    typeInsert = 'text';
                    var images = '';
                }
                var param = service.chatService.data.insertChat(this.content, typeInsert, images);
                service.chatService.action.insertChat(param).then((result) => {
                    console.log(result)
                    this.listConversation.push(result.data.data)
                    this.serverSocket.emit('chat',result.data.data);
                }).catch((err) => {
                    console.log(err)
                });
            }

        }
    }

</script>