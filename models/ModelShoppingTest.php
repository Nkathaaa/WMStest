<?php /** @noinspection PhpMethodNamingConventionInspection */

/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 7/15/20
 * Time: 8:42 AM
 */
class ModelShoppingTest extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('ModelShopping');
        $this->obj = $this->CI->ModelShopping;
    }

    public function test_get_countries()
    {
        $output = json_encode($this->obj->getProductCategories('', [], 1));

        $expected = 'prodCatId';
        static::assertStringContainsStringIgnoringCase($expected, $output, "Response: " . $output);
    }
}