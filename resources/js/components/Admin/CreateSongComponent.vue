<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Home Component</div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                       File
                        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>

                    </div>

                    <div class="form-group">
                        <button v-on:click="submitFile()">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                file: ''
            }
        },

        methods: {
            /*
              Submits the file to the server
            */
            submitFile(){
                /*
                        Initialize the form data
                    */
                let formData = new FormData();

                /*
                    Add the form data we need to submit
                */
                // for( var i = 0; i < this.files.length; i++ ){
                //     let file = this.files[i];

                    formData.append('file', this.file);
                // }

                /*
                  Make the request to the POST /single-file URL
                */
                axios.post( '/artists',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function(response){
                    console.log('SUCCESS!!', response);
                })
                    .catch(function(){
                        console.log('FAILURE!!');
                    });
            },

            /*
              Handles a change on the file upload
            */
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
            }
        }
    }
</script>
