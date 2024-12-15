<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
$user_id = $_SESSION['user_id'];

// Fetch user profile details
$sql = "SELECT first_name, last_name, email, phone, school_or_college, year_or_class, course_summary, interests FROM userinfo WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "Error fetching user data.";
    exit();
}
// Fetch certifications from the database
$cert_sql = "SELECT * FROM certifications WHERE user_id = ?";
$cert_stmt = mysqli_prepare($conn, $cert_sql);
mysqli_stmt_bind_param($cert_stmt, "i", $user_id);
mysqli_stmt_execute($cert_stmt);
$cert_result = mysqli_stmt_get_result($cert_stmt);

$certifications = [];
while ($cert = mysqli_fetch_assoc($cert_result)) {
    $certifications[] = $cert;
}

mysqli_stmt_close($stmt);
mysqli_stmt_close($cert_stmt);


?>
<?php
// Fetch resources grouped by type
$resources_sql = "SELECT course_name, resource_type, resource_link FROM resources WHERE interest LIKE ?";
$resources_stmt = mysqli_prepare($conn, $resources_sql);
$search_interest = "%" . $user['interests'] . "%";
mysqli_stmt_bind_param($resources_stmt, "s", $search_interest);
mysqli_stmt_execute($resources_stmt);
$resources_result = mysqli_stmt_get_result($resources_stmt);

$resources = [];
while ($res = mysqli_fetch_assoc($resources_result)) {
    $resources[$res['resource_type']][] = $res;
}
mysqli_stmt_close($resources_stmt);

// Fetch projects grouped by difficulty
$projects_sql = "SELECT project_difficulty, project_idea FROM projects WHERE interest LIKE ?";
$projects_stmt = mysqli_prepare($conn, $projects_sql);
mysqli_stmt_bind_param($projects_stmt, "s", $search_interest);
mysqli_stmt_execute($projects_stmt);
$projects_result = mysqli_stmt_get_result($projects_stmt);

$projects = [];
while ($proj = mysqli_fetch_assoc($projects_result)) {
    $projects[$proj['project_difficulty']][] = $proj;
}
mysqli_stmt_close($projects_stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    display: flex;
}

header.sticky-header {
    position: sticky;
    margin-top: 0;
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    text-align: center;
    padding: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.profile-link {
    text-align: center;
    margin: 10px 0;
}

.profile-link a {
    text-decoration: none;
    color:  #278aab;
    font-weight: bold;
}

.dashboard-container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
/* Certifications Section */
#certifications-section {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

#certifications-section h2 {
    font-size: 1.8em;
    color: #333;
    border-bottom: 2px solid  #278aab;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

#certifications-section form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 30px;
}

#certifications-section label {
    font-size: 1em;
    color: #555;
}

#certification_name, #certification_file {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1em;
    color: #333;
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
}

#certification_name:focus, #certification_file:focus {
    border-color:  #278aab;
    outline: none;
}

#certifications-section button[type="submit"] {
    background:  #278aab;
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 1em;
    border-radius: 5px;
    cursor: pointer;
    align-self: flex-start;
}

#certifications-section button[type="submit"]:hover {
    background: #77bcb7;
}

#certifications-list {
    list-style-type: none;
    padding: 0;
}

#certifications-list li {
    background-color: #fafafa;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#certifications-list li p {
    font-size: 1.1em;
    color: #333;
    margin: 0;
}

#certifications-list li a {
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 0.9em;
    margin-right: 15px;
}

#certifications-list li a:hover {
    background: linear-gradient(to right, #77bcb7, #278aab);
}

#certifications-list form {
    display: inline;
}

#certifications-list form button {
    background-color: #f44336;
    color: white;
    padding: 8px 15px;
    font-size: 0.9em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#certifications-list form button:hover {
    background-color: #e53935;
}


h2 {
    color: #333;
    border-bottom: 2px solid  #278aab;
    padding-bottom: 5px;
}

button {
    background: #278aab;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
}

button:hover {
    background:  #278aab;
}

footer {
    text-align: center;
    padding: 1rem;
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    font-size: 0.9rem;
    margin-top: 2rem;
}

.sidebar {
    width: 200px;
    height: 100vh;
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    padding: 20px;
    position: fixed;
    top: 0;
    left: 0;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar .logo-container {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar .logo img {
    height: 60px;
}

.sidebar .navigation a {
    display: block;
    color: white;
    text-decoration: none;
    font-weight: bold;
    margin: 15px 0;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.sidebar .navigation a:hover {
    background-color: #278aab;
}

.sidebar .logout-button {
    margin-top: 20px;
}

/* Main Content */
.main-content {
    margin-left: 250px; /* Offset content to the right of the sidebar */
    padding: 20px;
    width: 100%;
    #recommendations-section {
    margin-top: 30px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

#recommendations-section h2,
#recommendations-section h3,
#recommendations-section h4 {
    color: #333;
    border-bottom: 2px solid #278aab;
    padding-bottom: 5px;
    margin-bottom: 15px;
}

#resources-section ul,
#projects-section ul {
    list-style-type: none;
    padding: 0;
}

#resources-section li a,
#projects-section li {
    text-decoration: none;
    color: #278aab;
    padding: 10px 5px;
    display: block;
}

#resources-section li a:hover {
    color: #555;
    font-weight: bold;
}



    </style>
    <script>
        // Chart Initialization
document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById("progressChart").getContext("2d");
    const progressChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Semester 1", "Semester 2", "Semester 3", "Semester 4"],
            datasets: [{
                label: "Your Progress",
                data: [70, 80, 85, 90], // Mock data
                borderColor: "#4caf50",
                fill: false,
                tension: 0.1
            }]
        }
    });

    // Load dynamic data for courses and certifications
    document.getElementById("semester-courses").innerHTML = `
        <li>Course 1</li>
        <li>Course 2</li>
        <li>Course 3</li>
    `;

    document.getElementById("certifications-list").innerHTML = `
        <li>Certification 1</li>
        <li>Certification 2</li>
    `;

    document.getElementById("recommendations-list").innerHTML = `
        <li>Recommendation 1</li>
        <li>Recommendation 2</li>
    `;
});

    </script>
</head>
<body>
<aside class="sidebar">
        <div class="logo-container">
            <a href="#" class="logo">
                <img src="final_logo.png" alt="LOGO">
            </a>
        </div>
        <nav class="navigation">
            <a href="profile.php">Profile</a>
            <a href="#course">Courses</a>
            <a href="certify.php">Certifications</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="#contact">Contact</a>
            <a href="logout.php" class="logout-button">Logout</a>
        </nav>
    </aside>
    <main class="main-content">
    <header class="sticky-header">
        <h1>Welcome, <?php echo htmlspecialchars($user['first_name'] . " " . $user['last_name']); ?></h1>
    </header>
    
    <div class="dashboard-container">
        <!-- Profile Section -->
        <section id="profile-section">
            <h2>Your Profile</h2>
            <div id="profile-details">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user['first_name'] . " " . $user['last_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                <p><strong>School/College:</strong> <?php echo htmlspecialchars($user['school_or_college']); ?></p>
                <p><strong>Year/Class:</strong> <?php echo htmlspecialchars($user['year_or_class']); ?></p>
                <p><strong>Course Summary:</strong> <?php echo htmlspecialchars($user['course_summary']); ?></p>
                <p><strong>Interests:</strong> <?php echo htmlspecialchars($user['interests']); ?></p>
            </div>
            <div class="profile-link">
        <a href="profile.php">View/Update Profile</a>
    </div>
        </section>

        <!-- Progress Chart -->
        <section id="progress-section">
            <h2>Your Progress</h2>
            <canvas id="progressChart" width="400" height="200"></canvas>
        </section>

        <!-- Semester-Wise Courses -->
        <section id="courses-section">
            <h2>Semester-Wise Courses</h2>
            <ul id="semester-courses">
                <!-- Dynamic content will be loaded via JS -->
            </ul>
        </section>

       <!-- Certifications Section -->
       <section id="certifications-section">
            <h2>Your Certifications</h2>
         

            <!-- Upload Form -->
            <form action="upload_certification.php" method="post" enctype="multipart/form-data">
                <label for="certification_name">Certification Name:</label>
                <input type="text" name="certification_name" id="certification_name" required>
                <label for="certification_file">Upload Certification File:</label>
                <input type="file" name="certification_file" id="certification_file" required>
                <button type="submit" name="upload_certification">Upload Certification</button>
            </form>

            <!-- Display Certifications -->
            <ul id="certifications-list">
                <?php foreach ($certifications as $cert): ?>
                    <li>
                        <p><?php echo htmlspecialchars($cert['certification_name']); ?></p>
                        <a href="uploads/<?php echo htmlspecialchars($cert['certification_file']); ?>" download>Download</a>
                        <form action="delete_certification.php" method="post" style="display:inline;">
                            <input type="hidden" name="cert_id" value="<?php echo $cert['id']; ?>">
                            <button type="submit" name="delete_certification">Delete</button>
                        </form>
                    </li>
                    <?php
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
endforeach;
?>
          
            </ul>
        </section>
        
        <section id="recommendations-section">
        <section id="recommendations-section">
    <h2>Recommendations for You</h2>

    <!-- Resources Section -->
    <div id="resources-section">
        <h3>Resources</h3>
        <?php if (count($resources) > 0): ?>
            <?php foreach ($resources as $type => $type_resources): ?>
                <h4><?php echo ucfirst($type); ?> Resources</h4>
                <ul>
                    <?php foreach ($type_resources as $resource): ?>
                        <li>
                            <a href="<?php echo htmlspecialchars($resource['resource_link']); ?>" target="_blank">
                                <?php echo htmlspecialchars($resource['course_name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No resources available for your interests.</p>
        <?php endif; ?>
    </div>

    <!-- Projects Section -->
    <div id="projects-section">
        <h3>Project Ideas</h3>
        <?php if (count($projects) > 0): ?>
            <?php foreach ($projects as $difficulty => $difficulty_projects): ?>
                <h4><?php echo ucfirst($difficulty); ?> Level</h4>
                <ul>
                    <?php foreach ($difficulty_projects as $project): ?>
                        <li><?php echo htmlspecialchars($project['project_idea']); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No project ideas available for your interests.</p>
        <?php endif; ?>
    </div>
</section>


    </div>

    <footer>
        <p>&copy; 2024 TechVision Dashboard. All rights reserved.</p>
    </footer>
</main>
    <script src="dashboard.js"></script>
</body>
</html>
