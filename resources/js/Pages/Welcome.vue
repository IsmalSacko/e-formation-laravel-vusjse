<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});
</script>

<template>
  <Head title="Bienvenu sur " />

  <div
    class="
      relative
      flex
      items-top
      justify-center
      min-h-screen
      bg-gray-100
      dark:bg-gray-900
      sm:items-center sm:pt-0
    "
  >
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      <Link
        v-if="$page.props.user"
        :href="route('dashboar')"
        class="text-sm text-gray-700 dark:text-gray-500 underline"
        >Dashboard</Link
      >

      <template v-else>
        <div class="flex">
          <div class="bg-gray-600 rounded mr-1">
            <Link :href="route('login')" class="text-white p-3"
              >Se connecter
            </Link>
          </div>

          <div class="bg-gray-600 rounded ml-1">
            <Link
              v-if="canRegister"
              :href="route('register')"
              class="text-white p-3"
              >S'inscrire
            </Link>
          </div>
        </div>
      </template>
    </div>

    <div class="">
      <!-- <div>
        <iframe
          width="560"
          height="315"
          src="https://www.youtube.com/embed/FX4fTdR1-CA?&autoplay=1&mute=1"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        >
        </iframe>
      </div> -->
      <img class="w-full" src="storage/video/Développemntweb.gif" />
    </div>
  </div>
</template>
