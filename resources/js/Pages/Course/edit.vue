<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modification de {{ courseData.title }}
                <div class="bg-gren-500 text-green-500 p-3" v-if="$page.props.flash.success">
                    {{ $page.props.flash.success }}

                </div>
            </h2>
        </template>

        <div class="py-12">

            <div class="w-full">
                <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Tittre de la formation
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="title" type="text" v-model="courseData.title">

                        <div class="bg-red-200 text-red-800 mt-2 p-4" v-if="$page.props.errors.title">
                            {{ $page.props.errors.title }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Description de la formation
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="description" type="text" v-model="courseData.description">

                        </textarea>
                        <div class="bg-red-200 text-red-800 mt-2 p-4" v-if="$page.props.errors.description">
                            {{ $page.props.errors.description }}
                        </div>

                    </div>

                    <div class="mb-4">
                        <h2 class="text-2xl">Episodes de la formation</h2>
                        <div class="" v-for="(episode, index) in courseData.episodes" v-bind:key="index">

                            <label class="block text-gray-700 text-sm font-bold mb-2" :for="'title-' + index">
                                Titre de l'épisode de n° {{ index + 1 }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                :id="'title-' + index" type="text" v-model="courseData.episodes[index].title">

                            <!-- label de la description -->
                            <label class="block text-gray-700 text-sm font-bold mb-2" :for="'description-' + index">
                                Description de l'épisode de n° {{ index + 1 }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                :id="'description-' + index" type="text"
                                v-model="courseData.episodes[index].description">

                            <!-- LAbel de l'url de la vidéo -->
                            <label class="block text-gray-700 text-sm font-bold mb-2" :for="'video_url-' + index">
                                L'URL de la vidéo de l'épisode de n° {{ index + 1 }}
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                :id="'video_url-' + index" type="text" v-model="courseData.episodes[index].video_url">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-600 rounded py-2 px-4 text-white block mb-2"
                            v-if="courseData.episodes.length < 15" @click.prevent="add">+
                        </button>

                        <button class="bg-red-600 rounded py-2 px-3 text-white block mb-2"
                            v-if="courseData.episodes.length > 1" @click.prevent="remove">🗑️
                        </button>
                    </div>

                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline"
                        type="submit" @click="success">
                        Modifier formation
                    </button>

                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script >
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { useSwalSuccess } from '@/Composables/alert'


export default {

    components: {
        AppLayout
    },

    props: ['course'],


    data() {
        return {
            courseData: this.course
        }
    },
    methods: {
        submit() {
            Inertia.patch('/course/update/' + this.courseData.id, this.courseData)

        },

        add() {
            this.courseData.episodes.push({ title: null, description: null, video_url: null })

        },
        remove() {
            this.courseData.episodes.pop()
        },
        success() {

            useSwalSuccess('Episode termié avec succèes, bay ♥️♥️♥️')
        }

    }
}

</script>

