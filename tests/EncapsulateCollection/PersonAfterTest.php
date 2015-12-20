<?php

namespace RefactoringExamples\Tests\EncapsulateCollection;

use RefactoringExamples\EncapsulateCollection\After\Person;
use RefactoringExamples\EncapsulateCollection\Course;

class PersonAfterTest extends \PHPUnit_Framework_TestCase
{
    public function testCountNumberOfCourses()
    {
        $person = new Person();
        $person->addCourse(new Course('Refactoring', true));
        $person->addCourse(new Course('Clean Code', false));

        $this->assertEquals(2, $person->getNumberOfCourses());

        $designPatternsCourse = new Course('Design Patterns', true);
        $person->addCourse(new Course('Introduction to PHP', false));
        $person->addCourse($designPatternsCourse);
        $this->assertEquals(4, $person->getNumberOfCourses());

        $person->removeCourse($designPatternsCourse);

        $this->assertEquals(3, $person->getNumberOfCourses());
    }

    public function testCountPersonAdvancedCourses()
    {
        $person = $this->getPersonWithCourses();

        $this->assertEquals(2, $person->getNumberOfAdvancedCourses());
    }

    /**
     * @return Person
     */
    public function getPersonWithCourses():Person
    {
        $person = new Person();
        $person->addCourse(new Course('Refactoring', true));
        $person->addCourse(new Course('Clean Code', false));
        $person->addCourse(new Course('Design Patterns', true));
        $person->addCourse(new Course('Introduction to PHP', false));

        return $person;
    }
}
