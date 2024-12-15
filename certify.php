<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certifications</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    padding: 10px;
    text-align: center;
}

nav {
    background: linear-gradient(to right, #77bcb7, #278aab);
    padding: 10px;
    text-align: center;
}

nav a {
    color: white;
    text-decoration: none;
    margin: 0 20px;
}

nav a:hover {
    text-decoration: underline;
}

.container {
    margin: 20px;
}

.certification-list {
    display: flex;
    flex-wrap: wrap;
}

.certification-item {
    background-color: white;
    padding: 20px;
    margin: 10px;
    width: 300px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.certification-item h3 {
    margin: 0;
    font-size: 1.5rem;
}

.certification-item p {
    font-size: 1rem;
}

.certification-item button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 1rem;
}

.certification-item button:hover {
    background-color: #45a049;
}

footer {
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>

    <header>
        <h1>Available Certifications</h1>
    </header>

    <nav>
        <a href="dashboard.php">Dashboard</a>
    </nav>

    <div class="container">
        <h2>Tech Certifications</h2>
        <div class="certification-list" id="tech-certifications">
            <!-- Tech certifications will be loaded here -->
        </div>

        <h2>Non-Tech Certifications</h2>
        <div class="certification-list" id="non-tech-certifications">
            <!-- Non-Tech certifications will be loaded here -->
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Certification Platform</p>
    </footer>

    <script src="script.js">
        window.onload = function() {
    loadCertifications();
};

function loadCertifications() {
    fetch('load_certifications.php')
        .then(response => response.json())
        .then(data => {
            let techList = document.getElementById('tech-certifications');
            let nonTechList = document.getElementById('non-tech-certifications');

            data.tech.forEach(cert => {
                techList.innerHTML += `
                    <div class="certification-item">
                        <h3>${cert.title}</h3>
                        <p>${cert.description}</p>
                        <button onclick="startCertification(${cert.id})">Start</button>
                    </div>
                `;
            });

            data.nonTech.forEach(cert => {
                nonTechList.innerHTML += `
                    <div class="certification-item">
                        <h3>${cert.title}</h3>
                        <p>${cert.description}</p>
                        <button onclick="startCertification(${cert.id})">Start</button>
                    </div>
                `;
            });
        });
}

function startCertification(certId) {
    const studentId = 1;  // Assuming the student is logged in and their ID is 1

    fetch('start_certification.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ student_id: studentId, certification_id: certId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Certification started successfully!");
        } else {
            alert("Failed to start certification.");
        }
    });
}

    </script>
</body>
</html>
