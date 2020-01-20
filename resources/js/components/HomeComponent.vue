<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

                <div class="card-body">
                    login om verder te gaan

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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
