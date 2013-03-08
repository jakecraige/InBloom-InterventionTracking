<?php
    class Attendance 
    {
		private $id = null;
		private $studentId = null;
		private $sectionId = null;
		private $schoolId = null;
		private $event = null;
		private $day = null;
		private $db;
		
		public function __construct($studentId = 'unused',  $sectionId = 'unused', $schoolId = 'unused', $event = 'unused', $id = 'unused')
		{
			$this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
			if($id = 'unused') { //This means I am not looking for info on one, so create it.
				$this->studentId = $studentId;
				$this->sectionId = $sectionId;
				$this->schoolId = $schoolId;
				$this->event = $event;
				$this->day = date('Y-m-d');
				//echo "$schoolId = schoolid";
				//addAttendance($studentId, $sectionId, $schoolId, $event);
			}
			else {
				$this->id = $id;
				$sql = "SELECT * FROM attendance WHERE id='$id' LIMIT 1";
				$result = mysqli_query($this->db, $sql);
				while($s = mysqli_fetch_array($result)) {
					$this->studentId = $studentId;
					$this->sectionId = $s['sectionId'];
					$this->schoolId = $s['schoolId'];
					$this->event = $s['event'];
					$this->day = $s['date'];
				}
			}
		}

    	public function getId() { return $this->id; }
		public function getSectionId() { return $this->sectionId; }
		public function getSchoolId() { return $this->schoolId; }
        public function getTitle() { return $this->title; }
		
		public function addAttendance() {
			if($entryId = $this->checkEntryExists()) {
				//Update that id with event
				$sql = "UPDATE attendance SET event='$this->event' WHERE id='$entryId'";
				$result = mysqli_query($this->db, $sql);
			}
			else {
				//Create entry 
				$sql = "INSERT INTO attendance VALUES (0, '$this->studentId', '$this->sectionId', '$this->schoolId', '$this->day', '$this->event')";
				$result = mysqli_query($this->db, $sql);
			}
		}
		private function checkEntryExists() {
			$sql = "SELECT * FROM attendance WHERE studentId='$this->studentId' AND sectionId='$this->sectionId' AND schoolId='$this->schoolId' AND date='$this->day'";
			//echo $sql;
			$result = mysqli_query($this->db, $sql);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_array($result)) {
					return $row['id'];
				}	
			}
			else {
				return 0;
			}
		}
	}
    function createAttendanceArray() {
        $sections = array();
        $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM classes";
        $result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($result)) {
            $sections[] = new Section($row['id']);
        }
		return $sections;
    }
?>