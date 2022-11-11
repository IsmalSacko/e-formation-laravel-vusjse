<template>
  <app-layout>
    <template v-slot:header>
      {{ course.title }}
    </template>

    <div class="py-4 mx-8">
      <div class="text-2xl text-center"> {{ courseShow.episodes[this.curentKey].title }}</div>
      <iframe class="w-full h-screen" :src="courseShow.episodes[this.curentKey].video_url"
        title="Mise place d'un petit back-office avec #symfuhny  #easyadmin" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>

      </iframe>
      <div class="text-sm text-gray-500">{{ courseShow.episodes[this.curentKey].description }}</div>
      <div class="py-6">
        <!--Import of progress bar form progress bar component-->
        <progress-bar :watched-episodes="watched" :episodes="course.episodes" />
      </div>
      <div class="mt-6">
        <ul v-for="(episode, index) in this.course.episodes" v-bind:key="episode.id">
          <li class="mt-3 flex justify-between items-center">
            <div>
              <strong>Episode N° {{ index + 1 }}</strong> - {{ episode.title }}
              <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Voir
                l'épisode
              </button>
            </div>
            <!--Import of progress button form progress button component-->
            <progress-button :episode-id="episode.id" :watched-episodes="watched" />
          </li>


        </ul>
      </div>
    </div>
  </app-layout>
</template>

<script>

import AppLayout from "@/Layouts/AppLayout.vue";
import progressButton from './progressButton.vue'
import progressBar from "./progressBar.vue";

export default {
  components: {
    AppLayout,
    progressButton,
    progressBar
  },
  props: ['course', 'watched'],

  data() {
    return { courseShow: this.course, curentKey: 0 }
  },

  methods: {
    switchEpisode(index) {
      this.curentKey = index;
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
      })
    }
  }
}
</script>

