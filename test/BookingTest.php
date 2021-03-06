<?php
/**
 * Booking Bat - Availability Engine (http://bookingbat.com)
 *
 * @link      http://github.com/bookingbat/engine for the canonical source repository
 * @copyright Copyright (c) 2013 Josh Ribakoff
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class BookingTest extends PHPUnit_Framework_TestCase
{
    function testShouldReturnDate()
    {
        $booking = new \Bookingbat\Engine\Booking(array(
            'date' => '2013-02-05'
        ));
        $this->assertEquals('2013-02-05', $booking->date(), 'should return date');
    }

    function testShouldReturnStartTime()
    {
        $booking = new \Bookingbat\Engine\Booking(array(
            'start' => '23:00'
        ));
        $this->assertEquals('23:00:00', $booking->start(), 'should return start time');
    }

    function testShouldSetEndTime()
    {
        $booking = new \Bookingbat\Engine\Booking(array(
            'end' => '23:30'
        ));
        $this->assertEquals('23:30:00', $booking->end(), 'should set specific end time');
    }

    function testShouldInferEndTime()
    {
        $booking = new \Bookingbat\Engine\Booking(array(
            'start' => '23:00'
        ));
        $this->assertEquals('23:30:00', $booking->end(), 'should return end time by adding 30 minutes to start time');
    }

    function testShouldInferEndTimeWhenDurationIs60()
    {
        $booking = new \Bookingbat\Engine\Booking(array(
            'start' => '23:00',
            'duration' => 60
        ));
        $this->assertEquals('00:00:00', $booking->end(), 'should return end time by adding 60 minutes to start time');
    }

}