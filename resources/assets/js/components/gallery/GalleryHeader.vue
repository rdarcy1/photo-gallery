<template>
    <div class="w-100">
        <div class="header-image">
            <div class="text-container">
                <h1>Asia 2018</h1>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>

<style lang="scss" scoped>
    .header-image {
        height: 400px;
        background-image: url('https://picsum.photos/2000/1000?random');
        display: flex;
        flex-direction: row;
        align-items: flex-end;

        .text-container {
            box-shadow: inset 10px -1000px 1000px -1000px rgba(0,0,0,1);
            color: white;
            width: 100%;
            padding: 3rem;
        }
    }
</style>
