<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

                <div class="card-body">
                    {{album.title}}
                    {{album.artwork}}

                    <img :src="'/storage/artwork/' + album.artwork"/>

                    <b-img src="https://picsum.photos/1024/400/?image=41" fluid alt="Responsive image"></b-img>

                    <figure style="width: 100% !important;">
                        <div class="audio-container">
                            <audio controls="controls" preload="auto" style="width: 100%;">
                                <source src="/api/song/10" type="audio/mpeg">
                                Your browser does not support the
                                <code>audio</code> element.
                            </audio>
                        </div>
                    </figure>
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
                    })
                    .catch(err=>{
                        console.log(err)
                    });
            },


            postData(e){

                const params = this.$route.params

                let formData = new FormData();

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
