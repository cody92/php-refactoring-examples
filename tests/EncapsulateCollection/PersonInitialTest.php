<?php


namespace RefactoringExamples\Tests\EncapsulateCollection;

use RefactoringExamples\EncapsulateCollection\Course;
use RefactoringExamples\EncapsulateCollection\Initial\Person;

/**
 * Class PersonInitialTest
 * @package RefactoringExamples\Tests\EncapsulateCollection
 */
class PersonInitialTest extends \PHPUnit_Framework_TestCase
{

    public function testCountNumberOfCourses()
    {
        $person = new Person();
        $listOfCourses = new \SplObjectStorage();
        $listOfCourses->attach(new Course('Refactoring', true));
        $listOfCourses->attach(new Course('Clean Code', false));
        $person->setCourses($listOfCourses);

        $this->assertEquals(2, $person->getCourses()->count());

        $designPatternsCourse = new Course('Design Patterns', true);
        $person->getCourses()->attach(new Course('Introduction to PHP', false));
        $person->getCourses()->attach($designPatternsCourse);
        $this->assertEquals(4, $person->getCourses()->count());

        $person->getCourses()->detach($designPatternsCourse);

        $this->assertEquals(3, $person->getCourses()->count());
    }

    public function testCountPersonAdvancedCourses()
    {
        $person = $this->getPersonWithCourses();

        $advancedCourses = 0;
        $person->getCourses()->rewind();
        while ($person->getCourses()->valid()) {
            $course = $person->getCourses()->current();
            if ($course->isAdvanced()) {
                $advancedCourses++;
            }
            $person->getCourses()->next();
        }

        $this->assertEquals(2, $advancedCourses);
    }

    /**
     * @return Person
     */
    public function getPersonWithCourses():Person
    {
        $person = new Person();
        $listOfCourses = new \SplObjectStorage();
        $listOfCourses->attach(new Course('Refactoring', true));
        $listOfCourses->attach(new Course('Clean Code', false));
        $listOfCourses->attach(new Course('Design Patterns', true));
        $listOfCourses->attach(new Course('Introduction to PHP', false));
        $person->setCourses($listOfCourses);

        return $person;
    }
}
