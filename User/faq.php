<?php

@include '../config.php';
@include './Actions/visitor_count.php';

session_start();

if ($_SESSION['user_name'] == null) {
    header('location:../login.php');
}

?>




<!---------------------------------------html----------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "partials/header.php" ?>
    <script type="module" src="Javascript/video.js"></script>

</head>

<body>

    <?php require "partials/navbar.php" ?>
    <!------------------------sidebar start here----------------------------->


    <div class="container-fluid row">
        <!-- <div class="col flex-nowrap"> -->
        <div class="bg-light col-auto col-md-4 col-lg-2 min-vh-100">
            <div class="bg-light p-2">
                <a class="d-flex text-decoration-none mt-1 align-items-center text-black">
                    <span class="fs-4   d-none d-sm-inline">Sections</span>
                </a>
                <ul class="nav nav-tabs flex-column mt-3">
                    <li class="nav-item ">
                        <a href="userpage.php" class="nav-link text-black rounded-2 ">
                            <img src="Images/home.svg" width="20px" alt="user_image">
                            <span class="fs-6 d-none d-sm-inline ms-1">Home</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1 ">
                        <a href="news.php" class="nav-link text-black rounded-2">
                            <img src="Images/news.svg" width="20px" alt="user_image">
                            <span class="fs-6 d-none d-sm-inline ms-1">News</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="Information.php" class="nav-link text-black rounded-2">
                            <img src="Images/Information.svg" " width=" 20px" alt="list icons">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Information </span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="video.php" class="nav-link text-black rounded-2 ">
                            <img src="Images/video.svg" width="20px" alt="banner icon">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Cyber Video</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="Image.php" class="nav-link text-black rounded-2 ">
                            <img src="Images/gallery.svg" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="complain.php" class="nav-link text-black rounded-2">
                            <img src="Images/report.svg" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Report Complaint</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="faq.php" class="nav-link text-black rounded-2 active">
                            <img src="Images/faq.svg" width="21px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">FAQ</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="feedback.php" class="nav-link text-black rounded-2">
                            <img src="Images/feedback.svg" width="22px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Feedback</span>
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="contact.php" class="nav-link text-black rounded-2">
                            <img src="Images/contact.svg" width="20px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Contact Us</span>
                        </a>
                    </li>
                    <li class="logout">
                        <a href="../logout.php" class="nav-link text-black rounded-2">
                            <img src="Images/logout.svg" width="25px" alt="">
                            <span class="fs-6 d-none d-sm-inline  ms-1">Logout</span>
                        </a>
                    </li>


                </ul>
            </div>


        </div>
        <div class="container-fluid col">
            <div class="heading mt-3 mb-4">
                <h3>Frequently Asked Questions (FAQ) - Information Security Portal</h3>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h4 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is information security?
                        </button>
                    </h4>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Information security</strong> refers to the practices and measures taken to protect sensitive and valuable information from unauthorized access, disclosure, alteration, or destruction. It involves the implementation of various technical, administrative, and physical safeguards to ensure the confidentiality, integrity, and availability of information.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Why is information security important?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Information security</strong> is crucial to safeguarding the confidentiality, integrity, and availability of data. It helps prevent unauthorized access, data breaches, identity theft, and financial loss. Additionally, it ensures compliance with legal and regulatory requirements, maintains customer trust, and safeguards an organization's reputation.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What are the common threats to information security?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Common threats to information security include<strong> malware (viruses, worms, ransomware)</strong>, phishing attacks, social engineering, insider threats, unauthorized access, data breaches, and physical theft of devices. It is important to stay vigilant and implement robust security measures to mitigate these risks.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                            What are some best practices for information security?
                        </button>
                    </h2>
                    <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Use strong and unique passwords for all accounts and enable multi-factor authentication.</li>
                                <li>Regularly update software, applications, and operating systems to patch vulnerabilities.</li>
                                <li>Implement firewalls, antivirus software, and intrusion detection systems.</li>
                                <li>Encrypt sensitive data both at rest and during transmission.</li>
                                <li>Conduct regular security awareness training for employees.</li>
                                <li>Backup data regularly and store backups in secure offsite or cloud locations.</li>
                                <li>Limit access to sensitive information based on a need-to-know basis.</li>
                                <li>Develop an incident response plan to quickly and effectively respond to security incidents.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapseThree">
                            How can I protect myself against phishing attacks?
                        </button>
                    </h2>
                    <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                               <li> Be cautious of unsolicited emails, messages, or calls asking for personal or financial information.</li>
                               <li> Verify the authenticity of the sender before clicking on links or opening attachments.</li>
                               <li>Do not provide sensitive information through email or unfamiliar websites.</li>
                               <li> Double-check the URL of websites to ensure they are legitimate and secure (HTTPS).</li>
                               <li>Enable spam filters and use email authentication protocols like SPF, DKIM, and DMARC.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapseThree">
                        What is encryption, and why is it important for information security?
                        </button>
                    </h2>
                    <div id="collapsesix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <strong>Encryption </strong>is the process of converting data into a secure form (cipher) to prevent unauthorized access. It uses mathematical algorithms and keys to scramble the information, making it unreadable without the correct decryption key. Encryption is essential for protecting sensitive data, such as passwords, financial information, and personal records, both during storage and transmission.
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</body>

</html>