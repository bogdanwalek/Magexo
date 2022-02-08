1. Enable the module POS
php bin/magento module:status
php bin/magento module:enable Magexo_POS

2. Install DB schema and insert POS data (generating random POS in table magexo_pos_points)
php bin/magento setup:upgrade

scripts:
\Magexo\POS\Setup\InstallSchema.php
\Magexo\POS\Setup\InstallData.php
\Magexo\POS\Setup\UgradeSchema.php

3. Frontend - table of POS
_MAGENTO_URL/POS/index/display

4. Admin GRID
Available via main menu POINT OF SALE -> Manage points
Delete action available via checking rows and Actions rollover - Delete 
_MAGENTO_URL_ADMIN/magexo_pos/post/index/key/YOUR_KEY/

5. Console command to add new POS
php magento --list
php magento magexo:pos:add --name _NAME --address _ADDRESS --is_available _IS_AVAILABLE (values yes, no)
Example of adding new POS
php magento magexo:pos:add --name POS101 --address Address101 --is_available yes