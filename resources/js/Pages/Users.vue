<script setup>

</script>

<template>
    <div v-for="user in $page.props.users">
        {{ user.name }} {{ user.email }} | <span v-for="skill in user.description">{{skill+' | '}}</span>
        <hr>
    </div>
</template>

<style scoped>

</style>