<?php /** @noinspection PhpMethodNamingConventionInspection */

/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 7/15/20
 * Time: 8:42 AM
 */
class ModelUsersTest extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('ModelUsers');
        $this->obj = $this->CI->ModelUsers;
    }

    public function test_get_countries()
    {
        $output = json_encode($this->obj->getRoleGroups('', 1));

        $expected = 'uGrId';
        static::assertStringContainsStringIgnoringCase($expected, $output, "Response: " . $output);
    }
}