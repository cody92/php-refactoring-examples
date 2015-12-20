<?php
namespace RefactoringExamples\Tests\EncapsulateCollection;

use RefactoringExamples\EncapsulateCollection\Course;

class CourseTest extends \PHPUnit_Framework_TestCase
{

    public function testCourseCanBeInstantiated()
    {
        $courseName = "test course";
        $error = false;
        try {
            new Course($courseName, true);
        } catch (\Error $exception) {
            $error = true;
        }

        $this->assertFalse($error);
    }

    public function testCourseIsAdvanced()
    {
        $isAdvanced = true;
        $course = $this->getCourseInstance("", $isAdvanced);
        $this->assertEquals($isAdvanced, $course->isAdvanced());
    }

    public function testCourseName()
    {
        $courseName = "Refactoring";
        $course = $this->getCourseInstance($courseName, true);
        $this->assertEquals($courseName, $course->getCourseName());
    }

    /**
     * @param $courseName
     * @param $isAdvanced
     * @return Course
     */
    public function getCourseInstance($courseName, $isAdvanced)
    {
        $course = new Course($courseName, $isAdvanced);
        return $course;
    }
}
