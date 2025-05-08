<div>
    <div class="m-2">
            <input type="radio" value="360" wire:model.live="radioValue">
            <label for="">360p</label><br>
            <input type="radio" value="480" wire:model.live="radioValue">
            <label for="">480p</label><br>
            <input type="radio" value="720" wire:model.live="radioValue">
            <label for="">720p</label><br>
            <input type="radio" value="1080" wire:model.live="radioValue">
            <label for="">1080p</label><br>
    </div>
    <p>The quality is: {{ $radioValue }}</p>
</div>
