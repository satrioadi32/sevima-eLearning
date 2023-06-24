<div>
    <form wire:submit.prevent="transcribe" enctype="multipart/form-data">
        <input type="file" wire:model="audio" accept="audio/*" required>
        @error('audio') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Transcribe</button>
    </form>

    <div>
        <h2>Transcription Result:</h2>
        <p>{{ $transcription }}</p>
    </div>
</div>
