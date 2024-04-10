<?php

namespace App\Livewire;

use App\Models\Anime;
use Illuminate\View\View;
use Livewire\Component;

class Search extends Component
{
    public $search = ""; // This is the search query that the user will input


    public function render(): View {

        $searchResults = [];

        if (strlen($this->search) >= 1) {
            $searchResults = Anime::where('title', 'like',   $this->search . '%')->limit(5)->get();
        }
        return view('livewire.search',
            [
                'animeResults' => $searchResults
            ]
        );
    }

}
