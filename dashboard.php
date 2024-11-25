<!DOCTYPE html>
<html>
<head>
    <title>Study Dashboard</title>

</head>
<body>
    <div class="form-container">
        <h2>Welcome to Your Study Dashboard</h2>
        <form id="user-form">
            <label for="year">Year of Study:</label>
            <select id="year">
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
                <option value="3">3rd Year</option>
                <option value="4">4th Year</option>
            </select>

            <label for="degree">Degree:</label>
            <select id="degree">
                <option value="btech">B.Tech</option>
                <option value="bca">B.C.A</option>
            </select>

            <label for="branch">Branch:</label>
            <input type="text" id="branch" placeholder="Enter your branch">

            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="dashboard-container" style="display: none;">
        <h2>Your Personalized Study Dashboard</h2>
        <div class="dashboard-content">
            <h3>Resources</h3>
            <ul id="resource-list"></ul>

            <h3>Guidance Path</h3>
            <ul id="guidance-path"></ul>

            <div class="progress-bar-container">
                <div class="progress-bar" style="width: 60%">
                    <p>Course Progress: 60%</p>
                </div>
            </div>

            <div class="calendar-container">
                <iframe src="https://calendar.google.com/calendar/embed?src=YOUR_CALENDAR_ID&ctz=YOUR_TIMEZONE" style="border: 0" width="800" height="600"></iframe>
            </div>

            <div class="assignment-container">
                <h4>Assignments</h4>
                <ul id="assignment-list">
                    </ul>
            </div>
        </div>
    </div>

    <script>
        // ... (Existing code)

// Additional features implementation

// Update progress bar
const progressBar = document.querySelector('.progress-bar');
const progressPercentage = 60; // Example value
progressBar.style.width = progressPercentage + '%';

// Populate assignments list
const assignmentList = document.getElementById('assignment-list');
const assignments = [
    { title: 'Assignment 1', dueDate: '2023-12-15', status: 'In Progress' },
    { title: 'Assignment 2', dueDate: '2023-12-20', status: 'Completed' },
    // ... (More assignments)
];

assignmentList.innerHTML = assignments.map(assignment => `
    <li>
        <p>${assignment.title}</p>
        <p>Due Date: ${assignment.dueDate}</p>
        <p>Status: ${assignment.status}</p>
    </li>
`).join('');
    </script>
</body>
</html>

<style>
    /* Style the form, dashboard, and additional features */
/* ... (Mimic the provided image's style, adding styles for new features) */

.progress-bar-container {
    background-color: #f2f2f2;
    padding: 10px;
    border-radius: 5px;
}

.progress-bar {
    background-color: #04AA6D;
    height: 20px;
    width: 0%; /* Dynamically updated */
    border-radius: 5px;
}

.calendar-container {
    margin-top: 20px;
}

.assignment-container {
    margin-top: 20px;
}
</style>