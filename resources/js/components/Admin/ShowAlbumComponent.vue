<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">

                    <div class="form-group">
<!--                        <label for="name">Author: {{this.user.name}}</label>-->
<!--                            <input type="text" class="form-control" id="name" v-model="name">-->
                    </div>

                    album: {{this.album.title}}
                    <ol>
                        <li v-if="songs.length > 0" v-for="song in songs" style="height: 40px;">
                            {{song.title}}
                            <!--                                {{ user.name }} - -->
                            <!--                                <router-link class="btn btn-primary btn-sm" :to="{name: 'admin.artists.show', params: {id: user.id }}" >-->
                            <!--                                    show-->
                            <!--                                </router-link>-->
                        </li>
                    </ol>
                </div>
            </div>
            <br>
            <div class="card card-default">
                <div class="card-header">upload a song</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" class="form-control" v-model="form.title" >
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label>track number</label>-->
<!--                        <input type="text" class="form-control" v-model="form.track_number">-->
<!--                    </div>-->

                    <div class="form-group">
                        <label>file</label>
                        <input type="file" @change="onFileSelected" class="form-control">
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
                album: [],
                songs: [],
                file: "",
                form: {
                    title: '',
                }
            }
        },
        created(){
            this.loadData();
        },
        methods:{
            loadData(){
                const params = this.$route.params

                axios.get('albums/' + params.id)
                    .then((response) => {
                        this.album = response.data.data
                        this.songs = response.data.data.songs
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

                formData.append('file', this.file);
                formData.append('album_id', params.id);
                formData.append('title', this.form.title);

                axios.post('songs',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {
                        console.log(response);
                        location.reload()
                    })
                    .catch(err=>{
                        console.log(err)
                    });
            }
        }
    }
</script>
