var prompt = "This is a test prompt.";

$.ajax({
    url: '/openai',
    type: 'POST',
    dataType: 'json',
    data: { prompt: prompt },
    success: function(response) {
        console.log(response);
        // Lakukan sesuatu dengan respon yang diterima dari API OpenAI
    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});
