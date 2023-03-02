<?php

namespace Mustang\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

/**
 * Class ContainerInstaller
 *
 * @author  Aboozar Ghaffari <aboozar.ghf@gmail.com>
 */
class ContainerInstaller extends LibraryInstaller
{
	/**
	 * {@inheritDoc}
	 */
	public function getInstallPath(PackageInterface $package)
	{
		$containerName = $package->getPrettyName();
		$extras = json_decode(json_encode($package->getExtra()));
		if (isset($extras->mustang->container->name)) {
			$containerName = $extras->mustang->container->name;
		}
		return "app/Containers/Vendor/" . $containerName;
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return ('mustang-container' === $packageType);
	}
}
