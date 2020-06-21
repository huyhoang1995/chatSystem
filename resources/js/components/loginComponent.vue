<template>
    <div>
          <form action="" method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                    <p>Account</p>
                    <input  v-model ="email"/>
                </div>
                <div class="form-group">
                    <p>password</p>
                    <input  v-model ="password"/>
                </div>
        
                
        
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button @click.prevent="login" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</template>
<script>

    export default {
        components: {

        },
        data() {
            return {
                email: '',
                password: '',
             
            }
        },
        mounted() {
          
        },
        methods: {
    
            login: function () {
             
                var param = service.chatService.data.login(this.email, this.password);
                service.chatService.action.login(param).then((result) => {
                    console.log(result)
                 
                }).catch((err) => {
                    console.log(err)
                });
            }

        }
    }

</script>