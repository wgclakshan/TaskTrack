<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Hero from '@/Pages/Task/Partials/Hero.vue';
import { Head } from '@inertiajs/vue3';
import TaskListings from '@/Pages/Task/Partials/TaskListings.vue';


defineProps({
    tasks: Array,
});

//const tasks = ref([]);

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <Hero />
        <TaskListings :tasks="tasks" />
    </AuthenticatedLayout>
</template>
