<?php
session_start(); // Start a session
include '../View/connect.php'; // Include your database connection file

// Default user information
$username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : ""; // Retrieve cookie
$newuser = "";
$role = "";
$desc = "";
$age = "";
$address = "";
$hobbies = "";

// Check if username exists in the database
if (!empty($username)) {
    // Prepare SQL query to fetch user information from the database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists in the database
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Assign user data to variables
        $newuser = $user['username'];
        $role = isset($user['role']) ? $user['role'] : ''; // Fetch the role correctly
        $desc = isset($user['bio']) ? $user['bio'] : ''; // Fetch bio correctly
        $age = isset($user['age']) ? $user['age'] : ''; // Fetch age correctly
        $address = isset($user['address']) ? $user['address'] : ''; // Fetch address correctly
        $hobbies = isset($user['hobbies']) ? $user['hobbies'] : ''; // Fetch hobbies correctly

        // Store user information in session
        $_SESSION['role'] = $role; // Store role in session
        $_SESSION['desc'] = $desc; // Store bio in session
        $_SESSION['age'] = $age; // Store age in session
        $_SESSION['address'] = $address; // Store address in session
        $_SESSION['hobbies'] = $hobbies; // Store hobbies in session

        $member = "Welcome, $newuser!";
    } else {
        // User not found in the database, treat as a new member
        $newuser = $username; // Still use the username from cookie
        $member = "New Member $newuser!";
        $role = "Apprentice Developer"; // Default role for new members

        // Store new user information in session
        $_SESSION['role'] = $role; // Store role in session
        $_SESSION['desc'] = "Welcome to our community!"; // Default description for new users
        $_SESSION['age'] = ""; // Default values for new users
        $_SESSION['address'] = ""; // Default values for new users
        $_SESSION['hobbies'] = ""; // Default values for new users
    }

    $stmt->close(); // Close the statement
} else {
    $member = "Guest"; // Handle case when username is empty
}

$marcelino = "Geminaries Marcelino";
$cedeno = "Mark bryan Cedeno";
$rivas = "Jose Emmanuel Rivas";
$bunyi = "John Michael Bunyi";
$falcon = "Frederick Falcon";
$alfaro = "Edwil Mark Alfaro";

include '../View/header.php';
?>

<title>Kampon ni Aries</title>
<link rel="stylesheet" href="../CSS/indexstyles.css">

<script>
    function moreinfofunction() {
        document.getElementById("moreinfo").innerHTML = "Naghintay kaba wala na, it's a prank";
        document.getElementById('cong').src = '../images/Prank.jfif';
        document.getElementById('cong').style.height = "85px";
        document.getElementById('cong').style.width = "150px";
    }
</script>

<section id="team-section" class="team-section">
    <h1 id="intro"> Sup <?php echo $member ?>! Meet Our Team</h1>
    <div class="team-container">
        <div class="team-member">
            <img src="../images/marcelino.gif" alt="Marcelino">
            <h3>
                <?php echo $marcelino ?>
            </h3>
            <p>Project Manager</p>
            <!-- <a href="marcelino-page.html">View Profile</a> -->
            <a href="#marcelino-profile">View Profile</a>
        </div>
        <div class="team-member">
            <img src="../images/cedeno.jpg" alt="Cedeno">
            <h3>
                <?php echo $cedeno ?>
            </h3>
            <p>Lead Developer</p>
            <!-- <a href="cedeno-page.html">View Profile</a> -->
            <a href="#cedeno-profile">View Profile</a>
        </div>
        <div class="team-member">
            <img src="../images/rivas.jpg" alt="Rivas">
            <h3>
                <?php echo $rivas ?>
            </h3>
            <p>System Analyst</p>
            <!-- <a href="rivas-page.html">View Profile</a> -->
            <a href="#rivas-profile">View Profile</a>
        </div>
        <div class="team-member">
            <img src="../images/bunyi.jpg" alt="Bunyi">
            <h3>
                <?php echo $bunyi ?>
            </h3>
            <p>Web Designer</p>
            <!-- <a href="bunyi-page.html">View Profile</a> -->
            <a href="#bunyi-profile">View Profile</a>
        </div>
        <div class="team-member">
            <img src="../images/falcon.jpg" alt="Falcon">
            <h3>
                <?php echo $falcon ?>
            </h3>
            <p>UI/UX Designer</p>
            <!-- <a href="falcon-page.html">View Profile</a> -->
            <a href="#falcon-profile">View Profile</a>
        </div>
        <div class="team-member">
            <img src="../images/alfaro.jpg" alt="Alfaro">
            <h3>
                <?php echo $alfaro ?>
            </h3>
            <p>Database Dev</p>
            <!-- <a href="alfaro-page.html">View Profile</a> -->
            <a href="#alfaro-profile">View Profile</a>
        </div>
    </div>
    <div class="team-intro">
        <h1>Meet the Powerhouse of Web Innovation: Group 5</h1>
        <p id="moreinfo">
            Welcome to the Group 5 <?php echo $member ?>, we are a team of extraordinary web developers, each a master in their field, dedicated to pushing the boundaries of digital creation. From crafting pixel-perfect designs to engineering robust systems, our collective expertise transforms visions into interactive realities.
        </p>
        <img id="cong" src="../images/quotation.jfif">
        <div>
            <button class="more-info" type="button" onclick="setTimeout(moreinfofunction, 3000)">Click for more team info</button>
        </div>
    </div>
</section>
<!-- Profiles Section -->
<section class="profiles">
    <div id="marcelino-profile" class="profile">
        <div class="profile-header">
            <img src="../images/marcelino.gif" alt="Geminaries Marcelino">
            <h2>
                <?php echo $marcelino ?>
            </h2>
            <p>Project Manager</p>
        </div>
        <div class="profile-content">
            <p> <?php echo "Bading" ?> </p>
            <p> <?php echo "22 years old" ?> </p>
            <p> <?php echo "Rhapsody Residences, Muntinlupa City" ?> </p>
            <p> <?php echo "Hobbies: Watching anime and playing guitar"; ?> </p>
            <a href="mailto:marcelino.gem23@gmail.com" class="icon-button"><img src="../images/gmail.jfif"></a>
            <div>
                <a href="#team-section" class="back-button">Back to Team</a>
            </div>
        </div>
    </div>
    <div id="cedeno-profile" class="profile">
        <div class="profile-header">
            <img src="../images/cedeno.jpg" alt="Mark Bryan Cedeno">
            <h2>
                <?php echo $cedeno ?>
            </h2>
            <p>Lead Developer</p>
        </div>
        <div class="profile-content">
            <p> <?php echo "Daddy Chill"; ?> </p>
            <p> <?php echo "24 years old"; ?> </p>
            <p> <?php echo "Purok 4 Extension Alabang, Muntinlupa City"; ?> </p>
            <p> <?php echo "Hobbies: Playing games, reading and watching yujitube"; ?> </p>
            <a href="mailto: cedenomarkbryan04@gmail.com" class="icon-button"><img src="../images/gmail.jfif"></a>
            <div>
                <a href="#team-section" class="back-button">Back to Team</a>
            </div>
        </div>
    </div>
    <div id="rivas-profile" class="profile">
        <div class="profile-header">
            <img src="../images/rivas.jpg" alt="Jose Emmanuel Rivas">
            <h2>
                <?php echo $rivas ?>
            </h2>
            <p>System Analyst</p>
        </div>
        <div class="profile-content">
            <p> <?php echo "Sir Hubert 2.0"; ?> </p>
            <p> <?php echo "20 years old"; ?> </p>
            <p> <?php echo "Talon IV, Las piñas City"; ?> </p>
            <p> <?php echo "Hobbies: Playing guitar, tekken and mukbangers"; ?> </p>
            <a href="mailto: rivasjoseemmanuel055@gmail.com" class="icon-button"><img src="../images/gmail.jfif"></a>
            <div>
                <a href="#team-section" class="back-button">Back to Team</a>
            </div>
        </div>
    </div>
    <div id="bunyi-profile" class="profile">
        <div class="profile-header">
            <img src="../images/bunyi.jpg" alt="John Michael Bunyi">
            <h2>
                <?php echo $bunyi ?>
            </h2>
            <p>Web Designer</p>
        </div>
        <div class="profile-content">
            <p> <?php echo "Aports ng lahat"; ?> </p>
            <p> <?php echo "21 years old"; ?> </p>
            <p> <?php echo "3 Cupang, Muntinlupa City"; ?> </p>
            <p> <?php echo "Hobbies: Playing basketball, riding bike, and foodtrip"; ?> </p>
            <a href="mailto: johnmichaelbunyi2@gmail.com" class="icon-button"><img src="../images/gmail.jfif"></a>
            <div>
                <a href="#team-section" class="back-button">Back to Team</a>
            </div>
        </div>
    </div>
    <div id="falcon-profile" class="profile">
        <div class="profile-header">
            <img src="../images/falcon.jpg" alt="Frederick Falcon">
            <h2>
                <?php echo $falcon ?>
            </h2>
            <p>UI/UX Designer</p>
        </div>
        <div class="profile-content">
            <p> <?php echo "Altab Master"; ?> </p>
            <p> <?php echo "25 years old"; ?> </p>
            <p> <?php echo "Purok 3 Harmony Ville Cupang, Muntinlupa City"; ?> </p>
            <p> <?php echo "Hobbies: Watching Viva Mix"; ?> </p>
            <a href="mailto: frederickfalcon2@gmail.com" class="icon-button"><img src="../images/gmail.jfif"></a>
            <div>
                <a href="#team-section" class="back-button">Back to Team</a>
            </div>
        </div>
    </div>
    <div id="alfaro-profile" class="profile">
        <div class="profile-header">
            <img src="../images/alfaro.jpg" alt="Edwil Mark Alfaro">
            <h2>
                <?php echo $alfaro ?>
            </h2>
            <p>Database Developer</p>
        </div>
        <div class="profile-content">
            <p>Evolution 1</p>
            <p>22 years old</p>
            <p>BLK 1 Purok 1 Dolleton St. Bayanan Muntinlupa City</p>
            <p>Hobbies: Playing Basketball</p>
            <a href="mailto: alfaroedwil23@gmail.com" class="icon-button"><img src="../images/gmail.jfif"></a>
            <div>
                <a href="#team-section" class="back-button">Back to Team</a>
            </div>
        </div>
    </div>
    <div id="user-profile" class="profile">
        <div class="profile-header">
            <img src="../images/Boss.jpg" alt="User Profile">
            <h2>
                <?php echo $newuser ?>
            </h2>
            <p> <?php echo $role ?></p>
        </div>
        <div class="profile-content">
            <p> <?php echo $desc ?> </p>
            <p> <?php echo $age ?> </p>
            <p> <?php echo $address ?> </p>
            <p> <?php echo $hobbies ?> </p>
            <a href="mailto:" class="icon-button"><img src="../images/gmail.jfif"></a>
            <div>
                <a href="#team-section" class="back-button">Back to Team</a>
            </div>
        </div>
    </div>
</section>

<?php include '../View/footer.php'; ?>