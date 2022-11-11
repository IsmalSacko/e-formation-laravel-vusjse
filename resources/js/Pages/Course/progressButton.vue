<template>
    <div>
        <button class="bg-green-500 px-2 py-2 rounded-xl text-white" @click="toggleProgress()">
            {{ this.isWatched ? 'Terminé' : 'Terminé ?' }}
        </button>
    </div>
</template>

<script>
import eventBus from 'vue3-eventbus';
import { useSwalSuccess } from '@/Composables/alert'

export default {
    props: ['episodeId', 'watchedEpisodes'],
    data() {
        return {
            watchedEp: this.watchedEpisodes,
            isWatched: null
        }
    },
    methods: {
        toggleProgress() {
            axios.post('/toggleProgress', {
                episodeId: this.episodeId,

            })
                .then(response => {

                    if (response.status === 200) {
                        this.isWatched ? useSwalSuccess('Vous êtes de retour cet épisode 🔙') : useSwalSuccess('Episode termié avec succèes, bay ♥️♥️♥️')
                        this.isWatched = !this.isWatched;
                        eventBus.emit('toggleProgress', response.data);

                    }
                })
                .catch(error => console.log(error));
        },
        isWatchedEpisode() {
            return this.watchedEp.find(episode => episode.id === this.episodeId) ? true : false;
        }
    },
    mounted() {
        this.isWatched = this.isWatchedEpisode();
    }
}
</script>