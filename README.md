# Requirements

* OXID eShop Version 7.3 or higher
* Access via Console possible
* Composer is installed on your Server

# Installation

1. Login via SSH and change to installed OXID eShop Edition Directory
2. Register the Module via Composer

```bash
composer require bisweb/deployer
```

3. Login to Shop Admin and activate the Module

# Uninstallation

1. Login to Shop Admin and deactivate the Module
2. Login via SSH and change to installed OXID eShop Edition Directory
3. Unregister the Module via Composer

```bash
./vendor/bin/oe-console oe:module:deactivate bisweb_deployer
./vendor/bin/oe-console oe:module:uninstall bisweb_deployer
composer remove bisweb/deployer
```

4. Clear Cache File Directory tmp/
5. Login to Shop Admin and confirm the message "Do you want to delete all registered module information and saved configurations?"
