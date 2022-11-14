<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div
        class="bg-gren-500 text-green-500 p-3"
        v-if="$page.props.flash.success"
      >
        {{ $page.props.flash.success }}
      </div>
      <div class="w-full">
        <form
          @submit.prevent="submit"
          class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        >
          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="title"
            >
              Tittre de la formation
            </label>
            <input
              class="
                shadow
                appearance-none
                border
                rounded
                w-full
                py-2
                px-3
                text-gray-700
                leading-tight
                focus:outline-none focus:shadow-outline
              "
              id="title"
              type="text"
              v-model="form.title"
            />

            <div
              class="bg-red-200 text-red-800 mt-2 p-4"
              v-if="$page.props.errors.title"
            >
              {{ $page.props.errors.title }}
            </div>
          </div>

          <div class="mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="description"
            >
              Description de la formation
            </label>
            <textarea
              class="
                shadow
                appearance-none
                border
                rounded
                w-full
                py-2
                px-3
                text-gray-700
                leading-tight
                focus:outline-none focus:shadow-outline
              "
              id="description"
              type="text"
              v-model="form.description"
            >
            </textarea>
            <div
              class="bg-red-200 text-red-800 mt-2 p-4"
              v-if="$page.props.errors.description"
            >
              {{ $page.props.errors.description }}
            </div>
          </div>

          <div class="mb-4">
            <h2 class="text-2xl">Episodes de la formation</h2>
            <div
              class=""
              v-for="(episode, index) in form.episodes"
              v-bind:key="index"
            >
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                :for="'title-' + index"
              >
                Titre de l'épisode de n° {{ index + 1 }}
              </label>
              <input
                class="
                  shadow
                  appearance-none
                  border
                  rounded
                  w-full
                  py-2
                  px-3
                  text-gray-700
                  leading-tight
                  focus:outline-none focus:shadow-outline
                "
                :id="'title-' + index"
                type="text"
                v-model="form.episodes[index].title"/>

              <!-- label de la description -->
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                :for="'description-' + index"
              >
                Description de l'épisode de n° {{ index + 1 }}
              </label>
              <input
                class="
                  shadow
                  appearance-none
                  border
                  rounded
                  w-full
                  py-2
                  px-3
                  text-gray-700
                  leading-tight
                  focus:outline-none focus:shadow-outline
                "
                :id="'description-' + index"
                type="text"
                v-model="form.episodes[index].description"
              />

              <!-- LAbel de l'url de la vidéo -->
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                :for="'video_url-' + index"
              >
                L'URL de la vidéo de l'épisode de n° {{ index + 1 }}
              </label>
              <input
                class="
                  shadow
                  appearance-none
                  border
                  rounded
                  w-full
                  py-2
                  px-3
                  text-gray-700
                  leading-tight
                  focus:outline-none focus:shadow-outline
                "
                :id="'video_url-' + index"
                type="text"
                v-model="form.episodes[index].video_url"
              />
            </div>
          </div>
          <div class="flex justify-between">
            <button
              class="bg-green-600 rounded py-2 px-4 text-white block mb-2"
              v-if="form.episodes.length < 15"
              @click.prevent="add"
            >
              +
            </button>

            <button
              class="bg-red-600 rounded py-2 px-3 text-white block mb-2"
              v-if="form.episodes.length > 1"
              @click.prevent="remove"
            >
              🗑️
            </button>
          </div>

          <button
            class="
              bg-blue-500
              hover:bg-blue-700
              text-white
              font-bold
              py-2
              px-4
              rounded
              focus:outline-none focus:shadow-outline
            "
            type="submit"
          >
            Créer une formation
          </button>
        </form>
      </div>
    </div>
  </AppLayout>
</template>

<script >
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { useSwalSuccess } from "@/Composables/alert";

export default {
  components: {
    AppLayout,
  },

  data() {
    return {
      sucess: false,
      erros: false,
      form: {
        title: null,
        description: null,
        episodes: [{ title: null, description: null, video_url: null }],
      },
    };
  },
  methods: {
    submit() {
      Inertia.post("/courses", this.form);

      useSwalSuccess("Episode termié avec succèes, bay ♥️♥️♥️");
    },

    add() {
      this.form.episodes.push({
        title: null,
        description: null,
        video_url: null,
      });
    },
    remove() {
      this.form.episodes.pop();
    },
  },
};
</script>

