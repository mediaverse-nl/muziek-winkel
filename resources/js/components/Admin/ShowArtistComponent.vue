<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Author: {{this.user.name}}</label>
<!--                            <input type="text" class="form-control" id="name" v-model="name">-->
                    </div>

                    albums
                    <ol>
                        <li v-if="albums.length>0" v-for="album in albums" style="height: 40px;">
                            {{album.title}}
<!--                                {{ user.name }} - -->
                            <router-link class="btn btn-primary btn-sm float-right" :to="{name: 'admin.album.show', params: {id: album.id }}" >
                                show album
                            </router-link>

                            <ol >
                                <li v-if="album.songs.length>0" v-for="song in album.songs" style="height: 40px;">
                                    {{song.title}}
                                    <!--                                {{ user.name }} - -->
                                    <!--                                <router-link class="btn btn-primary btn-sm" :to="{name: 'admin.artists.show', params: {id: user.id }}" >-->
                                    <!--                                    show-->
                                    <!--                                </router-link>-->
                                </li>
                            </ol>

                        </li>
                    </ol>
                </div>
            </div>
            <br>
            <div class="card card-default">
                <div class="card-header">make an album</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" class="form-control" v-model="form.title" >
                    </div>

                    <div class="form-group">
                        <label>artwork</label>
                        <input type="file" @change="onFileSelected" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>genre</label>
                        <input type="text" class="form-control" v-model="form.genre">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" @click="postData()">Submit</button>
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
                user: [],
                albums: [],
                file: "",
                form: {
                    title: '',
                    artwork: '',
                    genre: '',
                }
            }
        },
        created(){
            this.loadData();
        },
        methods:{
            loadData(){
                const params = this.$route.params

                axios.get('artists/' + params.id)
                    .then((response) => {
                        this.user = response.data.data
                        this.albums = response.data.data.albums
                        console.log(response.data.data );
                    })
                    .catch(err=>{
                        console.log(err)
                    });
            },

            onFileSelected(e){
                this.file = e.target.files[0];
            },

            postData(e){
                // e.preventDefault();

                const params = this.$route.params


                let formData = new FormData();

                formData.append('artwork', this.file);
                formData.append('artist_id', params.id);
                formData.append('title', this.form.title);
                formData.append('genre', this.form.genre);

                axios.post('albums',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {
                        location.reload()
                        console.log(response);
                    })
                    .catch(err=>{
                        console.log(err)
                    });
            }
        }
    }
</script>
