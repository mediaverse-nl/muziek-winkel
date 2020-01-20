<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Music Library</div>
            <div class="card-body">
                <datatable class="table" :columns="columns" :data="rows"></datatable>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                columns: [
                    {label: 'id', field: 'id'},
                    {label: 'Title', field: 'title', headerClass: 'class-in-header second-class'},
                    {label: 'Album', field: 'album.title', headerClass: 'class-in-header second-class'},
                    {label: 'Artist', field: 'album.artist.name', headerClass: 'class-in-header second-class'},
                    {label: 'Preview', representedAs: ({id}) =>
                        `<audio controls="controls" controlsList="nodownload" preload="auto" style="width: 200px;">
                            <source src="/api/song/${id}" type="audio/mpeg">
                            Your browser does not support the
                            <code>audio</code> element.
                        </audio>`,
                    interpolate: true},
                    {label: 'music', representedAs: ({id}) =>
                          `<a class="btn btn-info" href="/album/${id}" >
                             bekijk het album
                            </a>`,
                    interpolate: true}
                ],
                rows: []
            }
        },

        created(){
            this.loadData();
        },

        methods:{
            showAlbum(id){
                router.push({ name: 'user', params: { id: id}})
            },
            loadData(){
                axios.get('auth/songs')
                    .then((response) => {
                        this.rows = response.data.data
                        console.log(response.data );
                    })
                    .catch(err=>{
                        console.log(err)
                    });
            },
        }
    }
</script>
