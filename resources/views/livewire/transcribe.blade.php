<div>
    @include('includes.home.style')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container max-w-5xl mx-auto mb-8">
                    <h3 class="w-full my-2 text-3xl font-bold text-grey-800 leading-tight text-center">
                        Transkrip Audio ke Teks
                    </h3>
                    <form wire:submit.prevent="transcribe" enctype="multipart/form-data">
                        <input type="file" wire:model="audio" name="audio" required>
                        @error('audio') <span class="error">{{ $message }}</span> @enderror
                        <button type="submit">Transcribe</button>
                    </form>

                    <div>
                        <h2>Transcription Result:</h2>
                        <p>{{ $transcription }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
