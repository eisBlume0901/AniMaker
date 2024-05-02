<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = "";

    public function render(): View
    {
        $searchResults = [];

        if (strlen($this->search) >= 1) {
            $searchResults = User::where('name', 'like', '%' . $this->search . '%')->get();
        }

        return view('livewire.search-users',
        [
            'userResults' => $searchResults
        ]);
    }
}
