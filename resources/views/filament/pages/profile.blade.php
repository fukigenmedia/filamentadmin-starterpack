<x-filament::page>
    <form wire:submit.prevent="submit" class="space-y-6">
        {{ $this->form }}

        <div class="flex flex-wrap items-center gap-4 justify-start">
            <x-filament::button type="submit">
                {{ __('fukigen.profile.button.save') }}
            </x-filament::button>

            <x-filament::button type="button" color="secondary" tag="a" :href="$this->cancel_button_url">
                {{ __('fukigen.profile.button.cancel') }}
            </x-filament::button>
        </div>
    </form>
</x-filament::page>