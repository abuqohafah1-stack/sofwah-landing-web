<div class="mx-auto max-w-xl">
    <form wire:submit="submit" class="space-y-4">
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="rf-name" class="mb-1.5 block text-sm text-ink-2">{{ $t['name'] }}</label>
                <input id="rf-name" type="text" wire:model="name" autocomplete="name"
                       class="w-full rounded-xl2 border border-white/10 bg-bg px-4 py-3 text-ink placeholder-ink-3 focus:border-accent focus:outline-none">
                @error('name') <p class="mt-1 text-xs text-accent">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="rf-phone" class="mb-1.5 block text-sm text-ink-2">{{ $t['phone'] }}</label>
                <input id="rf-phone" type="tel" wire:model="phone" autocomplete="tel" placeholder="012-345 6789"
                       class="w-full rounded-xl2 border border-white/10 bg-bg px-4 py-3 text-ink placeholder-ink-3 focus:border-accent focus:outline-none">
                @error('phone') <p class="mt-1 text-xs text-accent">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="rf-branch" class="mb-1.5 block text-sm text-ink-2">{{ $t['branch'] }}</label>
            <select id="rf-branch" wire:model="branch"
                    class="w-full rounded-xl2 border border-white/10 bg-bg px-4 py-3 text-ink focus:border-accent focus:outline-none">
                <option value="">{{ $t['choose_branch'] }}</option>
                @foreach ($branches as $b)
                    <option value="{{ $b['key'] }}">Sofwah {{ $b['city'] }}@if ($b['area']) — {{ $b['area'] }}@endif</option>
                @endforeach
            </select>
            @error('branch') <p class="mt-1 text-xs text-accent">{{ $message }}</p> @enderror
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="rf-date" class="mb-1.5 block text-sm text-ink-2">{{ $t['date'] }}</label>
                <input id="rf-date" type="date" wire:model="reserve_date"
                       class="w-full rounded-xl2 border border-white/10 bg-bg px-4 py-3 text-ink focus:border-accent focus:outline-none">
                @error('reserve_date') <p class="mt-1 text-xs text-accent">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="rf-pax" class="mb-1.5 block text-sm text-ink-2">{{ $t['pax'] }}</label>
                <input id="rf-pax" type="number" min="1" wire:model="pax"
                       class="w-full rounded-xl2 border border-white/10 bg-bg px-4 py-3 text-ink placeholder-ink-3 focus:border-accent focus:outline-none">
                @error('pax') <p class="mt-1 text-xs text-accent">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="rf-message" class="mb-1.5 block text-sm text-ink-2">{{ $t['message'] }}</label>
            <textarea id="rf-message" wire:model="message" rows="3"
                      class="w-full rounded-xl2 border border-white/10 bg-bg px-4 py-3 text-ink placeholder-ink-3 focus:border-accent focus:outline-none"></textarea>
            @error('message') <p class="mt-1 text-xs text-accent">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl2 bg-brand px-6 py-4 font-semibold text-white transition hover:brightness-110 hover:shadow-glow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
            <span wire:loading.remove wire:target="submit">{{ $t['submit'] }}</span>
            <span wire:loading wire:target="submit">{{ $t['sending'] }}</span>
        </button>
        <p class="text-center text-xs text-ink-3">{{ $t['privacy'] }}</p>
    </form>
</div>
