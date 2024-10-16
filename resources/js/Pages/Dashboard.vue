<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Hero from './Task/Partials/Hero.vue';
import { Head } from '@inertiajs/vue3';
import TaskListings from './Task/Partials/TaskListings.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <Hero />
        <TaskListings />
    </AuthenticatedLayout>
</template>
