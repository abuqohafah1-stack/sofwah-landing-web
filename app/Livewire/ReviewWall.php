<?php

namespace App\Livewire;

use Livewire\Component;

class ReviewWall extends Component
{
    public string $lang = 'bm';
    public string $branch = 'all';
    public int $minRating = 0;

    public function mount(string $lang = 'bm'): void
    {
        $this->lang = $lang === 'en' ? 'en' : 'bm';
    }

    public function render()
    {
        // Source: sample set now; swap for cached Google reviews (DB) when sync is enabled.
        $reviews = collect(require resource_path('content/reviews.php'))
            ->when($this->branch !== 'all', fn ($c) => $c->where('branch', $this->branch))
            ->when($this->minRating > 0, fn ($c) => $c->where('rating', '>=', $this->minRating))
            ->values();

        return view('livewire.review-wall', [
            'reviews'  => $reviews,
            'branches' => require resource_path('content/branches.php'),
        ]);
    }
}
