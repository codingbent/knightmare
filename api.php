<script>
 const apiKey = '4sJUOF8aD1ZbzuO_GQe-vku5v7X7pxc9hfh28C0aUaW0N02I1f41lIEectKSUWrH0JX85rYLBe8He0HZwSESxg%3D%3D'; // Replace with your actual API key
const apiUrl = 'https://sapling.ai/static/js/sapling-sdk-v1.0.6.min.js'; // Replace with your API endpoint URL

fetch(apiUrl, {
    headers: {
        'Authorization': `Bearer ${apiKey}`,
        'Content-Type': 'application/json'
    }
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
})
.then(data => {
    console.log(data); 
})
.catch(error => {
    console.error('There was a problem with the fetch operation:', error);
});
</script>