<template>
  <app-layout>
    <template v-slot:header>
      Liste de nos formations
    </template>

    <div class="py-6" v-for="course in this.coursesList" v-bind:key="course.id">
      <div class="mx-10 bg-gray-200 rounded shadow p-4">
        <div class="text-sm text-gray-500">Mise en ligne par{{ course.user.name }} -
          <span class="text-indigo-500 text-sm">{{ course.participants }}
            participant<span v-if="parseInt(course.participants) > 1">s</span>
          </span>
        </div>
        <div class="flex justify-between items-center">
          <div class="text-3xl">{{ course.title }}</div>
          <div class="">{{ course.episodes_count }} Episode(s)</div>
        </div>
        <div>{{ course.description }}</div>
        <a :href="'course/' + course.id" class="bg-indigo-500 text-white px-2 py-1 text-sm
          mt-3 hover:bg-indigo-700 rounded inline-block
          ">Vor la formation</a>
      </div>

    </div>
  </app-layout>
</template>

<script>


import AppLayout from '@/Layouts/AppLayout.vue'
export default {
  components: {
    AppLayout,
  },
  props: ['courses'],

  data() {
    return { coursesList: this.courses }
  },
}
</script>

