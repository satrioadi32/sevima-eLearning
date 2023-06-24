<div>
    <!DOCTYPE html>
<html>
<head>
    <title>OpenAI Interface</title>
    <!-- Tambahkan link stylesheet atau inline styles sesuai kebutuhan -->
    @livewireStyles
</head>
<body>
    <div>
        <h1>OpenAI Interface</h1>
        <div>
            <label for="prompt">Prompt:</label>
            <textarea id="prompt" rows="4" cols="50" wire:model="prompt"></textarea>
        </div>
        <div>
            <button wire:click="generateCompletion">Generate Completion</button>
        </div>
        <div>
            <h2>Output:</h2>
            <div>{!! $output !!}</div>
        </div>
    </div>

    @livewireScripts
</body>
</html>
</div>
