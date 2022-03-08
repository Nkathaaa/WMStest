<?php /** @noinspection PhpMethodNamingConventionInspection */

/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 7/15/20
 * Time: 8:42 AM
 */

class ModelGeneralTest extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('ModelGeneral');
        $this->obj = $this->CI->ModelGeneral;
    }

    public function test_get_countries()
    {
        $output = json_encode($this->obj->getCountries());

        $expected = 'coId';
        static::assertStringContainsStringIgnoringCase($expected, $output, "Response: " . $output);
    }
}