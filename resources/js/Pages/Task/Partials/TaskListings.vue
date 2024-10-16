<script setup>
import TaskListing from './TaskListing.vue';

defineProps({
  tasks: Object, 
});
</script>

<template>
  <section class="bg-blue-50 px-4 py-10">
    <div class="container-xl lg:container m-auto">
      <h2 class="text-3xl font-bold text-green-500 mb-6 text-center">
        Browse Your Tasks
      </h2>

        <div class="mb-6 text-center">
            <button
            @click="$inertia.visit('/tasks/create')" 
            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600"
            >
            Add New Task
            </button>
      </div>

      <div v-if="tasks.data && tasks.data.length > 0">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <TaskListing v-for="task in tasks.data" :key="task.id" :task="task" />
        </div>
      </div>

      <div class="mt-6 flex justify-center">
        <button
          v-if="tasks.prev_page_url"
          @click="$inertia.visit(tasks.prev_page_url)"
          class="px-4 py-2 mr-2 bg-gray-300 text-gray-700"
        >
          Previous
        </button>
        <button
          v-if="tasks.next_page_url"
          @click="$inertia.visit(tasks.next_page_url)"
          class="px-4 py-2 bg-gray-300 text-gray-700"
        >
          Next
        </button>
      </div>
    </div>
  </section>
</template>
