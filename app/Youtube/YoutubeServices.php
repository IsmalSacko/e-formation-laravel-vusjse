<?php

namespace App\Youtube;

use DateInterval;
use Illuminate\Support\Facades\Http;

class YoutubeServices
{

    private $key =  null;
    //"AIzaSyA6jdX3j943cIc_-4NoQecePd25nPxOtKU";

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function handleYoutubevideoDuration(string $video_url): int
    {


        //Récupère l'id de la vidéo à partir de l'url
        preg_match('/embed\/(.+)/', $video_url, $matches);
        $id = $matches[1];
        //appel à la l'api de youtube pour recuprer la durée
        $respose = Http::get("https://www.googleapis.com/youtube/v3/videos?key={$this->key}&id={$id}&part=contentDetails");
        $duration = (json_decode($respose))->items[0]->contentDetails->duration;

        $interval = new DateInterval($duration);

        return $interval->s + $interval->i * 60 + $interval->h * 3600;

        //convertir tout ça en secode pour l'envoir en bdd
    }
}
