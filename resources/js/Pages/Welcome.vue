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
    <div v-if="canLogin" class="fixed top-0 right-0 px-6 py-4 sm:block">
      <Link
        v-if="$page.props.user"
        :href="route('dashboard')"
        class="text-sm text-gray-700 dark:text-gray-500 underline"
        >Dashboard</Link
      >

      <template v-else>
        <div class="fixed top-0 right-0 px-1 py-4 sm:block flex">
          <Link :href="route('login')" class="text-white p-3 bg-gray-600 rounded-full"
          >Se connecter
          </Link>
          <Link
              v-if="canRegister"
              :href="route('register')"
              class="text-white p-3 bg-gray-600 rounded-full ml-2"
          >S'inscrire
          </Link>
        </div>



      </template>
    </div>

    <div class="imaga_accueil">
      <img class=" w-full" src="storage/video/Développemntweb.gif" />

    </div>
  </div>
</template>
<style>


@media screen and (max-width: 480px) {
  .imaga_accueil{
    margin-top: 50%;
  }



}



</style>