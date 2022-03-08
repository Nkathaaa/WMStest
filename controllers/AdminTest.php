<?php /** @noinspection PhpClassNamingConventionInspection */
/** @noinspection PhpPropertyNamingConventionInspection */
/** @noinspection PhpMethodNamingConventionInspection
 */

declare (strict_types=1);

//use PHPUnit\Framework\TestCase;

//require_once('HTTPRequests.php');

/**
 * Class LoginTest
 */
final class AdminTest extends TestCase
{
    var $httpHelper;

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * LOGIN TESTS
     *
     */
    public function testCanLoginFromValidCredentials(): void
    {
        $output = json_encode($this->request('POST', 'authorise/login_exec/none/true', ['l_username' => 'autotest@kissdevs.com', 'l_passwd' => 'Th!5Pass321']));
        $expected = 'userid';
        static::assertStringContainsStringIgnoringCase($expected, $output, "Response: " . $output);
    }

    public function testCannotLoginFromInValidCredentials(): void
    {
        $output = $this->request('POST', 'authorise/login_exec/none/true', ['l_username' => 'autotest@kissdevs.com', 'l_passwd' => 'whsdshd1']);
        $expected = '01';
        static::assertStringContainsStringIgnoringCase($expected, json_encode($output), "Response: " . json_encode($output));
    }

    /*
     * GENERAL DATA TESTS - Based on fetching dashboard data as it calls the key data sections.
     *
     */

    public function testGetsKeyDashboardInfo(): void
    {
        $output = $this->request('POST', 'nav/fetchDashboardInfo/', ['l_username' => 'autotest@kissdevs.com', 'l_passwd' => 'Th!5Pass321']);
        $expected = 'deliveriesCancelled';
        static::assertStringContainsStringIgnoringCase($expected, json_encode($output), "Response: " . json_encode($output));
    }
}