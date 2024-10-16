<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

// Reactive form data using Inertia's useForm
const form = useForm({
  title: '',
  description: '',
  status: 'pending', // Default to 'pending'
});

// Function to handle form submission
const submit = () => {
  form.post('/tasks', {
    onSuccess: () => form.reset(), // Reset form after successful submission
  });
};
</script>

<template>

<Head title="Create Task" />

<AuthenticatedLayout>

    <section class="bg-green-50">
    <div class="container m-auto max-w-2xl py-24">
      <div class="bg-white px-6 py-8 mb-4 shadow-md rounded-md border m-4 md:m-0">
        <form @submit.prevent="submit">
          <h2 class="text-3xl text-center font-semibold mb-6">Add Task</h2>

          <div class="mb-4">
            <label for="status" class="block text-gray-700 font-bold mb-2">
              Status
            </label>
            <select
              id="status"
              name="status"
              v-model="form.status"
              class="border rounded w-full py-2 px-3"
              required
            >
              <option value="completed">Completed</option>
              <option value="pending">Pending</option>
            </select>
          </div>

          <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">
              Task Title
            </label>
            <input
              type="text"
              id="title"
              name="title"
              v-model="form.title"
              class="border rounded w-full py-2 px-3 mb-2"
              placeholder="Type Your Task Title"
              required
            />
          </div>

          <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">
              Description
            </label>
            <textarea
              id="description"
              name="description"
              v-model="form.description"
              class="border rounded w-full py-2 px-3"
              rows="4"
              placeholder="Add any task description"
            ></textarea>
          </div>

          <button
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full w-full focus:outline-none focus:shadow-outline"
            type="submit"
          >
            Add Task
          </button>
        </form>
      </div>
    </div>
  </section>

</AuthenticatedLayout>

  
</template>
