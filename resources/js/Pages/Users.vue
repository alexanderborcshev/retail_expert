<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';

    const form = useForm({
        email: '',
        name: '',
    });

    const submit = () => {
        if (!isValidInput(form.name)) {
            form.setError('name', 'либо только цифры не более 12 символов, либо только буквы в обоих регистрах') ;
        }
        form.post(route('login'), {
            onFinish: () => form.reset('email', 'name'),
        });

    };

    function isValidInput(input) {
        // Проверяем, что длина строки не превышает 12 символов
        if (input.length > 12) return false;

        // Проверяем, что строка содержит только цифры
        if (/^\d+$/.test(input)) return true;

        // Проверяем, что строка содержит только буквы в обоих регистрах
        if (/^[a-zA-Z]+$/.test(input)) return true;

        // Если ни одно из условий не выполнено, возвращаем false
        return false;
    }
</script>

<template>
    <div v-for="user in $page.props.users">
        {{ user.name }} {{ user.email }} | <span v-for="skill in user.description">{{skill+' | '}}</span>
        <hr>
    </div>
    {{ form.name }}
    <form @submit.prevent="submit">
        <div>
            <InputLabel for="name" value="Name" />

            <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
            <InputLabel for="email" value="Email" />

            <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autocomplete="username"
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Register
            </PrimaryButton>
        </div>
    </form>
</template>

<style scoped>

</style>