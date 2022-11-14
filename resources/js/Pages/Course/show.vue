<template>
  <app-layout>
    <template v-slot:header>
      {{ course.title }}
    </template>

    <div class="py-4 mx-8">
      <div class="text-2xl text-center">
        {{ courseShow.episodes[this.curentKey].title }}
      </div>
      <iframe
        class="w-full h-screen"
        :src="courseShow.episodes[this.curentKey].video_url"
        title="Mise place d'un petit back-office avec #symfuhny  #easyadmin"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      >
      </iframe>
      <div class="text-sm text-gray-500">
        {{ courseShow.episodes[this.curentKey].description }}
      </div>
      <div class="py-6">
        <!--Import of progress bar form progress bar component-->
        <progress-bar :watched-episodes="watched" :episodes="course.episodes" />
      </div>
      <div class="mt-6">
        <ul
          v-for="(episode, index) in this.course.episodes"
          v-bind:key="episode.id"
        >
          <li class="mt-3 flex justify-between items-center">
            <div>
              <strong>Episode N° {{ index + 1 }}</strong> - {{ episode.title }}
              <button
                class="text-gray-500 focus:text-indigo-500 focus:outline-none"
                @click="switchEpisode(index)"
              >
                Voir l'épisode
              </button>
            </div>
            <!--Import of progress button form progress button component-->
            <progress-button
              :episode-id="episode.id"
              :watched-episodes="watched"
            />
          </li>
        </ul>
        <div class="bg-red-700 w-12 rounded-xl">
          <a :href="'/courses'" class="text-center text-white">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              class="w-11 h-9"
            >
              <g clip-path="url(#clip0_9_2121)">
                <path
                  fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.25-7.25a.75.75 0 000-1.5H8.66l2.1-1.95a.75.75 0 10-1.02-1.1l-3.5 3.25a.75.75 0 000 1.1l3.5 3.25a.75.75 0 001.02-1.1l-2.1-1.95h4.59z"
                  clip-rule="evenodd"
                />
              </g>
              <defs>
                <clipPath id="clip0_9_2121">
                  <path d="M0 0h20v20H0z" />
                </clipPath>
              </defs>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import progressButton from "./progressButton.vue";
import progressBar from "./progressBar.vue";

export default {
  components: {
    AppLayout,
    progressButton,
    progressBar,
  },
  props: ["course", "watched"],

  data() {
    return { courseShow: this.course, curentKey: 0 };
  },

  methods: {
    switchEpisode(index) {
      this.curentKey = index;
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth",
      });
    },
  },
};
</script>

