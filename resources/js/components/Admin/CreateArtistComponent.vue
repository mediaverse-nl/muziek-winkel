<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Home Component</div>

                <div class="card-body">
                    <form @submit="formSubmit">

                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input type="text" class="form-control" id="name" v-model="name">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                name: '',
            }
        },

        methods: {
            /*
              Submits the file to the server
            */
            formSubmit(e) {
                e.preventDefault();

                let currentObj = this;

                console.log({ name: this.name });

                axios.post( '/artists', {
                    name: this.name,
                })
                .then(function (response) {
                    currentObj.output = response.data;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            },
        }
    }
</script>
