<?php   
//Serverside form validation

$name_error = '<input type="text" id="yourname" name="yourname"><br>';
$email_error = '<input type="text" id="youremail" name="youremail"><br>';
$subject_error = '<input type="text" id="yoursubject" name="yoursubject"><br>';
$message_error = '<textarea id="yourmessage" name="yourmessage"></textarea><br>';
$output = '';
if(isset($_POST["submit"]))  
{  
        if(empty($_POST["yourname"]))  
        {  
            $name_error = "<input type='text' style='border: 1px solid #d64541;' id='yourname' name='yourname'><br>";  
        }  
        else  
        {  
            if(!preg_match("/^[a-zA-Z ]*$/", $_POST["yourname"]))  
            {  
                    $name_error = "<input type='text' style='border: 1px solid #d64541;' id='yourname' name='yourname'><br>";  
            }  
        }  
        if(empty($_POST["youremail"]))  
        {  
            $email_error = "<input type='text' style='border: 1px solid #d64541;' id='youremail' name='youremail'><br>";  
        }  
        else  
        {  
            if(!filter_var($_POST["youremail"], FILTER_VALIDATE_EMAIL))  
            {  
                    $email_error = "<input type='text' style='border: 1px solid #d64541;' id='youremail' name='youremail'><br>";  
            }  
        } 
        if(empty($_POST["yoursubject"]))  
        {  
            $subject_error = "<input type='text' style='border: 1px solid #d64541;' id='yoursubject' name='yoursubject'><br>";  
        } 
        if(empty($_POST["yourmessage"]))  
        {  
            $message_error = "<textarea style='border: 1px solid #d64541;' id='yourmessage' name='yourmessage'></textarea><br>";  
        } 
        if($name_error == '<input type="text" id="yourname" name="yourname"><br>' && $email_error == '<input type="text" id="youremail" name="youremail"><br>' && $subject_error == '<input type="text" id="yoursubject" name="yoursubject"><br>' && $message_error == '<textarea id="yourmessage" name="yourmessage"></textarea><br>')  
        {  

            
            //Function to open the connection to my contact_details database
            function OpenCon(){
                // My local cpanel host
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "portfolio";
                // $servername = "localhost";
                // $username = "kylewarf_kylewarford";
                // $password = "u2FQhn6ip6DzSLc";
                // $dbname = "kylewarf_portfolio";
                // Create connection
                $conn = new mysqli($servername,
                    $username, $password, $dbname);

                return $conn;
            }
            //Function to close the connection
            function CloseCon($conn)
            {
                $conn -> close();
            }

            //Open the connection
            $conn = OpenCon();
            //Retrive the form data
            $sup_name =  $_POST["yourname"];
            $sup_email = $_POST["youremail"];
            $sup_subject = $_POST["yoursubject"];
            $sup_message = $_POST["yourmessage"];

            //Prepares and binds the parameters
            $sql = $conn->prepare("INSERT INTO contact_me VALUES (?, ?, ?, ?)");
            $sql->bind_param("ssss", $sup_name, $sup_email, $sup_subject, $sup_message);
            //Executes the query
            $sql->execute();
            //Close the connection
            CloseCon($conn);

            $output = '<p id="contact-success">Form submitted successfully</p>';
        }       
}  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Portfolio</title>
        <link rel="stylesheet" href="style.css">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/site.webmanifest">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/d8fc1f1b84.js" crossorigin="anonymous"></script>
        <script src="jquery-3.6.1.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body id="body-top" onload="typeWriters();">
        <ul class="navbar" id="navbarid" style="display: none;">
            <li><a href="#body-top" id="k"><h6>K</h6></a></li>
            <li id = "nav-about" class = "nav-option"><a href="#about-me-id">About Me</a></li>
            <li class="nav-option"><a href="#portfolio-id">My Portfolio</a></li>
            <li class="nav-option"><a href="#coding-id">Coding Examples</a></li>
            <li class="nav-option"><a href="#scion-id">SCS</a></li>
            <li class="nav-option"><a href="#contact-id">Contact Me</a></li>
            <li class="nav-option"><a href="https://github.com/Ponkshark" target="_blank"><i class="fa-brands fa-github fa-2xl"></i></a></li>
        </ul>
        <button class="menu-but" id="menu-but-id" onclick="opencloseNav()"><i class="fa-solid fa-bars"></i></button>
        <div id="main">
            <div class="info-container">
                <div class="img-container">
                    <img src="img/climbing-hero.jpg" id="hero-img" alt="Cartoon Climbing Backdrop">
                </div>
                
                <div class="info-text-cont">
                    <div class="info-text">
                        <h6 id="hero-name"></h6>
                        <h4 id="hero-desc"></h4>
                    </div>
                </div>
            </div>
            
            
            <div class="about-me-cont" id="about-me-id">
                <div class="about-me-title-cont">
                    <h5>About me</h5><br>
                    <p> Kyle Warford is a recently graduated student of the University of 
                        East Anglia. He has studied a mix of Computer Science, and Mathematics,
                        gaining a 2:1 Degree with honors in Mathematics. The experience of two 
                        different courses that both require a similar way of thinking and problem solving
                        provides Kyle a broader scope of subject understanding.
                    </p>
                    <p> Kyle is fueled by his passion of self improvement, and has studied
                        many programming languages, Python, HTML, C++, to name a few. And his inquiring
                        mind is always working towards his next project. He is currently studying
                        within the Netmatters Coalition Scheme system, with his end goal to work
                        within a large multi-national business.
                    </p>
                    </div>
            </div>

            <div class="portfolio-title-cont" id="portfolio-id">
                <h5 id="portfolio-title-id">Portfolio</h5>
            </div>

            <div class="portfolio-cont">
                <div class="project1" id="projectid1" style="visibility:hidden;">
                    <a href="https://kyle-warford.netmatters-scs.co.uk/netmatters/" target="_blank"><img src="img/project1.png" alt="Image of Netmatters website"></a>
                    <div class="project-text" id="project-text-1">
                        <h3>Project 1</h3>
                        <p><a href="https://ponkshark.github.io/NetMatters/" target="_blank">Netmatters Website Recreation</a></p>
                        <p id="code-lang1">HTML, CSS, JavaScript, PHP</p>
                    </div>
                </div>
                <div class="project2" id="projectid2" style="visibility:hidden;">
                    <a href="https://kyle-warford.netmatters-scs.co.uk/javascriptarray/" target="_blank"><img src="img/project2.png" alt="Image of JavaScript Website"></a>
                    <div class="project-text" id="project-text-2">
                        <h3>Project 2</h3>
                        <p><a href="https://ponkshark.github.io/JavaScriptArray/" target="_blank">Image Array</a></p>
                        <p id="code-lang2">JavaScript, jQuery</p>
                    </div>
                </div>
                <div class="project3" id="projectid3" style="visibility:hidden;">
                    <img src="img/comingsoon.jpg" alt="Coming soon image">
                    <div class="project-text" id="project-text-3">
                        <h3>Project 3</h3>
                        <p><a href="#">View Project</a></p>
                </div>
                </div>
                <div class="project4" id="projectid4" style="visibility:hidden;">
                    <img src="img/comingsoon.jpg" alt="Coming soon image">
                    <div class="project-text" id="project-text-4">
                        <h3>Project 4</h3>
                        <p><a href="#">View Project</a></p>
                </div>
                </div>
            </div>

            <div class="coding-title-cont" id="coding-id">
                <div>
                    <h5 id="coding-examples-title-id">Coding Examples</h5>
                    <div class="python-example">
                        <div id="p-example-1" style="visibility:hidden;">
                            <img src="img/coding-example-1.png" alt="Python code function that calculates the maximum power output of a wind turbine">
                            <div id="python-text">
                                <h2>Python Example</h2>
                                <p>During my time at university, I created python files that contain
                                    classes that store information into turbines, as well as store turbines into windfarms.
                                    This is an example of a function that on input of air density,
                                    wind velocity, downstream velocity, and upstream velocity,
                                    returns the maximum power output of a wind turbine. This is achieved by checking the 
                                    upstream and downstream winds, the turbines efficiency, the area achieved by the spinning blades,
                                    and then putting it all into a formula that returns the maximum power of the turbine. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="javascript-example">
                        <div id="j-example-1" style="visibility:hidden;">
                            <img src="img/coding-example-2.png" alt="JavaScript code of a function that creates a typewriter effect to text">
                            <div id="javascript-text">
                                <h2>JavaScript Example</h2>
                                <p>This example uses JavaScript functions to iterate through given text,
                                    letter by letter, and appends them to their corresponding Ids in 
                                    the HTML with a delay of 50 milliseconds per letter. The function stops only when it has
                                    iterated times equal to the length of the text given.
                                    Thus this function gives a typewriter-like effect to the given text on page load.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="sql-example">
                        <div id="sql-example-1" style="visibility:hidden;">
                            <img src="img/coding-example-3.png" alt="Database movie SQL example">
                            <div id="sql-text">
                                <h2>SQL Example</h2>
                                <p>This is an example showing the querying of a movie database.<br><br>
                                    Firstly it selects and adds a column header to movies and their
                                    years of release from the "movie" table, as well selecting a subquery of all ratings
                                    of all the movies from the "rating" table.<br><br>
                                    Then it creates a second sub-query that then
                                    only selects movies that have been given a rating, and whose rating is
                                    higher than 7/10.<br><br>
                                    Finally the entire table is ordered by the year of movie release in
                                    descending order. Thus showing a final table of each movie title that has a rating higher than 7,
                                    it's release date, and their ratings.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="scion-title-cont" id="scion-id">
                <div>
                    <h5 id="scion-1">The Scion Coalition Scheme</h5>
                    <h4 id="scion-2">Introduction to Scion Coalition Scheme</h4>
                    <p id="scion-3">The Scion Coalition Scheme is an intensive, 
                        specially tailored training program run by Netmatters 
                        in order to give willing candidates the opportunity to 
                        enter the industry as web developers. Under the supervision 
                        of senior web developers, scions generally aim to complete 
                        training within six to nine months. The course is intensive and 
                        therefore the level of learning achieved is extensive in a 
                        short space of time.</p>

                    <h4 id="scion-4">Treehouse</h4>
                    <p id="scion-5">Treehouse is an online learning community, featuring videos covering a 
                    number of topics from basic HTML to C# programming, iOS development, data analysis, and more. 
                    By completing courses users can earn points, allowing them to track their progress and see 
                    how much they've covered in certain areas.</p>
                    <h2 id="scion-6">Total Score: 5,344</h2>
                    <p id="scion-7">teamtreehouse.com/kylewarford2</p>

                    <p id="scion-8">About NetMatters<br>
                    Established in 2008<br>
                    Norfolk's leading technology company<br>
                    Winner of the Princess Royal Training Award<br>
                    Winner of EDP Skills of Tomorrow Award<br>
                    80+ staff, 2 locations across Norfolk<br>
                    Digital Marketing, Website & Software development & IT Support<br>
                    Broad spectrum of clients, working nationwide<br>
                    Operate to strict company values</p>
                </div>
            </div>

            <div class="contact-title-cont" id="contact-id">
                <div>
                    <h5>Contact Me</h5>
                    <div class="contact-cont">
                        <form name="contactForm" id="testtest" onsubmit="return validateForm(document.contactForm.youremail)" method="POST">
                            <span id="result"></span>
                            <span class="contact-item">
                                <label for="yourname" class="contact-label" id="required-name"><br><br>Your Name</label><br>
                                <input type="text" id="yourname" name="yourname"><br><br>
                            </span>
                            <span class="contact-item">
                                <label for="youremail" class="contact-label" id="required-email">Your Email</label><br>
                                <input type="text" id="youremail" name="youremail"><br><br>
                            </span>
                            <span class="contact-item">
                                <label for="yoursubject" class="contact-label">Subject</label><br>
                                <input type="text" id="yoursubject" name="yoursubject"><br><br>
                            </span>
                            <span class="contact-item">
                                <label for="yourmessage" class="contact-label" id="required-message">Message</label><br>
                                <textarea id="yourmessage" name="yourmessage"></textarea><br>
                            </span>
                            <span class="sub-item">
                                <input type="submit" name="submit" value="Send Enquiry" class="enquiry-but" />
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="back-to-top-cont">
                <a href="#body-top">
                    &#8679;<br>
                    Back to Top
                </a>
            </div>
    </div>
    </body>
</html>