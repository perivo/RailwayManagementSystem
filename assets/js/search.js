// Search.js - Handles train search functionality

// Example: Search for trains based on origin, destination, and date
function searchTrains() {
    const origin = document.getElementById('origin').value;
    const destination = document.getElementById('destination').value;
    const date = document.getElementById('date').value;

    // Simple validation
    if (!origin || !destination || !date) {
        alert('Please enter all required fields');
        return;
    }

    // Perform search logic
    fetch(`search_trains.php?origin=${origin}&destination=${destination}&date=${date}`)
        .then(response => response.json())
        .then(data => {
            const resultsDiv = document.getElementById('search-results');
            resultsDiv.innerHTML = ''; // Clear previous results

            if (data.length > 0) {
                data.forEach(train => {
                    const trainElement = document.createElement('div');
                    trainElement.innerHTML = `<h4>${train.name} - ${train.number}</h4>
                                              <p>Departure: ${train.departure_time}</p>
                                              <p>Arrival: ${train.arrival_time}</p>`;
                    resultsDiv.appendChild(trainElement);
                });
            } else {
                resultsDiv.innerHTML = '<p>No trains found for the selected route and date.</p>';
            }
        })
        .catch(error => console.error('Error fetching train data:', error));
}
