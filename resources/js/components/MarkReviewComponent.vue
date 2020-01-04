<template>
    <a style="cursor: pointer">
        <i v-if="!loading" v-on:click="markAsReviewd" v-bind:style="{color: markedColor}" class="fas fa-star"></i>
    </a>
</template>

<script>
    import Axios from 'axios';

    export default {
        props: ['content_id'],
        data() {
            return {
                marked: false,
                loading: false
            }
        },
        computed: {
            markedColor: function () {
                return this.marked ? 'orange' : '#777'
            }
        },
        mounted() {
            console.log("Content ID", this.content_id)
        },
        methods: {
            markAsReviewd: function () {
                this.loading = true;
                Axios.put('/content/markAsReviewed/' + this.content_id)
                    .then(res => {
                        this.loading = false;
                        this.marked = true;
                    }).catch(err => {
                    console.log(err);
                })
            }
        }
    }
</script>
