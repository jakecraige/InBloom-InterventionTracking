<?php
    class Student 
	{
		private $id = null;
		private $schoolId = null;
		private $firstName = null;
		private $middleName = null;
		private $lastSurname = null;
		private $birthday = null;
		private $sex = null;
		private $race = null;
		private $disabilities = null;
		private $classes = null;
		private $db;
		
		public function __construct($id)
		{
			$this->id = $id;
			$this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$sql = "SELECT * FROM students WHERE id='$id' LIMIT 1";
			$result = mysqli_query($this->db, $sql);
			while($student = mysqli_fetch_array($result)) {
				$this->schoolId = $student['schoolId'];
				$this->firstName = $student['firstName'];
				$this->middleName = $student['middleName'];
				$this->lastSurname = $student['lastSurname'];
				$this->birthday = $student['birthday'];
				$this->sex = $student['sex'];
				$this->race = $student['race'];
				$this->disabilities = $student['disabilities'];
				$this->classes = $student['classes'];

			}
		}

    	public function getId() { return $this->id; }
		public function getSchoolId() { return $this->sectionId; }
		public function getFirstName() { return $this->firstName; }
		public function getMiddleName() { return $this->middleName; }
		public function getLastSurname() { return $this->lastSurname; }
		public function getBirthday() { return $this->birthday; }
		public function getAge() {
    	    //calculate years of age (input string: YYYY-MM-DD)
            list($year, $month, $day) = explode("-", $this->getBirthday());
        
            $year_diff  = date("Y") - $year;
            $month_diff = date("m") - $month;
            $day_diff   = date("d") - $day;
        
            if ($day_diff < 0 || $month_diff < 0)
                $year_diff--;
        
            return $year_diff;   
		}
		public function getSex() { return $this->sex; }
		public function getRace() { return $this->race; }
		public function getDisabilities() { return $this->disabilities; }
		public function getClasses() { return $this->classes; }
		public function isEnrolled($classId) {
			$c = explode(' ', $this->classes);
			foreach ($c as $studentClassId) {
				if($studentClassId == $classId) {
					return true;
				}
			}
			return false;
		}
	}
	function createStudentsArray($schoolId) {
        $students = array();
        $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM students WHERE schoolId='$schoolId'";
        $result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($result)) {
            $students[] = new Student($row['id']);
        }
		return $students;
    }
?>