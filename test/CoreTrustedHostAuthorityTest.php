<?php
declare(strict_types=1);

namespace Plaisio\TrustedHostAuthority\Test;

use PHPUnit\Framework\TestCase;
use Plaisio\TrustedHostAuthority\CoreTrustedHostAuthority;

/**
 * Test cases for class CoreRequest.
 */
class CoreTrustedHostAuthorityTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Return a list of IP addresses.
   *
   * @return string[][]
   */
  public static function getIpList(): array
  {
    $ipList = [['127.0.0.1'], ['192.168.1.1'], ['::1']];
    for ($i = 0; $i<10; ++$i)
    {
      $ipList[] = [long2ip(rand(0, 4294967295))];
    }

    return $ipList;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test remote host is never trusted.
   *
   * @dataProvider getIpList
   */
  public function testNoHostIsTrusted(string $ip): void
  {
    $authority = new CoreTrustedHostAuthority();
    $trusted   = $authority->isTrustedHost($ip);
    self::assertFalse($trusted);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
