<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_User
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var $installer \Magento\Module\Setup */
$installer = $this;
$installer->startSetup();

// Add reset password link token column
$installer->getConnection()->addColumn(
    $installer->getTable('admin_user'),
    'rp_token',
    array(
        'type' => \Magento\DB\Ddl\Table::TYPE_TEXT,
        'length' => 256,
        'nullable' => true,
        'default' => null,
        'comment' => 'Reset Password Link Token'
    )
);

// Add reset password link token creation date column
$installer->getConnection()->addColumn(
    $installer->getTable('admin_user'),
    'rp_token_created_at',
    array(
        'type' => \Magento\DB\Ddl\Table::TYPE_TIMESTAMP,
        'nullable' => true,
        'default' => null,
        'comment' => 'Reset Password Link Token Creation Date'
    )
);

$installer->endSetup();
