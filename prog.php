<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Languages Roadmap</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }
        header {
            background: linear-gradient(to right, #77bcb7, #278aab);
            color: white;
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            background: blue;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav a:hover {
            background: #003d80;
        }
        .container {
            margin: 20px;
        }
        .language-roadmap {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .roadmap {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
            padding: 20px;
            transition: transform 0.2s;
        }
        .roadmap:hover {
            transform: scale(1.03);
        }
        .roadmap h3 {
            margin-top: 0;
            color: #333;
        }
        .steps {
            list-style-type: none;
            padding: 0;
        }
        .steps li {
            background: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border-left: 4px solid #007BFF;
            border-radius: 4px;
        }
        .resources {
            margin-top: 15px;
        }
        .resources a {
            display: block;
            color: #007BFF;
            text-decoration: none;
            margin: 5px 0;
        }
        .resources a:hover {
            text-decoration: underline;
        }
        /* General Footer Styling */
.footer {
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: #ecf0f1;
    padding: 40px 20px;
    text-align: center;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.footer-section {
    flex: 1;
    padding: 20px;
    min-width: 250px;
    margin: 10px;
}

.footer-section h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.footer-section p {
    font-size: 1rem;
    line-height: 1.5;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin: 8px 0;
}

.footer-section ul li a {
    text-decoration: none;
    color: #ecf0f1;
    font-weight: bold;
}

.footer-section ul li a:hover {
    color: #3498db;
}

/* Social Media Icons */
.social-icons {
    display: flex;
    justify-content: space-around;
    margin-top: 10px;
}

.social-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #56004f;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.5rem;
    text-decoration: none;
}

.social-icon:hover {
    background-color: #2980b9;
}

/* Footer Bottom Section */
.footer-bottom {
    background-color: #34495e;
    padding: 10px 0;
}

.footer-bottom p {
    margin: 0;
    font-size: 1rem;
}

    </style>
</head>
<body>
    <header>
        <h1>C, C++, Python, and Java Roadmaps</h1>
        <p>Step-by-step guide to learning foundational programming languages</p>
        <nav>
            <a href="#c-roadmap">C</a>
            <a href="#cpp-roadmap">C++</a>
            <a href="#python-roadmap">Python</a>
            <a href="#java-roadmap">Java</a>
        </nav>
    </header>

    <div class="container">
        <div class="language-roadmap">

            <div class="roadmap" id="c-roadmap">
                <h3>C Programming Roadmap</h3>
                <ul class="steps">
                    <li>Learn syntax and basic concepts (variables, loops, conditions).</li>
                    <li>Understand pointers and memory management.</li>
                    <li>Master functions, arrays, and structures.</li>
                    <li>Study file handling and standard libraries.</li>
                    <li>Explore advanced topics: bit manipulation and data structures.</li>
                </ul>
                <div class="resources">
                    <h4>Resources:</h4>
                    <a href="https://www.learn-c.org/" target="_blank">Learn C Online</a>
                    <a href="https://www.tutorialspoint.com/cprogramming/" target="_blank">TutorialsPoint - C</a>
                    <a href="https://www.geeksforgeeks.org/c-programming-language/" target="_blank">GeeksforGeeks - C</a>
                    <a href="https://www.youtube.com/@CodeWithHarry" target="_blank">Code with Harry (C Playlist)</a>
                </div>
            </div>

            <div class="roadmap" id="cpp-roadmap">
                <h3>C++ Programming Roadmap</h3>
                <ul class="steps">
                    <li>Review basic C concepts.</li>
                    <li>Learn Object-Oriented Programming (OOP).</li>
                    <li>Study advanced features: templates, STL, and exceptions.</li>
                    <li>Explore design patterns and best practices.</li>
                    <li>Practice building projects and solving real-world problems.</li>
                </ul>
                <div class="resources">
                    <h4>Resources:</h4>
                    <a href="https://www.learncpp.com/" target="_blank">Learn C++ Online</a>
                    <a href="https://cplusplus.com/doc/tutorial/" target="_blank">Cplusplus.com - Tutorial</a>
                    <a href="https://www.geeksforgeeks.org/c-plus-plus/" target="_blank">GeeksforGeeks - C++</a>
                    <a href="https://www.youtube.com/@CodeWithHarry" target="_blank">Code with Harry (C++ Playlist)</a>
                </div>
            </div>

            <div class="roadmap" id="python-roadmap">
                <h3>Python Programming Roadmap</h3>
                <ul class="steps">
                    <li>Understand Python syntax and data types.</li>
                    <li>Learn control structures and functions.</li>
                    <li>Master libraries: NumPy, Pandas, and Matplotlib.</li>
                    <li>Work on object-oriented programming in Python.</li>
                    <li>Build projects: web scraping, automation, or web apps.</li>
                </ul>
                <div class="resources">
                    <h4>Resources:</h4>
                    <a href="https://www.python.org/about/gettingstarted/" target="_blank">Python.org - Getting Started</a>
                    <a href="https://realpython.com/" target="_blank">Real Python</a>
                    <a href="https://www.geeksforgeeks.org/python-programming-language/" target="_blank">GeeksforGeeks - Python</a>
                    <a href="https://www.youtube.com/@CodeWithHarry" target="_blank">Code with Harry (Python Playlist)</a>
                </div>
            </div>

            <div class="roadmap" id="java-roadmap">
                <h3>Java Programming Roadmap</h3>
                <ul class="steps">
                    <li>Learn basic Java syntax and object-oriented programming.</li>
                    <li>Understand core libraries and Java Collections Framework.</li>
                    <li>Explore multithreading and exception handling.</li>
                    <li>Study Java frameworks like Spring and Hibernate.</li>
                    <li>Work on projects: Android apps or backend development.</li>
                </ul>
                <div class="resources">
                    <h4>Resources:</h4>
                    <a href="https://www.learnjavaonline.org/" target="_blank">Learn Java Online</a>
                    <a href="https://www.javatpoint.com/java-tutorial" target="_blank">JavaTpoint</a>
                    <a href="https://www.geeksforgeeks.org/java/" target="_blank">GeeksforGeeks - Java</a>
                    <a href="https://www.youtube.com/@CodeWithHarry" target="_blank">Code with Harry (Java Playlist)</a>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>We provide comprehensive resources for learning various programming languages. Our goal is to guide you in your programming journey from beginner to expert level.</p>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Programming Languages</a></li>
                <li><a href="#">Tutorials</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class="footer-contact">
                <h3>Contact Us</h3>
                <p>Email: techvision@gmail.com</p>
                <p>Phone: +xxx xxx xxxx</p>
                
        </div>

        <div class="footer-section social-media">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#" target="_blank" class="social-icon facebook">F</a>
                <a href="#" target="_blank" class="social-icon twitter">T</a>
                <a href="#" target="_blank" class="social-icon linkedin">L</a>
                <a href="#" target="_blank" class="social-icon instagram">I</a>
            </div>
        </div>
    </div>
    
   
            </div>
            <p>© 2024 TechVision. Empowering students to achieve more.</p>
        </div>


</footer>

</body>
</html>