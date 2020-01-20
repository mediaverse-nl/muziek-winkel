<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard Component</div>

                <div class="card-body">
                    <router-link class="btn btn-primary" :to="{name: 'admin.artists.create'}" >
                       create artist
                    </router-link>
                    <hr>
                    <ol>
                        <li v-if="users.length>0" v-for="user in users" style="height: 40px;">
                            {{ user.name }} -
                            <router-link class="btn btn-primary btn-sm" :to="{name: 'admin.artists.show', params: {id: user.id }}" >
                                show
                            </router-link>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                users: []
            }
        },
        created(){
            this.loadData();
            console.log('test');
        },
        methods:{
            loadData(){
                axios.get('artists')
                    .then((response) => {
                        this.users = response.data.data
                        console.log(response.data.data );
                    })
                    .catch(err=>{
                    console.log(err)
                });
            }
        }
    }
</script>
