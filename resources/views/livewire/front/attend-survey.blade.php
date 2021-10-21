<div>
    @if(!$started)
        {{ $survey->title }}
        <button type="submit" wire:click="start()">{{ __('Start Now') }}</button>
    @endif

    @if($started)
        <p>{{ $currentQuestion->text }}</p>

        @if($currentQuestion->type == 'multiple-choices')

        @endif

        @if($currentQuestion->type == 'phone')
            <input type="text" wire:model="responses.{{ $currentQuestion->id }}">
        @endif

        @if($currentQuestion->type == 'email')
            <input type="email" wire:model="responses.{{ $currentQuestion->id }}">
        @endif

        @if($currentQuestion->type == 'short-text')
            <input type="email" wire:model="responses.{{ $currentQuestion->id }}">
        @endif

        @if($currentQuestion->type == 'long-text')
            <textarea wire:model="responses.{{ $currentQuestion->id }}" rows="3"></textarea>
        @endif

        @if($currentQuestion->type == 'yes-no')
            @foreach($currentQuestion->attributes['choices'] as $choice)
                {{ $choice }}<input type="radio" value="{{ $choice }}" wire:model="responses.{{ $currentQuestion->id }}" name="group-{{ $currentQuestion->id }}">
            @endforeach
        @endif

        @if($currentQuestion->type == 'rating')
            @foreach($currentQuestion->attributes['choices'] as $choice)
                {{ $choice }} <input type="radio" value="{{ $choice }}" wire:model="responses.{{ $currentQuestion->id }}" name="group-{{ $currentQuestion->id }}">
            @endforeach
        @endif

        @if($currentQuestion->type == 'date')
            <input type="email" wire:model="responses.{{ $currentQuestion->id }}">
        @endif

        @if($currentQuestion->type == 'number')
            <input type="number" wire:model="responses.{{ $currentQuestion->id }}">
        @endif

        @if($currentQuestion->type == 'dropdown')
            <select wire:model="responses.{{ $currentQuestion->id }}">
                @foreach($currentQuestion->attributes['choices'] as $choice)
                    <option value="{{ $choice }}">{{ $choice }}</option>
                @endforeach
            </select>
        @endif

        <button type="submit" wire:click="next()">{{ __('Next') }}</button>
    @endif
</div>
