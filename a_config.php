<?php
	switch ($_SERVER["REQUEST_URI"]) 
	{
		case "/StreamAnalysis/index.php":
			$PAGE_TITLE = "Home Page";
			break;
		case "/StreamAnalysis/aboutus.php":
			$PAGE_TITLE = "About Us Page";
			break;
		case "/StreamAnalysis/contactus.php":
			$PAGE_TITLE = "Contact Us Page";
			break;
		case "/StreamAnalysis/login.php":
			$PAGE_TITLE = "Login Page";
			break;
			
		case "/StreamAnalysis/ManageCourse.php":
			$PAGE_TITLE = "Course Details";
			break;
		case "/StreamAnalysis/ManageStudent.php":
			$PAGE_TITLE = "Student Details";
			break;
		case "/StreamAnalysis/ManageQuestion.php":
			$PAGE_TITLE = "Question Details";
			break;
		case "/StreamAnalysis/ManageDataset.php":
			$PAGE_TITLE = "Data Set Details";
			break;
		case "/StreamAnalysis/ExamDetail.php":
			$PAGE_TITLE = "Exam Details";
			break;
		
		case "/StreamAnalysis/TakeTest.php":
			$PAGE_TITLE = "Online Test";
			break;
		default:
			$PAGE_TITLE = "Stream Analysis";
	}
?>