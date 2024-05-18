<script setup>

</script>

<template>
    <div v-for="user in $page.props.users">
        {{ user.name }} <br>
        {{ user.email }} <br>
        <span v-for="skill in user.description">{{skill}} </span>
    </div>
</template>

<style scoped>

</style>