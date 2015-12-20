<?php


namespace RefactoringExamples\EncapsulateCollection\After;

use RefactoringExamples\EncapsulateCollection\Course;

class Person
{

    /**
     * @var \SplObjectStorage
     */
    private $courses;

    /**
     * Person constructor.
     */
    public function __construct()
    {
        $this->courses = new \SplObjectStorage();
    }

    /**
     * @param Course $course
     */
    public function addCourse(Course $course)
    {
        $this->courses->attach($course);
    }

    /**
     * @param Course $course
     */
    public function removeCourse(Course $course)
    {
        $this->courses->detach($course);
    }

    /**
     * @return int
     */
    public function getNumberOfAdvancedCourses():int
    {
        $advancedCourses = 0;
        $this->courses->rewind();
        while ($this->courses->valid()) {
            $course = $this->courses->current();
            if ($course->isAdvanced()) {
                $advancedCourses++;
            }
            $this->courses->next();
        }

        return $advancedCourses;
    }

    /**
     * @return int
     */
    public function getNumberOfCourses():int
    {
        return $this->courses->count();
    }

    /**
     * @return \SplObjectStorage
     */
    public function getCourses():\SplObjectStorage
    {
        return $this->courses;
    }
}
