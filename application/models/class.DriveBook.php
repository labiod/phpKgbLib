<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02/04/2015
 * Time: 20:35
 */
class DriveBook extends Model
{
    /**
     * @param DateTime $date
     * @return DriveBook[]
     */
    public static function getDayCalendarForOsk($date, $osk_id)
    {
        $driveBooks = array();
        $table = new Table("drive_book");
        $results = $table->fetchAll("DATE(drive_date) = '" . $date->format("Y-m-d") . "' AND osk_id = " . $osk_id);
        while ($results->next()) {
            $row = $results->current();
            $book = new DriveBook($row["id"]);
            $book->fetchData($row);
            $driveBooks[] = $book;
        }
        return $driveBooks;
    }

    public static function emptyMock()
    {
        return new DriveBook(-1);
    }

    /**
     * @var DateTime
     */
    private $_driveDate;
    private $_driveLocation;
    private $_driveType;
    private $_payment;
    /**
     * @var Osk
     */
    private $_osk;
    /**
     * @var Student
     */
    private $_student;

    /**
     * @var Teacher
     */
    private $_teacher;

    public function __construct($id)
    {
        if ($id != -1) {
            parent::__construct("drive_book", $id);
        } else {
            $this->_payment = "&nbsp;";
            $this->_driveDate = null;
            $this->_driveType = "&nbsp;";
            $this->_driveLocation = "&nbsp;";
        }
    }

    public function setDriveDate($date)
    {
        $this->_driveDate = $date;
    }

    public function getDriveDate()
    {
        return $this->_driveDate;
    }

    public function setDriveLocation($location)
    {
        $this->_driveLocation = $location;
    }

    public function getDriveLocation()
    {
        return $this->_driveLocation;
    }

    public function setDriveType($driveType)
    {
        $this->_driveType = $driveType;
    }

    public function getDriveType()
    {
        return $this->_driveType;
    }

    public function setDrivePayment($drivePayment)
    {
        $this->_payment = $drivePayment;
    }

    public function getDrivePayment()
    {
        return $this->_payment;
    }

    public function setStudent($studentId)
    {
        $student = new Student($studentId);
        $student->fetch();
        $this->_student = $student;
    }

    public function getStudent()
    {
        return $this->_student;
    }

    public function setOsk($oskId)
    {
        $osk = new Osk($oskId);
        $osk->fetch();
        $this->_osk = $osk;
    }

    public function getOsk()
    {
        return $this->_osk;
    }

    public function setTeacher($teacherId)
    {
        $teacher = new Teacher($teacherId);
        $teacher->fetch();
        $this->_teacher = $teacher;
    }

    public function getTeacher()
    {
        return $this->_osk;
    }

    public function fetchData($data)
    {
        $this->setDriveDate(new DateTime($data["drive_date"]));
        $this->setOsk($data["osk_id"]);
        $this->setStudent($data["student_id"]);
        $this->setTeacher($data["teacher_id"]);
        $this->_driveLocation = $data["location"];
        $this->_driveType = $data["drive_type"];
        $this->_payment = "30";
    }

    public function getStudentName()
    {
        if ($this->_student != null) {
            return $this->_student->getFirstName() . " " . $this->_student->getLastName();
        } else {
            return "&nbsp;";
        }
    }

    public function getDriveHour()
    {
        if($this->_student != null) {
            return $this->_student->getDrivenHour() + 1;
        } else {
            return "&nbsp;";
        }
    }

    public function getStudentPhone() {
        if($this->_student != null) {
            return $this->_student->getPhoneNumber();
        } else {
            return "&nbsp;";
        }
    }

    public function getFieldToUpdate()
    {
        // TODO: Implement getFieldToUpdate() method.
    }
}