<div>
   <div class="relative  mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Paribesh Chat') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage  gpt chat') }}</flux:subheading>
    <flux:separator variant="subtle" />
   </div>


   <div>
        <ul>
            @foreach($history as $item)
            <li class="p-2">
                <div class="text-blue-500">
                    {{ auth()->user()->name }}
                </div>
                <p class="text-gray-600">{{$item['question']}}</p>
            </li>
            <li>
                <div class="text-gray-500">YOUR Assitant:</div>
                <p class="text-gray-600">{{$item['answer']}}</p>
            </li>
            @endforeach
        </ul>
   </div>
    <div>
        <form wire:submit.prevent="submit">
            <flux:textarea
                label="prompt" wire:model="notes"
            />
            <flux:button  variant="primary" class="mt-2" type="submit">Submit</flux:button>
        </form>
    </div>
</div>
