<?php
declare(strict_types=1);

namespace Plaisio\TrustedHostAuthority;

/**
 * This implementation has no trusted remote hosts.
 */
class CoreTrustedHostAuthority implements TrustedHostAuthority
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns false for all IP addresses.
   *
   * @param string $ip The IP address of the remote host.
   */
  public function isTrustedHost(string $ip): bool
  {
    return false;
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
