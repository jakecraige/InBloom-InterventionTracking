<?php
    class Section 
    {
		private $id = null;
		private $sectionId = null;
		private $schoolId = null;
        private $title = null;
		private $students = null;
		private $db;
		
		public function __construct($id)
		{
			$this->id = $id;
			$this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$sql = "SELECT * FROM classes WHERE id='$id' LIMIT 1";
			$result = mysqli_query($this->db, $sql);
			while($s = mysqli_fetch_array($result)) {
				$this->sectionId = $s['sectionId'];
				$this->schoolId = $s['schoolId'];
                $this->title = $s['title'];
				$this->students = $s['students'];
			}
		}

    	public function getId() { return $this->id; }
		public function getSectionId() { return $this->sectionId; }
		public function getSchoolId() { return $this->schoolId; }
        public function getTitle() { return $this->title; }
		public function getStudents() { return $this->students; }
	}
    function createClassesArray() {
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