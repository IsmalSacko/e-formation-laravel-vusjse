<template>
  <app-layout>
    <template v-slot:header>
      <div class=" bg-indigo-500 text-white text-center p-3 rounded">
        Liste de nos formations
      </div>
    </template>

    <div
      class="py-6"
      v-for="course in this.coursesList.data"
      v-bind:key="course.id"
    >
      <div class="mx-10 bg-gray-200 rounded shadow p-4">
        <div class="text-sm text-gray-500">
          Mise en ligne par {{ course.user.name }} -
          <span class="text-indigo-500 text-sm"
            >{{ course.participants }} participant<span
              v-if="parseInt(course.participants) > 1"
              >s</span
            >
          </span>
          <div class="font-semibold bg-indigo-500 p-2 rounded-full text-white invisible sm:visible text-center">
            Dureé de la formation
            {{ convert(course.total_duration) }}
          </div>
        </div>
        <div class="flex justify-between items-center">
          <div class="text-3xl">{{ course.title }}</div>

          <div class="">{{ course.episodes_count }} Episode(s)</div>
        </div>
        <div>{{ course.description }}</div>
        <div class="flex justify-between">
          <a
            :href="'course/' + course.id"
            class="
              bg-indigo-500
              text-white
              px-2
              py-1
              text-sm
              mt-3
              hover:bg-indigo-700
              rounded
              inline-block
            "
            >Vor la formation</a
          >
          <a
            :href="'/course/edit/' + course.id"
            v-if="course.update"
            class="
              bg-gray-700
              text-white
              px-2
              py-1
              text-sm
              mt-3
              hover:bg-indigo-700
              rounded
              inline-block
            "
            >Modifier la formation</a
          >
        </div>
        <!-- <div class="bg-red-600 w-11 mt-3">
          <a :href="'/courses/delete/' + course.id" class="text-white"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6 text-center"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
              />
            </svg>
          </a>
        </div> -->
      </div>
    </div>
    <inertia-link
      :href="link.url"
      v-for="(link, p) in courses.links"
      v-bind:key="p"
      class="text-indigo-500 border-gray-500 p-5"
    >
      <span v-bind:class="{ 'text-red-700': link.active }">
        {{ link.label }}</span
      >
    </inertia-link>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
  components: {
    AppLayout,
  },
  props: ["courses", "links: Array"],

  data() {
    return { coursesList: this.courses };
  },
  methods: {
    convert(timestamps) {
      let hours = Math.floor(timestamps / 3600);
      let minutes = Math.floor(timestamps / 60 - hours / 60);
      let seconds = timestamps % 60;
      return hours + ":" + minutes + ":" + seconds + " s";
    },
  },
};
</script>

