<div>
    @include('includes.home.style')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container max-w-5xl mx-auto mb-8">
                    <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-grey-800">
                        Apakah ada yang bisa dibantu?
                    </h2>
                    <div class="flex justify-center items-center">
                        <input placeholder="Masukkan Teks Disini" id="prompt" class="mr-2 px-4 py-6 shadow" wire:model="prompt" style="width: 100vh; height:50px; font-size:18px;">
                        <button class="hover:bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out" wire:click="generateCompletion()">
                            <svg class="w-6 h-6 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </div>
                    <div>
                        <h2>Output:</h2>
                        <div id="output" class="typing-output">{{ $output }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const outputElement = document.getElementById('output');
        const outputText = {!! json_encode($output) !!};
        let currentIndex = 0;

        function typeWriter(){
            if (currentIndex < outputText.length) {
                outputElement.innerHTML += outputText.charAt(currentIndex);
                currentIndex++;
                setTimeout(typeWriter, 50);
            }
        }
        typeWriter();
    </script>
@endpush