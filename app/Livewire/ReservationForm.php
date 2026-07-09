<?php

namespace App\Livewire;

use App\Models\Lead;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ReservationForm extends Component
{
    public string $lang = 'bm';

    public string $name = '';
    public string $phone = '';
    public string $branch = '';
    public ?string $reserve_date = null;
    public ?int $pax = null;
    public string $message = '';

    public function mount(string $lang = 'bm'): void
    {
        $this->lang = $lang === 'en' ? 'en' : 'bm';
    }

    protected function branches()
    {
        return collect(require resource_path('content/branches.php'));
    }

    public function submit()
    {
        $branchKeys = $this->branches()->pluck('key')->all();

        $validated = $this->validate([
            'name'         => 'required|string|max:100',
            'phone'        => 'required|string|max:30',
            'branch'       => ['required', Rule::in($branchKeys)],
            'reserve_date' => 'nullable|date|after_or_equal:today',
            'pax'          => 'nullable|integer|min:1|max:300',
            'message'      => 'nullable|string|max:500',
        ]);

        Lead::create($validated + ['source' => 'reservation_form']);

        // Open the chosen branch's WhatsApp with a pre-filled message.
        $branch  = $this->branches()->firstWhere('key', $this->branch);
        $number  = Str::afterLast($branch['wa'], '/');           // wasap.my/60142288956 -> 60142288956
        $city    = $branch['city'] . ($branch['area'] ? ' (' . $branch['area'] . ')' : '');

        $lines = ["Assalamualaikum Sofwah {$city}, saya {$this->name} ingin membuat tempahan / pertanyaan."];
        if ($this->reserve_date) $lines[] = "Tarikh: {$this->reserve_date}";
        if ($this->pax)          $lines[] = "Bilangan: {$this->pax} orang";
        if ($this->message)      $lines[] = "Nota: {$this->message}";
        $lines[] = "No. saya: {$this->phone}";

        $url = 'https://wa.me/' . $number . '?text=' . rawurlencode(implode("\n", $lines));

        return redirect()->away($url);
    }

    public function render()
    {
        $content = require resource_path("content/{$this->lang}.php");

        return view('livewire.reservation-form', [
            'branches' => $this->branches(),
            't'        => $content['reserve'],
        ]);
    }
}
