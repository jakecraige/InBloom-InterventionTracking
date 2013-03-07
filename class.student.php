<?php
    class Student 
	{
		private $id = null;
		private $sectionId = null;
		private $schoolId = null;
		private $firstName = null;
		private $middleName = null;
		private $lastSurname = null;
		private $birthday = null;
		private $age = null;
		private $sex = null;
		private $race = null;
		private $disabilities = null;
		private $db;
		
		public function __construct($id)
		{
			$this->id = $id;
			$this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$sql = "SELECT * FROM students WHERE id='$id' LIMIT 1";
			$result = mysqli_query($this->db, $sql);
			while($student = mysqli_fetch_array($result)) {
				$this->sectionId = $student['sectionId'];
				$this->schoolId = $student['schoolId'];
				$this->firstName = $student['firstName'];
				$this->middleName = $student['middleName'];
				$this->lastSurname = $student['lastSurname'];
				$this->birthday = $student['birthday'];
				$this->age = $student['age'];
				$this->sex = $student['sex'];
				$this->race = $student['race'];
				$this->disabilities = $student['disabilities'];
				//echo $student['birthday'];
				//echo $this->birthday;
			}
		}
		public function __destruct(){
          //mysqli_close($db);
		}
		public function getSectionId() { return $this->sectionId; }
		public function getSchoolId() { return $this->sectionId; }
		public function getFirstName() { return $this->firstName; }
		public function getMiddleName() { return $this->middleName; }
		public function getLastSurname() { return $this->lastSurname; }
		public function getBirthday() { return $this->birthday; }
		public function getAge() { return $this->age; }
		public function getSex() { return $this->sex; }
		public function getRace() { return $this->race; }
		public function getDisabilities() { return $this->disabilities; }

	}

?>