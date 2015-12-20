<?php

namespace RefactoringExamples\EncapsulateCollection\Initial;

class Person
{

    /**
     * @var \SplObjectStorage
     */
    private $courses = null;

    public function setCourses(\SplObjectStorage $listOfCourses)
    {
        $this->courses = $listOfCourses;
    }

    /**
     * @return \SplObjectStorage
     */
    public function getCourses():\SplObjectStorage
    {
        return $this->courses;
    }
}
